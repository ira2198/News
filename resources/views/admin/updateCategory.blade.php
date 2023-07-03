
@extends('layouts.index')

@section('page.title', 'Create category')


@section('content')

    <h2 class="descript text-center mb-5">Update category</h2>
    <div class="d-flex flex-column align-items-center">

        <form class="d-flex flex-column w-50" action="{{route ('admin.update.category', $category)}}" method ="post">

            @csrf

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Category name</label>
                <input type="text" name="category_name" placeholder="Title"  class="form-control mb-3" value="{{ $category->category_name}}">
            </div>

            <div class=""> 
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Description</label>
                <textarea placeholder="description"  name="description"  class="form-control mb-3" rows="3" value="{{$category->description}}">
                    {{$category->description}}
                </textarea>
            </div>

           
            
            <button class="btn btn-info">Save</button>
        </form>
     

@endsection
 