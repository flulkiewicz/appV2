@extends('layout.app')

@section('title', 'Edycja')

@section('content')
    <div>
        <h1 class="text-center mt-3">Edycja danych Zadania</h1>
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
                <form action="{{ route('task.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="pal_id">Id domownika</label>
                        <input class="form-control text-white" type="text" id="pal_id" name="pal_id"
                               placeholder="np. 1" value="{{ $task->pal_id }}"><br>
                    </div>

                    <div class="form-group">
                        <label for="description">Opis:</label><br>
                        <input class="form-control text-white" type="text" id="description" name="description"
                               placeholder="np. Wynieść śmieci" value="{{ $task->description }}"><br>
                    </div>

                    

                    <button type="submit" class="btn btn-primary mb-2 text-right">
                        Zapisz
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection
