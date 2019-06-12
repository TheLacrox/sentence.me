<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckRespuesta implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $ubicacion,$nombre,$argumentos,$solucion,$respuesta;
    public function __construct($ubicacion,$nombre,$argumentos,$solucion,$respuesta)
    {
        $this->ubicacion=$ubicacion;
        $this->nombre=$nombre;
        $this->argumentos=$argumentos;
        $this->solucion=$solucion;
        $this->respuesta=$respuesta;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $resultado = shell_exec('java -cp ' . $this->ubicacion . ' ' . $this->nombre . ' ' . $this->argumentos." ");
        if ($resultado === $this->solucion) {
            $this->respuesta->aprobado = 1;
            $this->respuesta->save();
        }else{
            $this->respuesta->aprobado = 0;
            $this->respuesta->save();
        }
        
    }
}
