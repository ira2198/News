@extends('layouts.index')

@section('page.title', 'Application')

@section('content')

@if ($errors->any())
@foreach($errors->all() as $error)
    <x-alert type="danger" :message="$error"></x-alert>
@endforeach
@endif

<h2 class="descript text-center mb-5">Sending a request</h2>
<div class="d-flex flex-column align-items-center">

    <form class="d-flex flex-column w-50" action="{{route('appeal.check.store')}}" method ="post">

        @csrf

        <div class="">
            <label  class="form-check-label mb-2 text-info-emphasis fw-medium">The name of the customer</label>
            <input type="text" name="name" placeholder="Name"  id="name" class="form-control mb-3" value="{!! old('name')!!}">
        </div>


        <div class="">
            <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Phone numbers.</label>
            <input type="text" name='phone' placeholder="Phone" class="form-control mb-3" value="{!! old('phone') !!}">   
        </div> 

        <div class="">
            <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Email addresses.</label>
            <input type="email" name='email' placeholder="email" class="form-control mb-3" value="{!! old('email') !!}"> 
        </div>
        
        <div class=""> 
            <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Description</label>
            <textarea placeholder="Description"  name="description" class="form-control mb-3" rows="3" value="{!! old('description') !!}"></textarea>
        </div>       

        <button  class="btn btn-info" >Send</button>        
        
    </form>
</div>

@endsection