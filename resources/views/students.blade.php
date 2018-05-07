@extends('master')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">PERICOLI</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>
                    <a href="/students/{{ $student->id }}/edit">
                        {{ $student->id }}
                    </a>
                </td>
                <td>
                    <a href="/students/{{ $student->id }}/edit">
                        {{ $student->name }}
                    </a>
                </td>
                <td>
                    <form action="/students/{{ $student->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn-outline-danger" value="CANCELLA">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/students/create" class="btn btn-info float-right">Aggiungi</a>
    <a href="/students" class="btn btn-info float-left">Indietro</a>
@endsection