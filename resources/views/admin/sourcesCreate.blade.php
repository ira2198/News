
@extends('layouts.index')

@section('page.title', 'Create article')


@section('content')

    <h2 class="descript text-center mb-5">Create Source</h2>
    <div class="d-flex flex-column align-items-center">

        <form class="d-flex flex-column w-50" action="{{route ('admin.source.store')}}" method ="post">

            @csrf

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Source title</label>
                <input type="text" name="name_source" placeholder="Title"  class="form-control mb-3" value="{{ old('source_name')}}">
            </div>

            <div class=""> 
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Description</label>
                <textarea placeholder="description"  name="description"  class="form-control mb-3" rows="3" value="{{ old('description') }}"></textarea>
            </div>

            <div class=""> 
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Links</label>
                <textarea placeholder="links"  name="links"  class="form-control mb-3" rows="3" value="{{ old('links') }}"></textarea>
            </div>
            
            <button class="btn btn-info">Save</button>
        </form>
     

@endsection