<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>
        <div>
            <x-input-label for="titulo" :value="__('Titulo Vacante')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model.live="titulo" :value="old('titulo')" placeholder="Titulo Vacante"/>
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>
  
        <div>
            <x-input-label for="salario" :value="__('Salario Mensual')" />
            <select wire:model.live="salario" id="salario" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option>-- Seleccione --</option>
                @foreach ($salarios as $salario )
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('salario')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select wire:model.live="categoria" id="categoria" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option>-- Seleccione --</option>
                @foreach ($categorias as $categoria )
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model.live="empresa" :value="old('empresa')" placeholder="Empresa: Netflix, Uber, Microsoft"/>
            <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model.live="ultimo_dia" :value="old('ultimo_dia')"/>
            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Descripcion puesto')" />
            <textarea id="descripcion" wire:model.live="descripcion" class="w-full h-48 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text"  placeholder="Descripcion general del puesto"></textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>
 
        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file" accept="image/*" wire:model.live="imagen"/>
            <div class="my-5 w-80">
                @if ($imagen)
                    Imagen:
                        <img src="{{ $imagen->temporaryUrl()}}" alt="image">
                @endif  
            </div>
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>

        <x-primary-button class="">Crear Vacante</x-primary-button>
</form>
