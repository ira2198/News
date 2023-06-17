@extends('layouts.index')

@section('page.title', 'News')

@section('content')

      
<div class="row row-cols-1 row-cols-sm-2 d-flex justify-content-evenly mt-5">

    @foreach ($newsList as $item)
    
    
        <div class="card  mb-5" style="max-width: 520px;">
            <div class="row g-0">
                <div class="col-md-4" style="overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('img/planet.jpg') }}" class="img-fluid" style=" height: 100%; width: 100%; object-fit: cover;" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        <p class="card-text">{{ $item['description'] }}</p>
                        <p class="card-text"><small class="text-body-secondary">{{ $item['author'] }}</small></p>
                        <div class="row g-0 mb-2">
                            <a class="navbar-brand text-primary-emphasis " href="{{ route('article', ['category' => $item['category'], 'id' => $item['id']])}}">
                                More detailed</a>                                                     
                        </div>
                        <button class="btn btn-outline-danger">Delete</button>
                        <button class="btn btn-outline-success">Redact</button>  
                    </div>
                </div>
            </div>
        </div>

   
    @endforeach

@endsection