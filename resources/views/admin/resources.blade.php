@extends('layouts.index')

@section('page.title', 'Admin')

@section('content')

   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h2 class="descript text-center mb-5">Resources</h2>
   </div>

<div class=" d-flex">
    
   <div class="card w-50 p-3" style="max-height:360px;">
      <form action="{{route ('admin.resource.store')}}" method ="post">

         @csrf
         <h3 class = "text-end mt-3 mb-3 text-secondary-emphasis text-opacity-75">Add a resource for downloading news</h3>
      
         <div class="mb-4">
            <label for="" class="form-label">Name resource</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            @error("name")<p class="text-danger"> {{$message}}</p> @enderror  
         </div>
         <div class="mb-4">
            <label for="" class="form-label">Link</label>
            <input type="text" name="link" class="form-control" value="{{old('link')}}">
            @error("link")<p class="text-danger"> {{$message}}</p> @enderror  
         </div>
         <div class="w-100 text-end">
            <button class="btn btn-outline-warning mgt-4 w-50">Add</button>
         </div>

      </form>
   </div>
   <div class="ms-5 text-center"> 
      <p>List</p>
     
      @foreach ($resources as $item)
         <div class="mb-4">
            <h5>{{$item->name}}</h5>         
           
               {{$item->link}}
           
         </div>
      @endforeach
   </div>

</div>

@endsection
 