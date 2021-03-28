<?php

namespace App\Infrastructure\Modules\CarManagement\Repositories;

use App\Modules\CarManagement\Models\Car;
use App\Infrastructure\BaseRepository;
use App\Infrastructure\Modules\CarManagement\Interfaces\ICarRepository;

class CarRepository extends BaseRepository implements ICarRepository
{
    function model()
    {
        return Car::class;
    }
}
