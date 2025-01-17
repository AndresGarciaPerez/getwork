<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MostrarVacantes extends Component
{ 

    // #[On('prueba')]
    // public function prueba()
    // {
    //     dd('hola');
    // } 

    #[On('eliminarVacante')] 
    public function eliminarVacante(Vacante $vacanteId){
        if($vacanteId->imagen){
            Storage::delete($vacanteId->imagen);
        }
        $vacanteId->delete();
    }

    public function render()
    {
        //MOSTRAR REGISTROS DE LA BASE DE DATOS
        $vacantes = Vacante::where('user_id', Auth::user()->id)->paginate(4);
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
