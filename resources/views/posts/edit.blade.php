<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
            <livewire:flash-container  />

            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900"> {{ __('Post Details') }}</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('To edit post, fill in the fields with *.') }}
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{route('admin.posts.update', ['post' => $post->slug])}}" method="post" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-12 mt-2 sm:col-span-12">
                                        <label class="block font-medium text-sm text-gray-700" for="title">
                                            {{ __('Title') }}
                                        </label>
                                        <input class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{$post ? $post->title : ''}}" id="title" name="title" type="text">
                                        @error('title')
                                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group" >
                                        <label for="file-Highligth" class="custom-file-input">change image Highligth</label>
                                        <input type="file" name="file-Highligth" accept="image/png, image/jpeg">
                                    </div>
                                    <div class="col-span-12 mt-2 sm:col-span-12">
                                        <textarea name="content">{{$post ? $post->content : ''}}</textarea>
                                        @error('content')
                                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-12 mt-2 sm:col-span-12">
                                        <div class="form-check">
                                            <input type="checkbox" {{$post->enabled ? 'checked' : ''}} class="form-check-input" name="enabled" id="enabled">
                                            <label class="form-check-label" for="enabled">{{ __('Enabled') }}</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-jet-label for="select2" value="{{ __('*Categories') }}" />
                                            <select class="form-control" name="categories[]" id="select2" multiple="multiple">
                                                @foreach($categories as $category)
                                                    @foreach($post->categories as $postCategory)
                                                        @if($category->slug == $postCategory->slug)
                                                            <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                                        @else
                                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>

                                            <div class="col-md-6">
                                                <x-jet-label for="tags" value="{{ __('Tags') }}" />
                                                <select class="form-control" name="tags[]" id="tags" multiple="multiple">
                                                    @foreach($post->tags as $tag)
                                                        <option selected>{{isset($tag->name) ? $tag->name : ''}}</option>
                                                    @endforeach

                                                    @foreach($tags as $tag)
                                                        <option>{{isset($tag->name) ? $tag->name : ''}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" id="create">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

        <script>

            $(document).ready(function() {
                $('#select2').select2();

                $("#tags").select2({
                    tags: true
                });
            });

            const removeElements = (elms) => elms.forEach(el => el.remove());

            window.scrollTo(0, 0);

            setTimeout(function(){
                    removeElements( document.querySelectorAll(".rounded-r-md") );
                }
                , 4000 );

        </script>



    </div>
</x-app-layout>


<script>
    let editor = CKEDITOR.replace( 'content' );
</script>
