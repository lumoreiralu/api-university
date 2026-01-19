@extends('layouts.header') 
@section('content')

<main class="container-list">
    <header class="list-header">
        <h1>Academic Programs</h1>
        <p>Explore the degrees offered by our University</p>
    </header>

    @if($degrees->isEmpty())
        <div class="no-data">
            <p>No hay datos para mostrar actualmente.</p>
        </div>
    @else
        <div class="degrees-grid">
            @foreach ($degrees as $degree)
                <article class="degree-card">
                    <div class="card-icon">🎓</div>
                    <div class="card-content">
                        <h3>{{ $degree->nombre_carrera }}</h3>
                        <p class="duration-badge">
                            <span>Duration:</span> {{ $degree->duracion }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="actions-group">
                            <a href="{{ url('degree/' . $degree->id_carrera) }}" class="btn-action" title="Ver detalles">
                                <span>👁️</span> Details
                            </a>
                            
                            <a href="{{ url('formUpdateDegree/' . $degree->id_carrera) }}" class="btn-action" title="Editar carrera">
                                <span>✏️</span> Edit
                            </a>
                            
                            <a href="{{ url('deleteDegree/' . $degree->id_carrera) }}" class="btn-action" 
                               onclick="return confirm('¿Are you sure?');" title="DELETE">
                                <span>🗑️</span> Delete
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</main>

@endsection