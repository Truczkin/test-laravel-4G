@extends('base')

@section('title', 'Služby')
@section('description', 'Výpis všech nabízených služeb')

@section('content')
    <table class="table table-striped table-bordered table-responsive-md">
        <thead>
            <tr>
                <th>Služba</th>
                <th>Popis služby</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td>
                        <a href="{{ route('service.show', ['service' => $service]) }}">
                            {{ $service->title }}
                        </a>
                    </td>
                    <td>{{ $service->description }}</td>
                    @auth
                    <td>
                        <a href="{{ route('service.edit', ['service' => $service]) }}">Editovat</a>
                        <a href="#" onclick="event.preventDefault(); $('#service-delete-{{ $service->id }}').submit();">Odstranit</a>

                        <form action="{{ route('service.destroy', ['service' => $service]) }}" method="POST" id="service-delete-{{ $service->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Aktuálně nejsou žádné služby
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @auth
    <a href="{{ route('service.create') }}" class="btn btn-primary">
        Přidat službu
    </a>
    @endauth
@endsection