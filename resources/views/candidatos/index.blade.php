<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-10">Candidatos vacante: {{$vacante->titulo}}</h1>
                </div>
                <div class="md:flex md:justify-center p-5">
                    <ul class="w-full divide-y divide-gray-200">
                        @forelse ($vacante->candidatos as $candidato )
                            <li class="p-3 flex items-center">
                                <div class="flex-1">
                                    <p class="text-xl font-medium text-gray-800">{{$candidato->user->name}}</p>
                                    <p class="text-sm text-gray-600">{{$candidato->user->email}}</p>
                                    <p class="text-sm text-gray-600">{{$candidato->created_at->diffForHumans()}}</p>
                                </div>
                                <div class="flex">
                                    <a href="{{asset('storage/' . $candidato->cv)}}" target="__blank" rel="noreferrer noopener" class="inline-flex items-center shadow-sm px-2 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white  hover:bg-gray-50">
                                        Ver curriculum
                                    </a>
                                    <form action="{{route('candidatos.destroy', $candidato)}}" method="POST"> @method('DELETE') @csrf
                                         <input type="submit" value="Eliminar" class="inline-flex items-center shadow-sm px-2 py-2 border border-red-700 text-sm leading-5 font-medium rounded-full text-red-700 bg-red-50  hover:bg-red-50 ml-2 hover:cursor-pointer">
                                    </form>
                                </div>
                            </li> 
                        @empty
                            <p class="p-3 text-sm text-center text-gray-700">No hay candidatos aun</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
