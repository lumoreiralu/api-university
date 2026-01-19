<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>University Hello Wordl</title>
</head>
<body>
    
<nav>
    <ul class="ul_header">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{url('/degrees')}}">Degrees</a></li>
        <li><a href="{{ url('/courses') }}">Courses</a></li>
        <li><a href="{{ url('/showLogin') }}">Login</a></li>
        <li><a href="{{ url('/logout') }}">Logout</a></li>
        <li> <div class="dropdown">
                <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                <a href="{{ url('/formNewCourse') }}">New Course</a>
                <a href="{{ url('/formNewDegree') }}">New Degree</a>
                </div>
            </div>
        </li>

    </ul>

</nav>

@yield('content')

@include('layouts.footer')

