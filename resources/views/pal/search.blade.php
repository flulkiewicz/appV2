@extends('layout.app')

@section('title', 'Wyszukiwanie Domowników')

@section('content')
    <div>
        <h1 class="text-center mt-3">Dane Domownika - id: #{{ $pal->id }}</h1>
        <div class="row mt-1">
            <div class="col-12">
                <p>Imię: {{ $pal->first_name }}</p>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <p>Nazwisko: {{ $pal->last_name }}</p>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <p>Telefon: {{ $pal->phone }}</p>
            </div>
        </div>

        <td>
            <a class="btn btn-sm btn-warning"
               href="{{ route('pal.index') }}"
            >
                Wróć
            </a>
        </td>
    </div>

@endsection
