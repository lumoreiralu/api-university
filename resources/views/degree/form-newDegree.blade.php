@extends('layouts.header')
@section('content')

<main class="page-content">
    <div class="form-wrapper">
        <section class="form-card">
            <header class="form-header">
                <h2>Add New Degree</h2>
                <p>Register a new academic program</p>
            </header>

            <form action="{{ route('degrees.store') }}" method="POST">
                @csrf
                
                <div class="input-group">
                    <label for="nombre_carrera">Degree Name</label>

                    <input type="text" id="nombre_carrera" name="nombre_carrera" 
                           value="{{ old('nombre_carrera') }}" 
                           placeholder="e.g. Software Engineering">
                    

                    @error('nombre_carrera')
                        <span class="error-text" style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="duracion">Duration</label>
                    <input type="text" id="duracion" name="duracion" 
                           value="{{ old('duracion') }}" 
                           placeholder="e.g. 5 Years">
                    
                    @error('duracion')
                        <span class="error-text" style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Add Degree</button>
            </form>
        </section>
    </div>
</main>

@endsection