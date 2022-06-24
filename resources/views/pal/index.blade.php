@extends('layout.app')

@section('title', 'Domownicy')

@section('content')

<!--MODAL - work in progress -->
<div class="modal fade" id="workInProgressModal" tabindex="-1" aria-labelledby="workInProgressModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="workInProgressModal">Hurra!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-black">
                Ta funkcjonalność niedługo będzie dostępna, nasi najlepsi mistrzowie nad tym pracują!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>
<!--End of MODAL-->





<div>
    <h1 class="text-center mt-3">Lista Domowników</h1>
    <hr />
    <div class="row mt-1">
        <div class="col-12 text-right">
            <a class="btn btn-outline-light" href="{{ route('pal.create') }}">+ Nowy Domownik</a>
        </div>
    </div>
    <hr>
    <div class="row mt-4">
        <form action="{{ route('pal.search') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pal_id">Id Domownika:</label>
                <div class="input-group mb-3">
                    <input class="form-control text-light" type="text" id="pal_id" name="pal_id"
                        placeholder="Proszę podać id Domownika" value="{{ old('pal_id') }}">
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

    <div class="row mt-4 result-search">
        <div class="col-12">
            <table class="table">
                <tr>
                    <th class="text-light">Id</th>
                    <th class="text-light">Imię</th>
                    <th class="text-light">Nazwisko</th>
                    <th class="text-light">Telefon</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($pals as $pal)
                <tr>
                    <td class="text-light">{{ $pal->id }}</td>
                    <td class="text-light">{{ $pal->first_name }}</td>
                    <td class="text-light">{{ $pal->last_name }}</td>
                    <td class="text-light">{{ $pal->phone }}</td>

                    <td>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#workInProgressModal">
                            PRZYPISANE ZADANIA
                        </button>

                    </td>


                    <td>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('pal.edit', $pal->id) }}">
                            Edytuj
                        </a>
                    </td>



                    <td>
                        <form action="{{ route('pal.destroy', $pal->id)}}" method="post">
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
        {!! $pals->links() !!}
    </div>
</div>

@endsection