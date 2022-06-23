@extends('layout.app')

@section('title', 'Nowe Zadanie')

@section('content')
    <div>
        <h1 class="text-center mt-3">Nowe zadanie</h1>
        <hr/>
        @if ($errors->any())
            <div class="row mt-1">
                <div class="alert alert-danger" role="alert">
                    <strong>Walidacja danych</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="row mt-1">
            <div class="col-12">
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="pal_id">Id Domownika:</label>
                        <input class="form-control text-white" type="text" id="pal_id" name="pal_id" placeholder="np. 1"><br>
                    </div>

                    <div class="form-group">
                        <label for="description">Opis:</label><br>
                        <input class="form-control text-white" type="text" id="description" name="description" placeholder="np. Wynieść śmieci"><br>
                    </div>

                    

                    <button type="submit" class="btn btn-primary mb-2 text-right">
                        Zapisz
                    </button>

                </form>
            </div>
        </div>
        @if (session('error'))
        <div class="row mt-4">
            <div class="alert alert-danger">{{ session('error') }}</div>
        </div>
        @endif
    </div>

@endsection
