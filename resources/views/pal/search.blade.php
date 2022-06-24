@extends('layout.app')

@section('title', 'Wyszukiwanie Domowników')

@section('content')
    <div class="container d-flex-column justify-content-center result-search p-4">
        <h1 class="text-center mt-3">Dane <span class="yellow-text">Domownika</span> - id: #<span class="blue-text">{{ $pal->id }}</span></h1>
        <div class="row mt-5 text-center">
            <div class="col-12">
                <p><span class="blue-text">Imię:</span> {{ $pal->first_name }}</p>
            </div>
        </div>
        <div class="row mt-1 text-center">
            <div class="col-12">
                <p><span class="blue-text">Nazwisko:</span> {{ $pal->last_name }}</p>
            </div>
        </div>
        <div class="row mt-1 text-center">
            <div class="col-12">
                <p><span class="blue-text">Telefon:</span>  {{ $pal->phone }}</p>
            </div>
        </div>
        
        <div class="mt-5 mb-5 text-center">
            <a class="btn btn-sm btn-warning "
               href="{{ route('pal.index') }}"
            >
                Wróć
            </a>
        </div>
        
    </div>

@endsection
