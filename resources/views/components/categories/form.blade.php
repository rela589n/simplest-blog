<form action="{{ $sendAction }}" method="post" class="text-dark form">
    @method($sendMethod)
    @csrf

    <div class="form-group form-row align-items-start">
        <label for="name" class="form-info h3 m-0 col-2">
            Name:
        </label>
        <div class="col-10">
            <input id="name" name="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Category name" required="required" value="{{ old('name', $category->name ?? '') }}">

            @error('name')
            <span class="invalid-feedback" role="alert"><label for="name">{{ $message }}</label></span>
            @enderror
        </div>
    </div>

    <div class="form-group form-row align-items-start">
        <label for="description" class="form-info h3 mb-2 mt-0 col-12">Description:</label>
        <div class="col-12">
            <textarea id="description" name="description"
                      class="form-control @error('description') is-invalid @enderror"
                      rows="3" placeholder="Category description">{{ old('description', $category->description ?? '') }}</textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <label for="description">{{ $message }}</label>
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
                   required="required" value="{{ old('uri_alias', $category->uri_alias ?? '') }}">

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

    @yield('category-form-additions')

    @section('category-form-submit')
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
