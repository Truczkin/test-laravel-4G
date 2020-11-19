@extends('base')

@section('title', 'Kontakty')
@section('description', 'Kontakty')

@section('content')
    <h1>Kontakty</h1>
    
    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
                Mauris suscipit, ligula sit amet pharetra semper, nibh ante 
                cursus purus, vel sagittis velit mauris vel metus.
            </div>
            <div class="col">
                Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas 
                nulla, et sollicitudin sem purus in lacus. Praesent id justo 
                in neque elementum ultrices.
            </div>
            <div class="col">
                Pellentesque arcu. Praesent in mauris eu tortor porttitor 
                accumsan. Etiam dui sem, fermentum vitae, sagittis id, 
                malesuada in, quam.
            </div>
            <div class="col">
                Ut enim ad minima veniam, quis nostrum exercitationem ullam 
                corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
                consequatur?
            </div>
        </div>
    </div>
    <h2>Kontaktní formulář</h2>
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="firstname">Jméno</label>
            <input type="firstname" name="firstname" id="firstsname" class="form-control" value="{{ old('firstname') }}" required minlength="3" maxlength="20" />
        </div>
        
        <div class="form-group">
            <label for="lastname">Příjmení</label>
            <input type="lastname" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}" required minlength="3" maxlength="50" />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required email minlength="3" maxlength="50" />
        </div>

        <div class="form-group">
            <label for="phone">Číslo</label>
            <input name="phone" id="phone" rows="4" class="form-control" required minlength="3" maxlength="10" value="{{ old('phone') }}" />
        </div>
        
        <div class="form-group">
            <label for="text">Zpráva</label>
            <textarea name="text" id="text" rows="4" class="form-control" required minlength="5" maxlength="255">{{ old('text') }}</textarea>
        </div>        

        <button type="submit" class="btn btn-primary">Poslat zprávu</button>
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