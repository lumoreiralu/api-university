@extends('layouts.header')
@section('content')

<main class="main-content">
    <section class="form-card" style="max-width: 600px;">
        <header class="form-header">
            <h1>Details of: {{ $degree->nombre_carrera }}</h1>
            <p><strong>Duration:</strong> {{$degree->duracion}} years</p>
        </header>

        <div class="courses-section">
            <h3>Courses included:</h3>
            <ul>
                @forelse ($degree->materias as $materia)
                    <li>{{ $materia->nombre_materia }} - Profesor: {{ $materia->nombre_profesor }}</li>
                @empty
                    <li>No courses registered for this degree yet.</li>
                @endforelse
            </ul>
        </div>

        <div style="margin-top: 20px;">
            <a href="{{ url('/degrees') }}" style="text-decoration: none; color: #98b1ad;">← Back to list</a>
        </div>
    </section>
</main>

@endsection