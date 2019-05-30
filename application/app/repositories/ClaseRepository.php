<?php

namespace App\Repositories;

use App\Models\Clase;
use App\Repositories\ClaseRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class ClaseRepository implements ClaseRepositoryInterface
{
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }
    /**
     * Return all the Clases
     *
     * @return Clase list
     **/
    public function list()
    {
        return Clase::all();
    }

    /**
     * Store a newly created Clase in storage.
     *
     * @param  Array fill with everything (include role)
     * @return Clase Created
     **/
    public function create($clasedata)
    {
        $this->user->find();
        $clase = new Clase;
        $clase->fill($clasedata)->save();
        return $clase;
    }

    /**
     * Find the specific Clase
     *
     * @param  id
     * @return \App\Models\Clase  $Clase
     **/
    public function find($id)
    {
        return Clase::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $formdata
     * @param  Int $id
     * @return Clase $Clase Updated Clase
     **/
    public function update($formdata, $id)
    {
        $Clase = $this->find($id);
        $Clase->fill($formdata);
        $Clase->status_id = $formdata['status'];
        $Clase->save();
        return $Clase;
    }

    /**
     * Remove the specified Clase from storage.
     *
     * @param  Int $id
     * @return Boolean
     **/
    public function destroy($id)
    {
        $Clase = $this->find($id);
        $Clase->delete();
        return true;
    }
}
