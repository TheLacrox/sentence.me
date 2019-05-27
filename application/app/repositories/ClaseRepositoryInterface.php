<?php

namespace App\Repositories;

use App\Models\Clase;

interface ClaseRepositoryInterface
{
    /**
     * Return all the Clases
     *
     * @return Clase list
     **/
    public function list();

    /**
     * Store a newly created Clase in storage.
     *
     * @param  Array fill with everything (include role)
     * @return Clase Created
     **/
    public function save($Clasedata);

    /**
     * Find the specific Clase
     *
     * @param  Int id
     * @return \App\Models\Clase  $Clase
     **/
    public function find($id);

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $formdata
     * @param  Int $id
     * @return Clase $Clase Updated Clase
     **/

    public function update($formdata, $id);

    /**
     * Remove the specified Clase from storage.
     *
     * @param  Int $id
     * @return Boolean
     **/
    public function destroy($id);
}
