@extends('layaouts.header')
@section('content')

<main class="main-content">
    <section class="form-card" style="max-width: 600px;">
        <header class="form-header">
            <h1><?php echo $degree->nombre_carrera; ?></h1>
            <p><strong>Duration:</strong> <?php echo $degree->duracion; ?></p>
        </header>

        <div class="courses-section">
            <h3>Courses:</h3>
            <?php if (!empty($courses)): ?>
                <ul class="courses-list">
                    <?php foreach ($courses as $course): ?>
                        <li><?php echo $course->nombre_materia; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No courses registered for this degree.</p>
            <?php endif; ?>
        </div>

        <div style="margin-top: 20px;">
            <a href="home" style="text-decoration: none; color: #98b1ad;">← Volver al listado</a>
        </div>
    </section>
</main>

@endsection