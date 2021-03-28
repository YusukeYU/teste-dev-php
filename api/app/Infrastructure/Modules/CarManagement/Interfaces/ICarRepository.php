<?php

namespace App\Infrastructure\Modules\CarManagement\Interfaces;

interface ICarRepository
{

    public function all($columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

}