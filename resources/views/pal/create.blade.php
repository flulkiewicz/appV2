@extends('layout.app')

@section('title', 'Nowy Domownik')

@section('content')
    <div>
        <h1 class="text-center mt-3">Nowy Domownik</h1>
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
                <form action="{{ route('pal.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="first_name">Imię:</label>
                        <input class="form-control text-white" type="text" id="first_name" name="first_name" placeholder="np. Jan"><br>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Nazwisko:</label><br>
                        <input class="form-control text-white" type="text" id="last_name" name="last_name" placeholder="np. Kowalski"><br>
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefon:</label><br>
                        <input class="form-control text-white" type="text" id="phone" name="phone" placeholder="np. 123-123-789"><br>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2 text-right">
                        Zapisz
                    </button>

                    <a class="btn mb-2 btn-warning"
                           href="{{ route('pal.index') }}"
                        >
                            Wróć
                        </a>


                </form>
            </div>
        </div>
    </div>

@endsection
