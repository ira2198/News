@extends('layouts.index')

@section('page.title', ' Main')


@section('content')

    <div class="welcome">
        
        <h3 class="text-center text-info-emphasis fw-bold">WELCOME</h3>
        <h3 class="text-center fw-normal mb-4">to our news portal!</h3>
    </div>
    <div class="flex-grow-1">
        This is a task for lesson 5, task 1
    </div>
    <div class=""><img src="{{ asset('img/schemeBD.png') }}" class="img-fluid"></div>

@endsection
    
 