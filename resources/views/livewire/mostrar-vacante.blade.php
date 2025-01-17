<div class="p-10">

    <div class="mb-5">
        <h1 class="font bold text-2xl text-gray-800 my-3">
            {{$vacante->titulo}}
        </h1>
    </div>

    <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
        <p class="font-bold uppercase text-sm my-3 text-gray-800">Empresa: <span class="normal-case font-normal">{{$vacante->empresa}}</span></p>
        <p class="font-bold uppercase text-sm my-3 text-gray-800">Ultimo dia para postularse: <span class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span></p>
        <p class="font-bold uppercase text-sm my-3 text-gray-800">Categoria: <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span></p>
        <p class="font-bold uppercase text-sm my-3 text-gray-800">Salario: <span class="normal-case font-normal">{{$vacante->salario->salario}}</span></p>
    </div>

    <div class="md:grid md:grid-cols-6 gap-8">
        <div class="md:col-span-2">
            <img src="{{asset('storage/' . $vacante->imagen)}}" alt="{{'imagen vacante' . $vacante->titulo }}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-xl font-bold mb-5">Descripcion del puesto</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest 
    
        <div class="mt-5 bg-gray-50 border border-dashed text-center p-5">
            <p>Deseas aplicar a esta vacante?
                <a href="{{route('register')}}" class="font-bold text-indigo-800">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p> 
        </div>   
    @else
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcannot 

    @endguest
</div>
