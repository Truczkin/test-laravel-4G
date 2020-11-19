@extends('base')

@section('title', 'Úvod')
@section('description', 'Úvod')

@section('content')
    @if (session('verified'))
        <div class="alert alert-success">Emailová adresa byla úspěšně ověřená.</div>
    @endif
    <h1 class="text-center mb-4">Testový úkol - základní web ve frameworku Laravel</h1>
@endsection
