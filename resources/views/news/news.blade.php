@extends('layouts.index')

{{-- {{ dd($newsList)}} --}}
@section('page.title')
   {{ $category->category_name }} news 
@endsection

@section('content')

   <h3  class="text-center mb-4">  {{ $category->category_name }} </h3>
    
    <div class="row row-cols-1 row-cols-sm-2 d-flex justify-content-evenly mt-5">

        @forelse ($newsList as $item)
                
            <div class="card me-1 mb-5" style="max-width: 520px;">
                <div class="row g-0">
                    <div class="col-md-4" style="overflow: hidden; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/planet.jpg') }}" class="img-fluid" style=" height: 100%; width: 100%; object-fit: cover;" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $item->users->first_name }}  {{ $item->users->last_name }}</small></p>
                            <div class="row g-0">
                                <a class="navbar-brand text-primary-emphasis" href="{{ route('article',  $item->id)}}">
                                    More detailed</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        @empty
            There is no news  
             
        @endforelse
        {{ $newsList->links() }}
    </div>   
    
     
@endsection