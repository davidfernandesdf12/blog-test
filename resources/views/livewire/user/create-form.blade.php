<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('User Details') }}
    </x-slot>
    <x-slot name="description">
        {{ __('To create a new user, fill in the fields with *.') }}
    </x-slot>

    <x-slot name="form">
        {{-- Name --}}
        <div class="col-span-6 mt-2 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('*Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('*Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('*Password') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model="password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="confirm_password" value="{{ __('*Confirm Password') }}" />
            <x-jet-input id="confirm_password" type="password" class="mt-1 block w-full" wire:model="confirm_password" />
            <x-jet-input-error for="confirm_password" class="mt-2" />
        </div>

{{--        --}}{{-- Role --}}
{{--        <div class="col-span-6 lg:col-span-4">--}}
{{--            <x-jet-label for="role" value="{{ __('Role') }}" />--}}
{{--            <x-jet-input-error for="role" class="mt-2" />--}}

{{--            <div class="mt-1 border border-gray-200 rounded-lg cursor-pointer">--}}

{{--            </div>--}}
{{--        </div>--}}
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








