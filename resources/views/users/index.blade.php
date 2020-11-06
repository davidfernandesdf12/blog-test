<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Management') }}
            <x-jet-button type="button" onclick="window.location.href='{{route('admin.users.create')}}'" class="float-right">
                {{ __('New') }}
            </x-jet-button>
        </h2>
    </x-slot>


    {{-- Datables Users --}}
    <div class="datables p-3">
        <livewire:users-table/>
    </div>

</x-app-layout>



