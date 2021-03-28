<?php

namespace App\Modules\CarManagement\Controllers;

use App\Heart\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use App\Modules\CarManagement\Services\CarService;
use App\Modules\CarManagement\Requests\StoreCarRequest;

class CarController extends ApiBaseController
{
    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index()
    {
        try {
            return $this->responseSuccess('', $this->carService->all());
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function store(StoreCarRequest $request)
    {
        try {
            $this->carService->createCar($request);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
        return $this->responseSuccess('Cadastrado com sucesso!');
    }

    public function show($id)
    {
        try {
            $car = $this->carService->findCar($id);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
        return $this->responseSuccess('', $car);
    }
    public function update(Request $request, $id)
    {
        try {
            $this->carService->updateCar($request, $id);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
        return $this->responseSuccess('Editado com sucesso', [$request->all()]);
    }

    public function destroy($id)
    {
        try {
            $this->carService->deleteCar($id);
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
        return $this->responseSuccess('Deletado com sucesso');
    }
    public function getBrands()
    {
        try {
            return $this->responseSuccess('', $this->carService->all(['id','brand']));
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
