@extends('layouts.index')

@section('page.title', 'News')

@section('content')

<h3  class="text-center mb-4">  News </h3>
    
<div class="row row-cols-1 row-cols-sm-2 d-flex justify-content-evenly mt-5">

    @forelse ($newsList as $item)
            
        <div class="card  mb-5" style="max-width: 520px;">
            <div class="row g-0">
                <div class="col-md-4" style="overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('img/planet.jpg') }}" class="img-fluid" style=" height: 100%; width: 100%; object-fit: cover;" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-text text-primary-emphasis mb-2" style="text-align:end">{{ $item->category }}</div>
                        <h5 class="card-title">{{ $item->title }}</h5>                        
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text"><small class="text-body-secondary">{{ $item->name }}   {{ $item->surname }}</small></p>
                        <div class="row g-0">
                            <a class="navbar-brand text-primary-emphasis" href="{{ route('article', $item->id)}}">
                                More detailed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       @empty 

       <div>There is no news</div>          
       
    @endforelse

@endsection