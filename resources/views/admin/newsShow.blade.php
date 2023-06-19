@extends('layouts.index')

@section('page.title', 'News')

@section('content')

      
<div class="row row-cols-1 row-cols-sm-2 d-flex justify-content-evenly mt-5">

    @foreach ($newsList as $item)
    
    
        <div class="card p-3 mb-5" style="max-width: 360px;">    
            <div class="d-flex justify-content-between mb-4" >
                <div class=" mr-2 "  style="max-width: 90px;">{{ $item->created_at}}</div>
                <div class="card-text text-primary-emphasis mb-2" style="text-align:end">{{ $item->category }}</div>  
            </div>              
            <h5 class="card-title mb-2">{{ $item->title}}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <p class="card-text"><small class="text-body-secondary">{{ $item->name}}  {{ $item->surname}}</small></p>
            <div class="row g-0 mb-4">
                <a class="navbar-brand text-primary-emphasis " href="{{ route('article',  $item->id)}}">
                    More detailed</a>                                                     
            </div>
                <button class="btn btn-outline-danger">Delete</button>
                <button class="btn btn-outline-success">Redact</button>  
            
        </div>   
    @endforeach

@endsection