<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
 
    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:2048',
    ];
 
    public function crearVacante()
    {
        $datos = $this->validate(); //ESTABLECER EL FILLABLE DEL MODELO ANTES

        //ALMACENAR IMAGEN
        //Guardamos la imagen en la carpeta vacantes usando el metodo store() de livewire
        $imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('../../public/vacantes', '', $imagen);
        //$nombre_imagen = str_replace('public/vacantes/', '', $imagen);
        //CREAR VACANTE
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'], //no necesita el _id, por que no lo tiene en el input
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $nombre_imagen,
            'user_id' => Auth::user()->id
        ]);


        // CREAR MENSAJE DE CONFIRMACION
        session()->flash('mensaje', 'La vacante se publico correctamente');

        //REDIRECCINAR
        return redirect()->route('vacantes.index'); 
 

    }

    public function render()
    {
        //Consultar BD
        $salarios = Salario::all();
        $categorias = Categoria::all(); //me trae todos los datos de la tabla

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]); 
    }
}
