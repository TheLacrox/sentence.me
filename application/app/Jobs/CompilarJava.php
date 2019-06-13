<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CompilarJava implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $fichero;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fichero)
    {
        $this->fichero = $fichero;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $resultado = shell_exec('javac '.$this->fichero);
    }
}
