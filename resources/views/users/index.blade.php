<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Management') }}
            <x-jet-button class="float-right">
                {{ __('Create') }}
            </x-jet-button>
        </h2>



    </x-slot>
{{--    <h1>dsd</h1>--}}
{{--    <div class="md:grid p-3 md:gap-6">--}}
{{--        <div class="mt-5 md:mt-0 md:col-span-2">--}}
{{--                <div class="shadow overflow-hidden sm:rounded-md">--}}
{{--                    <div class="px-4 py-5 bg-white sm:p-6">--}}
{{--                        <div class="grid grid-cols-6 gap-6">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="p-3">
{{--        <livewire:datatable-of-contents--}}
{{--            model="App\Models\User"--}}
{{--            exportable--}}
{{--            include="name, email"--}}
{{--            hideable="select"--}}
{{--            searchable="name, email"--}}
{{--            per-page="10"--}}
{{--        />--}}

        <livewire:users-table
        />

    </div>

</x-app-layout>



