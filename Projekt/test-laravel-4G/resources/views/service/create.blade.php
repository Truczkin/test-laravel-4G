@extends('base')

@section('title', 'Nová služba')
@section('description', 'Editor pro vytvoření nové služby.')

@section('content')
    <h1>Nová služba</h1>

    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Služba</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required minlength="3" maxlength="80" />
        </div>
        
        <div class="form-group d-flex flex-column">
            <label for="image">Foto</label>
            <input type="file" name="image" id="image"/>
            <div>{{ $errors->first('image') }}</div>
        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ old('url') }}" required minlength="3" maxlength="80" />
        </div>

        <div class="form-group">
            <label for="description">Popis služby</label>
            <textarea name="description" id="description" rows="4" class="form-control" required minlength="5" maxlength="255">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Přidat službu</button>
    </form>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('//cdn.tinymce.com/4/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#content',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            entities: '160,nbsp',
            entity_encoding: 'raw',
        });
    </script>
@endpush