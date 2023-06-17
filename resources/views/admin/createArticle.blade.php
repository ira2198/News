
@extends('layouts.index')

@section('page.title', 'Create article')

@section('content')

    <h2 class="descript text-center mb-5">Create article</h2>
    <div class="d-flex flex-column align-items-center">

        <form class="d-flex flex-column w-50" action="{{route ('admin.article.store')}}" method ="post">

            @csrf

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Article title</label>
                <input type="text" name="title" placeholder="Title"  class="form-control mb-3" value="{!! old('title')!!}">
            </div>

            <div class=""> 
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Description</label>
                <textarea placeholder="description"  class="form-control mb-3" rows="3" value="{!! old('description') !!}"></textarea>
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Author</label>
                <input type="text" name='author' placeholder="Author" class="form-control mb-3" value="{!! old('author') !!}">   
            </div> 

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Category</label>
                <select class="form-control mb-3" name="category" id="category" value="{!! old('category') !!}">
                    
                    @foreach ($categories as $item)
                        <option>
                            {{$item}}
                        </option>
                    @endforeach                
                </select>                
            </div>

            <div class='d-flex flex-column mb-4'> <p class="text-info-emphasis fw-medium"> Status:</p>
                <div class="">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label  class="form-check-label">Draft</label>
                </div>
                
                <div class=""> 
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label  class="form-check-label">Active</label>
                </div>
                    
                <div class="">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label  class="form-check-label">Bloked</label>
                </div>               
            </div>

            <div class=" mb-4"> <p class="text-info-emphasis fw-medium">Content:</p>
                <input id="x" value="" type="hidden" name="text" >
                <trix-editor input="x" value="{!! old('category') !!}"></trix-editor>
            </div>
            <button class="btn btn-info">To publish</button>
        </form>
     

@endsection