<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div id="message" class="uppercase border border-gree-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm rounded-md">
                    {{session('mensaje')}}
                </div>
            @endif
            <livewire:mostrar-vacantes />
        </div>
    </div>
</x-app-layout>
 
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const flashMessage = document.getElementById('message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.style.display = 'none';
            }, 7000); // 7000 ms = 7 segundos
        }
    });
</script>
