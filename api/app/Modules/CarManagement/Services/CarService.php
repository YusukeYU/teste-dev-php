<?php

namespace App\Modules\CarManagement\Services;

use App\Infrastructure\Modules\CarManagement\Repositories\CarRepository;

class CarService extends CarRepository
{
    public function createCar($request)
    {
        // filtra oque queremos da requisição
        $data = $request->only(['brand', 'model', 'year']);
        // verifica se a marca já se encontra cadastrada
        if($this->findBy('model',$data['model'])){
            throw new \Exception('Modelo já cadastrado no sistema!');
        }
        // insere no banco de dados
        $this->create($data);
    }

    public function updateCar($request,$id)
    {
        // filtra oque queremos da requisição
        $data = $request->only(['brand', 'model', 'year']);
        // verifica se há campos nulos
        if (in_array(null, $data)) {
            throw new \Exception('Não são aceitos campos vazios!');
        }
        // verifica se a marca está cadastrada
        if ($this->update($data, $id) != 1) {
            throw new \Exception('Carro informado não existente!');
        }
    }

    public function deleteCar($id){
        if ($this->delete($id) != 1) {
            throw new \Exception('Carro informado não existente!');
        }
    }
    public function findCar($id){
        if (!$car = $this->find($id)) {
            throw new \Exception('Carro informado não existente!');
        }
        return $car;
    }
    public function getAllCars($columns =['*']){
        return $this->all($columns);
    }
}
