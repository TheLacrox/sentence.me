<?php

namespace App\Repositories;

use App\Models\Clase;

interface ClaseRepositoryInterface
{
    public function create($clasedata);
    public function find($id);
    public function getuserclases($user);
    public function getClase($id);
    public function update($formdata, $id);
    public function destroy($id);
}
