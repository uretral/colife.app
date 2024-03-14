<?php

namespace Modules\My\Repositories\FakeApi;

use Carbon\Carbon;
use Modules\My\Entities\XCookie;
use Modules\My\Entities\XUser;


class EstatesListApiGenerator
{
    private array $estates = [];
    protected string $rowName = 'estates';


    public function handle()
    {
        if (request()->exists('g') && request('g') > 0 || !XCookie::where('name', $this->rowName)->first()) {
            $this->estate();
            XCookie::updateOrCreate(['name' => $this->rowName], ['json' => $this->estates]);
        }
        return XCookie::where('name', $this->rowName)->first()->getAttribute('json');
    }

    public function handleItem($id) {

       return $this->handle()->where('id', $id)->first();

    }


    private function estate(): void
    {
        for ($item = 1; $item <= (int)request('g'); $item++) {
            $fakeUser = XUser::inRandomOrder()->first();
            $rooms = $this->rooms();

            $this->estates[] = [
                'id' => uniqid(),
                'city' => str_replace('г. ', '', $fakeUser->City),
                'title' => "Квартира на $fakeUser->Street",
                'address' => str_replace('Россия, г. ', '', $fakeUser->Address),
                'square' => rand(18, 42),
                'photos' => $this->photos(3),
                'rooms' => $rooms,
                'state' => $this->estateState($rooms)
            ];
        }

        $this->estates[] = [
            'id' => uniqid(),
            'city' => 'Москва',
            'title' => "Квартира на Фрунзе",
            'address' => 'Москва, улица Фрунзе 24, подъезд 7, этаж 2, квартира 167',
            'square' => 70,
            'photos' => null,
            'rooms' => [
                [
                    'id' => uniqid(),
                    'state' => 4
                ],[
                    'id' => uniqid(),
                    'state' => 4
                ],[
                    'id' => uniqid(),
                    'state' => 4
                ]
            ],
            'state' => 4
        ];
    }

    private function photos($max = 4): array
    {
        $photos = [];
        for ($item = 1; $item <= rand(2, $max); $item++) {
            $uniqueName = uniqid() . ".jpg";
            $uniquePath = "storage/fake/$uniqueName";
            if (\Storage::put("/public/fake/$uniqueName", file_get_contents('https://loremflickr.com/1200/650/buildings'))) {
                $photos[] = $uniquePath;
            }
        }
        return $photos;
    }

    private function rooms(): array
    {
        $rooms = [];

        for ($item = 1; $item <= rand(1, 4); $item++) {

            $units = $this->units();

            $rooms[] = [
                'id' => uniqid(),
                'units' => $units,
                'state' => $this->roomState($units)
            ];
        }
        return $rooms;

    }

    private function units(): array
    {
        $units = [];
        for ($item = 1; $item <= rand(1, 2); $item++) {

            $units[] = [
                'id' => uniqid(),
                'tenant' => $this->tenant(),
                'rent_until' => Carbon::now()->subMinutes(rand(1, 55))->format('d.m.y'),
                'price' => rand(18000, 50000)
            ];
        }
        return $units;
    }

    private function tenant()
    {
        $fakeUser = XUser::inRandomOrder()->first();
        $tenantItem = [
            'id' => uniqid(),
            'name' => "$fakeUser->LastName $fakeUser->FirstName",
            'avatar' => $fakeUser->Avatar
        ];
        $tenantRand = [$tenantItem, null, $tenantItem];

        return $tenantRand[rand(0, 2)];
    }


    public function roomState($units)
    {
        $arrState = [];
        foreach ($units as $unit) {
            $arrState[] = !is_null($unit['tenant']);
        }

        if (in_array(true, $arrState) && in_array(false, $arrState)) {
            return 2;
        }
        if (in_array(true, $arrState) && !in_array(false, $arrState)) {
            return 1;
        }
        if (!in_array(true, $arrState) && in_array(false, $arrState)) {
            return 3;
        }
    }

    public function estateState($rooms)
    {
        $arrState = [];
        foreach ($rooms as $room) {
            $arrState[] = $room['state'];
        }

        $res = array_sum($arrState) / count($arrState);

        if ($res === 1) {
            return 1;
        }
        if ($res > 1 && $res < 3) {
            return 2;
        }
        if ($res === 3) {
            return 3;
        }
    }

}
