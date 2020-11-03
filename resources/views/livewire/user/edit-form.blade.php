{{--{!! dd($name) !!}--}}
<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('User Details') }}
    </x-slot>
    <x-slot name="description">
        {{ __('To create a new user, fill in the fields with *.') }}
    </x-slot>
    <x-slot name="form">

        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">

            <!-- Profile Photo File Input -->
            <input type="file" class="hidden"
                   wire:model="photo"
                   x-ref="photo"
                   x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select New Photo') }}
            </x-jet-secondary-button>
        </div>

        {{-- Name --}}
        <div class="row">
            <div class="col-md-3">

            </div>
        </div>
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

    </x-slot>

    <x-slot name="actions">
        <x-jet-button id="create" onclick="myFunction()">
            {{ __('Save') }}
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
