@extends('layouts.header')
@section('content')

<main class="main-content">
    <section class="form-card" style="max-width: 600px;">
        <header class="form-header">
            <h1>{{$course->nombre_materia}}</h1>
            <p><strong>Degree:</strong>{{ $course->nombre_carrera}}</p>
        </header>

        <div style="margin-top: 20px;">
            <a href="{{ url('courses') }}" style="text-decoration: none; color: #98b1ad;">← Volver al listado</a>
        </div>
    </section>
</main>

@endsection