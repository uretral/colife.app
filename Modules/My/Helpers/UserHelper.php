<?php


namespace Modules\My\Helpers;


use Modules\My\Enums\RoleEnum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\My\Data\FileData;
use Modules\My\Entities\User;
use Modules\My\Repositories\UserRepository;


class UserHelper
{
    public static function filterByFileSize($path, $size = 300000): bool
    {
        try {
            $headers = get_headers($path, 1);
            $filesize = $headers['Content-Length'];

            if ($filesize <= $size) {
                return false;
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Получить ID пользователя Поддержки
     * @return int|mixed|null
     */
    public static function getSupportUserId(): mixed
    {
        return User::whereHas(
                'roles',
                fn($q) => $q->where('name', RoleEnum::SUPPORT()->value)
            )->first()->id ?? null;
    }

    public static function randomColor(): string
    {
        $rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
        return "#" . $rand;
    }

    public static function updateUserAvatar($avatarFile,$user = false)
    {
        try {
            if (!$user)
                $user = UserRepository::getAuthUser();

            $disk = "public";
            $path = "avatars";
            $file = $avatarFile->store($path, $disk);

            $dto = FileData::from(
                [
                    "name"       => Str::replace("{$path}/", "", $file),
                    "type"       => "avatar",
                    "model_id"   => $user->id,
                    "model_type" => $user::class,
                    "title"      => "Аватар пользователя",
                    "key"        => $file,
                ]
            );
            $user->files()->whereType("avatar")->get()->each(
                function ($file) use ($disk) {
                    Storage::disk($disk)->delete($file->key);
                    $file->delete();
                }
            );
            $user->createFile($dto->toArray());
        } catch (\Exception $e){
            throw new \Exception("Ошибка сохранения аватара пользователя" .$e->getMessage());
        }

    }

}
