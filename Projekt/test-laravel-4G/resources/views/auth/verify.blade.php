@extends('base')

@section('title', 'Ov��en� emailov� adresy')
@section('description', 'Nechte si znovu zaslat odkaz pro ov��en� emailov� adresy.')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ov��en� emailov� adresy</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Odkaz pro ov��en� byl pr�v� zasl�n do Va�� emailov� schr�nky.
                            </div>
                        @endif

                        P�edt�m, ne� budete pokra�ovat, se pros�m ujist�te, �e jste p�edt�m neobdr�eli odkaz pro ov��en�.
                        Pokud jste takov� email neobdr�eli,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">klikn�te sem pro odesl�n� nov�ho</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
