@extends('layouts.index')

@section('page.title')
    {{ $article->title }}
@endsection

@section('content')

<div class="descript  text-end mb-5 text-info-emphasis"> 
    
    <div>category: {{$article->category->category_name}}</div>
    <div>id: {{($article->id) ?? 0}}</div>
    <div >author: {{$article->users->name}} </div>
    <div>date of publication: {{($article->created_at) ?? "00:00:00" }}</div>
</div>

<h3 class="descript  text-center mb-4">{{$article->title}}</h3>

<div class="d-flex flex-row justify-content-between flex-wrap">
        
    <div class=""> 
        @if(current(explode('/', $article->main_img)) === 'http:')
            <img src="{{ asset($article->main_im) }}" class="img-fluid" style=" max-height:500px; max-width: 100%; object-fit: cover;" alt="...">
        @else 
            <img src="{{ Storage::disk('public')->url($article->main_img)}}" class="img-fluid" style=" max-height:500; max-width: 100%; object-fit: cover;" alt="...">  

        @endif
    </div>

    <div class="cotent flex-grow-1">{!!$article->text!!}</div>
</div>

     
@endsection