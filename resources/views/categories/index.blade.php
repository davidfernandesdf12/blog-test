<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories Management') }}
            <x-jet-button type="button" onclick="window.location.href='{{route('admin.categories.create')}}'" class="float-right">
                {{ __('New') }}
            </x-jet-button>
        </h2>
    </x-slot>

    {{-- Datables Categories --}}
    <div class="p-3">
        <livewire:category.categories-table/>
    </div>

</x-app-layout>
