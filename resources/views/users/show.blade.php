<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
{{--            <x-jet-button class="float-right">--}}
{{--                {{ __('New') }}--}}
{{--            </x-jet-button>--}}
        </h2>
    </x-slot>


    <div class="md:grid p-3 grid-cols-5 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <x-jet-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $user->profile_photo_url }}" alt="{{$user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <ul class="list-group list-group-flush mt-2">
                        <li class="list-group-item"><strong>{{ __('Name') }}</strong>: {{$user->name}}</li>
                        <li class="list-group-item"><strong>{{ __('E-mail') }}</strong>: {{$user->email}}</li>
                        <li class="list-group-item"><strong>{{ __('Verified email') }}</strong>: {{!empty($user->email_verified_at) ? $user->email_verified_at->format('d/m/Y H:i:s') : __('Not')}}</li>
                        <li class="list-group-item"><p><strong>{{ __('Date Created') }}</strong>: {{$user->created_at->format('d/m/Y H:i:s')}}</p></li>
                        <li class="list-group-item"><p><strong>{{ __('Date Updated') }}</strong>: {{$user->updated_at->format('d/m/Y H:i:s')}}</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
