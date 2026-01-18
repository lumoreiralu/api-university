@extends('layaouts.header')
@section('content')


<main class="main-content">
    <section class="form-card" style="max-width: 600px;">
        <header class="form-header">
            <h1> <?php echo $msje ?> </h1>
        </header>

        <div style="margin-top: 20px;">
            <a href="home" style="text-decoration: none; color: #98b1ad;">← Volver al listado</a>
        </div>
    </section>
</main>




@endsection