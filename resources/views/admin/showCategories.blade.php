@extends('layouts.index')
@section('page.title', 'categories') 

@section('content')

<h2 class="text-center mb-4">Categories</h2>
<div class="">    
    <ul class="list-group list-group-flush">

        @foreach ($categories as $category)          
   
                <li class="list-group-item">
                    <a class="navbar-brand" href ="{{ route('news.category', $category->id) }}">
                        <div class=" d-flex justify-content-between"> <span class="text-info-emphasis fw-medium ">{{$category->category_name}}</span>
                        <div class="fw-smoll"> {{$category->description}}</div>
                        <div class=""> 
                    </a>
                        <button class="btn btn-outline-danger btn-sm delete" rel="{{$category->id}}" value="/admin/category/delete">
                            Delete
                        </button>
                        <button class="btn btn-outline-success btn-sm">
                            <a class="navbar-brand" href="{{route('admin.edit.category', ['category'=>$category])}}">Redact</a> 
                    </div>
                </div>
                </li>   
        
         @endforeach
    </ul>
</div>

@endsection

@push('jsDel')
<script type="text/javascript" src="{{ asset("js/delete.js") }}"></script>
@endpush