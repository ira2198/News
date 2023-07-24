

<div class="" style="width: 250px">

    <div class="border border-warning rounded-end border-3">
        <h5 class="m-2 text-success-emphasis">{{__('Exchange rates')}}</h5>

            <div class="border-top p-3">
                <div class=" mb-2">
                    <div class="fw-bolder">{{$currencies['values'][13]['Name']}}</div>                    
                        {{$currencies['values'][13]['Nominal']}} {{$currencies['values'][13]['CharCode']}} = {{$currencies['values'][13]['Value']}}                    
                </div>
                <div class=" mb-2">
                    <div class="fw-bolder">{{$currencies['values'][14]['Name']}}</div>                     
                        {{$currencies['values'][14]['Nominal']}} {{$currencies['values'][14]['CharCode']}} = {{$currencies['values'][14]['Value']}}
                    
                </div>
                <div class=" mb-2">
                    <div class="fw-bolder">{{$currencies['values'][18]['Name']}} </div>                    
                        {{$currencies['values'][18]['Nominal']}} {{$currencies['values'][18]['CharCode']}} = {{$currencies['values'][18]['Value']}}
                
                </div>
                <div class=" mb-2">
                    <div class="fw-bolder"> {{$currencies['values'][22]['Name']}} </div>                   
                        {{$currencies['values'][22]['Nominal']}} {{$currencies['values'][22]['CharCode']}} = {{$currencies['values'][22]['Value']}}
                    
                </div>
            </div>
        
     
        <div class="">

            <button class="btn btn-outline-secondary mb-3 ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                {{__('Other currencies')}}
            </button>

            <div class="collapse" id="collapseExample">

                <div class="card card-body p-2">
                    {{__('Exchange rates')}}                     
                
                    <?php $i=0; ?>

                    @foreach ($currencies['values'] as $item)            
                        @php
                        $i++;
                        @endphp

                        <div class="accordion  mt-1" id="accordionPanelsStayOpenExample">                
                            <div class="accordion-item">
                                <h2 class="accordion-header">

                                    <button class="accordion-button collapsed p-1 bg-warning-subtle text-emphasis-warning " 
                                        type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo{{$i}}" 
                                        aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">

                                        <p class="m-2  fw-bolder"> 
                                            {{$item['CharCode']}} 
                                        </p>
                                        {{  $item['Name']}}
                                    </button>
                                </h2>
                            </div>

                            <div id="panelsStayOpen-collapseTwo{{$i}}" class="accordion-collapse collapse p-0">

                                <div class="accordion-body ">
                                    {{$item['Nominal']}}  {{$item['CharCode']}} = {{$item['Value']}} RUB
                                </div>

                            </div>
                        </div>          
                
                    @endforeach 
                </div>  
            </div>
        </div>
    </div> 
 
</div>
