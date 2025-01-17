<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;

    use WithFileUploads;

    protected $rules =[
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //Guardar el cv 
        $cv = $this->cv->store('public/cv');
        $nombre_cv = str_replace('../../public/cv', '', $cv);

        //Crear la solicitud del vacante 
        $this->vacante->candidatos()->create([
            'user_id' => Auth::user()->id,
            'cv' => $nombre_cv
            //Vacante id, se agrega en automatico gracias a la relacion en el modelo
        ]);

        //Crear notificacion y enviar Email
        //gracias a la relacion tengo el acceso a todos los datos del reclutador 
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, Auth::user()->id));

        //Mostrar al usuario un mensaje de confirmacion
        session()->flash('mensaje', 'Se envio correctamente tu curriculum, mucha suerte.');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
