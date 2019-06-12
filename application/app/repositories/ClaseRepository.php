<?php

namespace App\Repositories;

use App\Clase;
use App\Repositories\ClaseRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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
    public function getuserclases($user)
    {
        if ($user->hasRole('Profesor')) {
            $clases = $user->clasesProfesor()->get();
        } else {
            $clases = $user->clases()->get();
        };
        return $clases;
    }

    /**
     * Store a newly created Clase in storage.
     *
     * @param  Array fill with everything (include role)
     * @return Clase Created
     **/
    public function create($clasedata)
    {
        $clase = new Clase;
        $clase->fill($clasedata);
        $clase->clave = str_random('16');
        $clase->user()->associate(Auth::user())->save();
        return $clase;
    }
    public function join($request)
    {
        $clase = Clase::all()->where('clave', '=', $request->clave)->first();
        if ($clase) {
            $clase->Users()->attach(Auth::id());
            return true;
        } else {
            return false;
        }
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
    public function getClase($id)
    {
        return $this->find($id);
    }
}
