@extends('base')

@section('title', 'Ovìøení emailové adresy')
@section('description', 'Nechte si znovu zaslat odkaz pro ovìøení emailové adresy.')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ovìøení emailové adresy</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Odkaz pro ovìøení byl právì zaslán do Vaší emailové schránky.
                            </div>
                        @endif

                        Pøedtím, než budete pokraèovat, se prosím ujistìte, že jste pøedtím neobdrželi odkaz pro ovìøení.
                        Pokud jste takový email neobdrželi,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">kliknìte sem pro odeslání nového</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
