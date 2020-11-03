<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Category Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('To create a new category, fill in the fields with *.') }}
    </x-slot>

    <x-slot name="form">
        {{-- Title --}}
        <div class="col-span-6 mt-2 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('*Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model="title" autofocus />
            <x-jet-input-error for="title" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button id="create" onclick="myFunction()">
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>

<script>
    function myFunction(){
        const removeElements = (elms) => elms.forEach(el => el.remove());

        window.scrollTo(0, 0);

        setTimeout(function(){

                removeElements( document.querySelectorAll(".rounded-r-md") );
            }
            , 4000 );
    }
</script>
