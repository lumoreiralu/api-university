@extends('layouts.header')
@section('content')

<main class="container-list">
    <header class="list-header">
        <h1>Academic Courses</h1>
    </header>

        <div class="degrees-grid">
            @foreach($courses as $course)
                <article class="degree-card">
                    <div class="card-icon">📚</div>
                    <div class="card-content">
                        <h3>{{$course->nombre_materia}}</h3>
                        <p class="duration-badge">
                            <span>Degree:</span>{{$course->carrera->nombre_carrera}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="actions-group">                          
                            <a href="{{url('formUpdateCourse/'.$course->id)}}" class="btn-action " title="Editar course">
                                <span>✏️</span> Edit
                            </a>
                            
                            <form action="{{ url('deleteCourse/' . $course->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                
                                <button type="submit" class="btn-action" 
                                        onclick="return confirm('Are you sure you want to delete this course?');" 
                                        style="border:none; background:none; padding:0; cursor:pointer;">
                                    <span>🗑️</span> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
                @endforeach
        </div>
</main>


@endsection