<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TareaRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class TareaController extends Controller
{
    public function __construct(TareaRepositoryInterface $tarea)
    {
        $this->tarea = $tarea;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($claseid)
    {
        if (Auth::user()->hasRole('Profesor')) {
            return View::make('tarea.create',['claseid'=>$claseid]);
        } else {
            return redirect(route('clases.show',$claseid))->with('error', 'No Tienes permitido Crear una tarea');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$claseid)
    {
        if (Auth::user()->hasRole('Profesor')) {
            $this->tarea->create($request->toArray(),$claseid);
            return redirect(route('clases.show',$claseid))->with('message', 'Tarea Creada!');
        } else {
            return redirect(route('clases.index'))->with('error', 'No Tienes permitido Crear una Tarea');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($claseid,$tareaid)
    {
        $tarea=$this->tarea->getTarea($tareaid);
        return View::make('tarea.show',['tarea'=>$tarea,'claseid'=>$claseid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($claseid,$id)
    {
        if (Auth::user()->hasRole('Profesor')) {
            $tarea = $this->tarea->getTarea($id);
            $solucion=$tarea->solucion()->first()->solucion;
            $argumentos=[];
            foreach($tarea->argumentos()->get() as $argumento){
                array_push($argumentos,$argumento->argumento);
            }
            $argumentos=implode(',',$argumentos);
            return View::make('tarea.edit', ['claseid' => $claseid,'tarea'=>$tarea,'solucion'=>$solucion,'argumentos'=>$argumentos]);
        } else {
            return redirect(route('clases.show',$claseid))->with('error', 'No Tienes permitido editar una Tarea');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $claseid,$tareaid)
    {
        if (Auth::user()->hasRole('Profesor')) {
            $tarea = $this->tarea->update($request->toArray(), $tareaid);
            return redirect(route('clases.tareas.show',[$claseid,$tareaid]))->with('message', 'Tarea Actualizada');
        } else {
            return redirect(route('clases.index'))->with('error', 'No Tienes permitido actualizar una Tarea');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
