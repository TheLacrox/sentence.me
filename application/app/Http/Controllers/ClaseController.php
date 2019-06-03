<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClaseRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ClaseController extends Controller
{

    public function __construct(ClaseRepositoryInterface $clase, UserRepositoryInterface $user)
    {
        $this->clase = $clase;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Profesor')) {
            $clases = $this->clase->getuserclases(Auth::user());
            return View::make('clase.index')
                ->with('clases', $clases);
        } else {
            return redirect('clase.index')->with('error', 'No Tienes permitido Crear una clase');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('Profesor')) {
            return View::make('clase.create');
        } else {
            return redirect('clase.index')->with('error', 'No Tienes permitido Crear una clase');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->clase->create($request->toArray());
        return redirect('clases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clase = $this->clase->getClase($id);
        $tareas = $this->getTareas($clase);
        return View::make('clase.show', ['tareas' => $tareas, 'clase' => $clase]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clase=$this->clase->getClase($id);
        return View::make('clase.edit',['clase'=>$clase]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clase=$this->clase->update($request,$id);
        return View::make('clase.edit',['clase'=>$clase]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->clase->destroy($id);
        return redirect('clase.index');
    }
}
