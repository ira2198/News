@extends('layouts.index')

@section('page.title', 'News')

@section('content')

  
<h2 class="text-center mb-4">Soutces</h2>
{{-- {{dd($sources)}} --}}

<ul class="list-group list-group-flush">
    
    @forelse ($sources->sources as $source)

        <li class="list-group-item  mb-4">
            <div class="">
              <div class="h5">{{$source->name_source}}  </div>            
                <div class="">{{$source->description}}</div>                 
                <div class="">{{$source->links}}</div>
            </div>      
        </li>

    @empty

<div class="h5 text-center mt-5 mb-5"> No sources are specified for this news! </div>
<hr>
    @endforelse 
<div class=""></div>
</ul>

@endsection

