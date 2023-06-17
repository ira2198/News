@extends('layouts.index')

@section('page.title', 'categories')
   

@section('content')

<h2 class="text-center mb-4">Categories</h2>


<ul class="list-group list-group-flush">
    @foreach ($categories as $category)

        <li class="list-group-item">
        <a class="navbar-brand text-info-emphasis fw-medium" href ="{{ route('news.category', $loop->index+1) }}">
        {{$category}}</a></li>

    @endforeach
  
</ul>


    

@endsection