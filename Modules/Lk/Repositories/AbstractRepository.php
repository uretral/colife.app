<?php


namespace Modules\Lk\Repositories;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QBuilder;
use Illuminate\Support\Collection;

/**
 * Class AbstractRepository
 * @package Crm\Repositories
 *
 * @method Builder|QBuilder|static withTrashed()
 * @method Builder|QBuilder|static onlyTrashed()
 * @mixin Builder
 * @mixin QBuilder
 */
abstract class AbstractRepository implements Repository
{
    /**
     * @type EBuilder|QBuilder|Model|SoftDeletes
     */
    protected $model;

    /**
     * @type EBuilder|QBuilder|Model|SoftDeletes
     */
    protected $query;
    protected $all;
    private array $relations   = [];
    protected array $ends = [
        'get',
        'all',
        'find',
        'findOrFail',
        'first',
        'list',
        'lists',
        'toSql',
        'max',
        'min',
        'count',
        'update',
        'delete',
        'paginate',
        'getTree',
        'aggregate',
        'firstOrNew',
        'sum',
        'simplePaginate',
        'cursor',
        'exists',
    ];

    /**
     * AbstractRepository constructor.
     */
    public function __construct()
    {
        $model = app($this->getModel());

        if (!$model instanceof Model) {
            throw new \InvalidArgumentException(
                sprintf('Class "%s" must be an instance of "%s"', $this->getModel(), Model::class)
            );
        }

        $this->model = $model;
    }


    public function init()
    {
        return $this;
    }

    /**
     * Возвращает основной класс репозитория
     *
     * @return object|string
     */
    abstract protected function getModel();

    private function hydrateCollection()
    {
        $this->all = ($this->all->first() instanceof Model)
            ? $this->all
            : (clone $this->model)->hydrate($this->all->toArray());
    }

    /**
     * Добавить связи для жадной загрузки.
     *
     */

    public function addRelations($relations): static
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $this->relations = $relations;

        return $this;
    }

    public function getByIds(array $ids)
    {
        return $this
            ->startConditions()
            ->whereIn('id', $ids)
            ->get();
    }

    /**
     * Создаёт новый поисковый запрос.
     *
     * @param string $query
     * @param string $column
     *
     * @return AbstractRepository
     */
    public function search(string $query, string $column)
    {
        return $this->startConditions()
            ->where($column, 'like', $query);
    }

    /**
     * @param $field
     * @return Collection
     */
    public function getField($field)
    {
        return $this
            ->startConditions()
            ->toBase()
            ->get([
                $field,
            ])
            ->map(function ($item) use ($field) {
                return $item->{$field};
            });
    }

    /**
     * @param $fields
     * @return Collection
     */
    public function getFields($fields)
    {
        return $this
            ->startConditions()
            ->toBase()
            ->get($fields);
    }

    public function getAll()
    {
        return $this->all;
    }

    /**
     * Загрузить связи.
     *
     * @param mixed $relations
     *
     * @return AbstractRepository
     */
    protected function with($relations = null)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $relations = array_merge($this->relations, $relations);

        $this->query = $this->query->with($relations);

        return $this;
    }

    /**
     * Ищет запись по ID
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this
            ->startConditions()
            ->withTrashed()
            ->find($id);
    }

    /**
     * Стартует новый запрос
     *
     * @return AbstractRepository
     */
    protected function startConditions()
    {
        $this->query = clone $this->model;

        return $this;
    }

    public function __call(string $method, array $parameters)
    {
        if (empty($this->query)) {
            $this->startConditions();
        }

        $this->query = call_user_func_array([$this->query, $method], $parameters);

        return in_array($method, $this->ends)
            ? $this->query
            : $this;
    }
}
