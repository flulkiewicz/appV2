@extends('layout.app')

@section('title', 'Zadania Domownika')

@section('content')
    <div>
        <h1 class="text-center mt-3">Lista Zadań Domownika</h1>
        <hr/>
        <div class="row mt-1">
            <div class="col-12 text-right">
                <a class="btn btn-primary" href="{{ route('task.create') }}">+ Nowe Zadanie</a>
            </div>
        </div>
        <hr>
        
        <div class="row mt-4 result-search">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Opis</th>
                        <th>Id Domownika</th>
                        
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->pal_id }}</td>

                            <td>
                                <a class="btn btn-sm btn-secondary"
                                   href="{{ route('task.edit', $task->id) }}"
                                >
                                    Edytuj
                                </a>
                            </td>

                            

                            <td>
                                <form action="{{ route('task.destroy', $task->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            
        </div>
    </div>

@endsection
