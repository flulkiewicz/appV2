@extends('layout.app')

@section('title', 'Zadania')

@section('content')
    <div>
        <h1 class="text-center mt-3">Lista Zadań</h1>
        <hr/>
        <div class="row mt-1">
            <div class="col-12 text-right">
                <a class="btn btn-outline-light" href="{{ route('task.create') }}">+ Nowe Zadanie</a>
            </div>
        </div>
        <hr>
        

        <form action="{{ route('task.paltasks') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pal_id">Wyszukaj po Id Domownika:</label>
                <div class="input-group mb-3">
                    <input class="form-control text-white" type="text" id="pal_id" name="pal_id"
                       placeholder="Proszę podać id Domownika"
                       value="{{ old('pal_id') }}">
                    <button type="submit" class="btn btn-outline-light">
                        Wyszukaj
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (session('error'))
        <div class="row mt-4">
            <div class="alert alert-danger">{{ session('error') }}</div>
        </div>
    @endif


        <div class="row mt-4">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th class="text-white">Id Domownika</th>
                        <th class="text-white">Id Zadania</th>
                        <th class="text-white">Opis</th>
                        
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="text-white">{{ $task->pal_id }}</td>
                            <td class="text-white">{{ $task->id }}</td>
                            <td class="text-white">{{ $task->description }}</td>

                            <td>
                                <a class="btn btn-sm btn-outline-secondary"
                                   href="{{ route('task.edit', $task->id) }}"
                                >
                                    Edytuj
                                </a>
                            </td>

                            

                            <td>
                                <form action="{{ route('task.destroy', $task->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $tasks->links() !!}
        </div>
    </div>

@endsection
