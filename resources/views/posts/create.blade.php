<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <livewire:flash-container  />

        @livewire('post.create-form', ['categories' => $categories])
    </div>
</x-app-layout>


<script>
    let editor = CKEDITOR.replace( 'content' );
    let dataContent;
    editor.on( 'change', function( evt ) {
        dataContent = evt.editor.getData();
        $("#content").val(dataContent)
    });
</script>