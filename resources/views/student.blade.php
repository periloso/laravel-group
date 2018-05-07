@extends('master')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $student->id }}</th>
            <td>{{ $student->name }}</td>

            <!-- Cao!! -->
            {{--Per non effettuare l'escaping, usate questa sintassi--}}
            {{-- <td>{!! $group->name !!}</td> --}}
        </tr>
        </tbody>
    </table>


    <form action="/students/{{ $student->id }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input name="name" type="text" class="form-control" placeholder="Name" value="{{ $student->name }}">
        </div>

        <div class="form-group">
            <!-- Il campo non è modificabile in quanto non è incluso nell'array $fillable -->
            <label for="saves">Saves (no. salvataggi, NON MODIFICABILE)</label>
            <input name="saves" type="text" class="form-control" placeholder="Saves" value="{{ $student->saves }}">

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <small class="text-danger">{{ $error }}</small>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
@endsection