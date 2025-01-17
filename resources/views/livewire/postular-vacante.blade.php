<div class="flex flex-col justify-center items-center bg-gray-100 p-10 mt-10">

    <h3 class="text-center text-xl font-bold my-4">Postularme a esta vacante</h3>

    @if(session()->has('mensaje'))
        <p id="message" class="uppercase border border-gree-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm rounded-lg">
            {{session('mensaje')}}
        </p>
    
    @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum (PDF)')" />
                <x-text-input id="cv" type="file" accept=".pdf" wire:model='cv' class="block w-full" />
            </div>
            @error('cv')
                <x-input-error :messages="$message" class="mt-2" />
            @enderror
            <x-primary-button class="my-5"> {{__('Postularme')}} </x-primary-button>
        </form>
    @endif

</div>

@push('scripts')
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
@endpush

 