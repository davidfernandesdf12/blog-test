<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @livewire('post.create-form', ['categories' => $categories, 'tags' => $tags])
    </div>
</x-app-layout>


<script>
    CKEDITOR.replace( 'content' );

</script>
