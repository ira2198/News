@extends('layouts.index')

@section('page.title', ' Main')


@section('content')


    <div class="welcome">
        
        <h3 class="text-center text-info-emphasis fw-bold">WELCOME</h3>
        <h3 class="text-center fw-normal mb-4">to our news portal!</h3>
    </div>

    <div class="d-flex flex-row flex-wrap justify-content-between">
        
        <div class="">        
            @include('includes.currencies')
        </div>


        <div class="col-9" style="margin-top:150px" >
            
           <h4 class="text-center"> {{__('Rambler news')}} </h4>

                <div class="">
                    
                    @forelse ($ramblerNews as $item)
                
                    <div class="card mb-4 p-3">
                        <h5>{{$item->title}}</h5>
                       <p> {{$item->description}}</p>
                        {{$item->author}}
                    </div>
                    @empty
                        {{__('There is no news')}}  
                    @endforelse
                    
                </div>
           
        </div>

    </div>

{{$ramblerNews->links() }}


@endsection
    
 