@extends('layouts.header') 

@section('content')

<main class="container">
    @if($degrees->isEmpty()) 
        <p class='no-data'>There is no data to display.</p>
    @else
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Degree</th>
                    <th>Courses</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($degrees as $degree) 
                    <tr>
                        <td class="degree-name">
                            <strong>{{ $degree->nombre_carrera }}</strong>
                        </td>
                        <td>
                            <ul class="courses-list">
                                {{-- 'materias' es la relación definida en el modelo --}}
                                @foreach ($degree->materias as $materia) 
                                    <li>{{ $materia->nombre_materia }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                           <strong>{{ $degree->duracion }} years</strong>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</main>

@endsection