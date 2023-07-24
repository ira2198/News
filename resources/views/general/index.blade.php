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



        <div class="mt-5" style="width: 600px;">
            
           <h4 class="text-center"> {{__('Rambler news')}} </h4>

           <div class="card card-body p-2">
                @forelse ($ramblerNews as $item)
                
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" 
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo{{$item->id}}" 
                            aria-expanded="false" aria-controls="collapseTwo">
                            {{($item->title)}}
                          </button>
                        </h2>

                        <div id="collapseTwo{{$item->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                
                                <p>{{($item->description)}}</p>
                            
                                <div class="">
                            
                                    <div class="">{{($item->link)}}</div>
                                    <div class="text-end"> 
                                        {{($item->author)}}                                
                                        {{($item->pub_date)}}
                                    </div>
                                </div>
                            
                            </div>
                      </div>

                    

                </div>

                @empty
                    {{__('There is no news')}}  
                @endforelse
            </div> 
            </div>
        </div>


    </div>




@endsection
    
 