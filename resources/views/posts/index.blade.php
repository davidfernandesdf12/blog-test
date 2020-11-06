<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts Management') }}
            <x-jet-button type="button" onclick="window.location.href='{{route('admin.posts.create')}}'" class="float-right">
                {{ __('New') }}
            </x-jet-button>
        </h2>
    </x-slot>

    {{-- Datables Categories --}}
    <div class="p-3">
        <livewire:post.posts-table wire:ignore.self/>
    </div>
</x-app-layout>


