<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClaseRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repositories\TareaRepositoryInterface;

class ClaseController extends Controller
{

    public function __construct(ClaseRepositoryInterface $clase, UserRepositoryInterface $user, TareaRepositoryInterface $tarea)
    {
        $this->clase = $clase;
        $this->user = $user;
        $this->tarea = $tarea;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = $this->clase->getuserclases(Auth::user());
        return View::make('clase.index')
            ->with('clases', $clases);
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
            return redirect(route('clases.index'))->with('error', 'No Tienes permitido Crear una clase');
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
        if (Auth::user()->hasRole('Profesor')) {
            $this->clase->create($request->toArray());
            $request->session()->flash('message',  'Clase Creada!');
            return redirect(route('clases.index'));
        } else {
            $request->session()->flash('message',  'No Tienes permitido Crear una clase');
            return redirect(route('clases.index'));
        }
    }
    public function getin()
    {
        return View::make('clase.join');
    }
    public function join(Request $request)
    {
        if (Auth::user()->hasRole('Alumno')) {
            if (count(Auth::user()->clases()->where('clave', $request->clave)->get()) < 1) {
                if ($this->clase->join($request)) {
                    $request->session()->flash('message', 'Te has unido A la clase :)');
                    return redirect(route('clases.index'));
                } else {
                    $request->session()->flash('message', 'No se ha encontrado la clase.');
                    return redirect(route('clases.getin'));
                }
            } else {
                $request->session()->flash('message', 'Ya perteneces a esa clase.');
                return redirect(route('clases.index'));
            }
        } else {
            $request->session()->flash('message', 'Solo alumnos pueden unirse');
            return redirect(route('clases.index'));
        }
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
        $tareas = $this->tarea->getTareas($clase);
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
        if (Auth::user()->hasRole('Profesor')) {
            $clase = $this->clase->getClase($id);
            return View::make('clase.edit', ['clase' => $clase]);
        } else {
            return redirect(route('clases.index'))->with('error', 'No Tienes permitido editar una clase');
        }
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
        if (Auth::user()->hasRole('Profesor')) {
            $clase = $this->clase->update($request->toArray(), $id);
            return redirect(route('clases.show', $id))->with('message', 'Clase Actualizada');
        } else {
            return redirect(route('clases.index'))->with('error', 'No Tienes permitido actualizar una clase');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::user()->hasRole('Profesor')) {
            $this->clase->destroy($id);
            return redirect(route('clases.index'))->with('message', 'Clase Borrada');
        } else {
            return redirect(route('clases.index'))->with('error', 'No Tienes permitido actualizar una clase');
        }
    }
}
