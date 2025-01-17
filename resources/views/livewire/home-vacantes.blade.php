<div>

    <livewire:filtrar-vacantes />

   <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-bold text-3xl text-gray-700 mb-12">Nuestras vacantes diponibles</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 mx-5 md:mx-20 divide-y divide-gray-200">
                @forelse ( $vacantes as $vacante )

                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold text-gray-600">
                                {{$vacante->titulo}}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->empresa}}</p>
                            <p class="text-xs text-gray-600 mb-1">{{$vacante->categoria->categoria}}</p>
                            <p class="text-xs text-gray-600 mb-1">{{$vacante->salario->salario}}</p>
                            <p class="font-bold text-xs text-gray-600">Ultimo dia para postularse: <span class="font-normal">{{$vacante->ultimo_dia->format('d/m/Y')}}</span></p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="bg-indigo-600 text-white px-3 py-2 text-sm font-bold uppercase rounded-lg block text-center">Ver vacante</a>
                        </div>
                    </div>

                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aun</p>
                @endforelse
            </div>

        </div>
   </div>
</div>
 