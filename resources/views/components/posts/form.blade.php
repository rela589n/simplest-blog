<form action="{{ $sendAction }}" method="post" class="text-dark form" enctype="multipart/form-data">
    @method($sendMethod)
    @csrf

    <div class="form-group form-row align-items-start">
        <label for="name" class="form-info h3 m-0 col-2">
            Name:
        </label>
        <div class="col-10">
            <input id="name" name="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Post name" required="required" value="{{ old('name', $post->name ?? '') }}">

            @error('name')
            <span class="invalid-feedback" role="alert"><label for="name">{{ $message }}</label></span>
            @enderror
        </div>
    </div>

    <div class="form-group form-row align-items-start">
        <label for="content" class="form-info h3 mb-2 mt-0 col-12">Content:</label>
        <div class="col-12">
            <textarea id="content" name="content"
                      class="form-control @error('content') is-invalid @enderror"
                      rows="3" placeholder="Post content"
                      required="required">{{ old('content', $post->content ?? '') }}</textarea>

            @error('content')
            <span class="invalid-feedback" role="alert">
                <label for="content">{{ $message }}</label>
            </span>
            @enderror
        </div>
    </div>

    <label for="uri_alias" class="form-info mb-4 h3">
        Enter uri alias (slug):
    </label>

    <div class="form-group form-row align-items-start">
        <div class="col-9">
            <input id="uri_alias" name="uri_alias" type="text" class="form-control @error('uri_alias') is-invalid @enderror"
                   placeholder="Slug"
                   required="required" value="{{ old('uri_alias', $post->uri_alias ?? '') }}">

            @error('uri_alias')
            <span class="invalid-feedback" role="alert">
                <label for="uri_alias">{{ $message }}</label>
            </span>
            @enderror
        </div>
        <div class="col-3">
            <button tabindex="-1" type="button" id="auto-generate-translit"
                    data-translit-source="#name"
                    data-translit-dest="#uri_alias"
                    class="btn btn-primary btn-block">Auto
            </button>
        </div>
    </div>

    <div class="form-group form-row align-items-start mt-4">
        <label for="category_id" class="form-info h3 m-0 col-2">
            Category:
        </label>

        <div class="col-10">
            <select class="browser-default custom-select @error('category_id') is-invalid @enderror"
                    required="required"
                    id="category_id"
                    name="category_id">

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if($category->id === optional($post)->category_id) selected="selected" @endif>{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')
            <span class="invalid-feedback" role="alert">
                <label for="category_id">{{ $message }}</label>
            </span>
            @enderror
        </div>
    </div>

    @isset($post->image_url)
        <div class="form-row my-3">
            <div class="col-3 h3">
                Current image:
            </div>
            <div class="col-9">
                <img src="{{ $post->image_url }}"
                     class="rounded mx-auto d-block img-fluid" alt="...">
            </div>
        </div>
    @endisset

    <div class="form-group form-row align-items-start">
        <label for="image" class="form-info h3 m-0 col-3">
            Select image:
        </label>
        <div class="col-9">
            <input id="image" name="image" class="form-control @error('image') is-invalid @enderror" type="file">

            @error('image')
            <span class="invalid-feedback" role="alert">
                <label for="image">{{ $message }}</label>
            </span>
            @enderror
        </div>
    </div>

    @yield('post-form-additions')

    @section('post-form-submit')
        <x-buttons.submit :columns="$submitSize">
            {{ $submitButtonText }}
        </x-buttons.submit>
    @show
</form>

@section('bottom_scripts')
    @parent
    <script src="{{ asset('js/jquery.liTranslit.js') }}"></script>
    <script src="{{ asset('js/uri-autogenerator.js') }}"></script>
@endsection
