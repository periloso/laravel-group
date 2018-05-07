@extends('master')

@section('content')
    <form action="/students" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input name="name" type="text" class="form-control" placeholder="Name" value="{{ $student->name or 'Nome di default' }}">

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <small class="text-danger">{{ $error }}</small>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
@endsection