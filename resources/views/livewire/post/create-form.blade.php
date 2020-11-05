<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <section>
    </section>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900"> {{ __('Post Details') }}</h3>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('To create a new post, fill in the fields with *.') }}
                </p>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{route('admin.posts.store')}}" method="POST">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-12 mt-2 sm:col-span-12">
                                <label class="block font-medium text-sm text-gray-700" for="title">
                                    {{ __('Title') }}
                                </label>
                                <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="title" name="title" type="text" autofocus="autofocus">
                                @error('title')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-span-12 mt-2 sm:col-span-12">
                                <textarea name="content"></textarea>
                                @error('content')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-span-12 mt-2 sm:col-span-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="enabled" id="enabled">
                                    <label class="form-check-label" for="enabled">{{ __('Enabled') }}</label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <x-jet-label for="select2" value="{{ __('*Categories') }}" />
                                    <select class="form-control" name="categories[]" id="select2" multiple="multiple">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>

                                    <div class="col-md-6">
                                        <x-jet-label for="tags" value="{{ __('Tags') }}" />
                                        <select class="form-control" name="tags[]" id="tags" multiple="multiple">
                                            <option selected="selected">orange</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" id="create" onclick="myFunction()">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
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

    function myFunction(){
        const removeElements = (elms) => elms.forEach(el => el.remove());

        window.scrollTo(0, 0);

        setTimeout(function(){
                removeElements( document.querySelectorAll(".rounded-r-md") );
            }
            , 4000 );
    }

</script>


