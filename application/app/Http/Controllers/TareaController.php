<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TareaRepositoryInterface;

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
        dd($claseid);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
