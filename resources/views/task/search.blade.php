@extends('layout.app')

@section('title', 'Wyszukiwanie zadań')

@section('content')
    <div class="result-search">
        <h1 class="text-center mt-3">Dane Klienta - id: #{{ $task->id }}</h1>
        <div class="row mt-1">
            <div class="col-12">
                <p>Id domownika: {{ $task->pal_id }}</p>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <p>Opis: {{ $task->description }}</p>
            </div>
        </div>
        
        <td>
            <a class="btn btn-sm btn-warning"
               href="{{ url()->previous() }}"
            >
                Wróć
            </a>
        </td>

    </div>

@endsection
