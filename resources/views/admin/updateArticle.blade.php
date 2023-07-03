
@extends('layouts.index')

@section('page.title', 'Create article')
{{-- {{ dd($news)}} --}}

@section('content')

    <h2 class="descript text-center mb-5">Update  article</h2>
    <div class="d-flex flex-column align-items-center">

        <form class="d-flex flex-column w-50" action="{{route ('admin.article.update', ['news'=> $news])}}" method ="post">

            @csrf
            @method('put')

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Article title</label>
                <input type="text" name="title" placeholder="Title"  class="form-control mb-3" value="{{ $news->title}}">
            </div>

            <div class=""> 
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Description</label>
                <textarea placeholder="description"  name="description"  class="form-control mb-3" rows="3" value="{{ $news->description }}"> {{ $news->description }} </textarea>
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Author</label>
                <input type="text" name='user_id' placeholder="specify the number 1-10" class="form-control mb-3" value="{{ $news->user_id }}">
                {{-- <input type="text" name='user_id' placeholder="Author" class="form-control mb-3" value="{{ $news->user_id}}">    --}}
            </div> 

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Category</label>
                <select class="form-control mb-3" name="categories_id" value="{{$news->categories_id }}">
                    @foreach ($categories as $item)
                        <option  value="{{$item->id}}">
                            {{$item->category_name}}
                        </option>
                    @endforeach  
                    
                </select>                
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Sources</label>
                <select class="form-control mb-3" multiple name="sources[]" id="sources mb-4" >
                    @foreach ($sources as $item)                       
                    <option @if(in_array($item->id, $news->sources->pluck('id')->toArray())) selected @endif value="{{ $item->id}}">                    
                        {{$item->id}}. {{$item->name_source}}  
                    </option>
                        
                    @endforeach  
                </select>                
            </div>
           
            <div class='d-flex flex-column mb-4 text-info-emphasis fw-medium'>Status:</p>
                <select name="status" id="status">
                    <option @if($news->status === 'HOT') {selected} @endif> HOT</option> 
                    <option @if($news->status === 'ACTIVE') {selected} @endif> ACTIVE </option>
                    <option @if($news->status === 'WORKING') {selected} @endif> WORKING </option>
                    <option @if($news->status === 'BLOKED') {selected} @endif>BLOKED</option>          
                </select>
            </div>

            <div class=" mb-4"> <p class="text-info-emphasis fw-medium">Content:</p>
                <input id="x" value="" type="hidden" name="text" value="{{$news->text}}">
                <trix-editor input="x" value="{{$news->text}}">{{$news->text}}</trix-editor>
            </div>
            
            <button class="btn btn-info">To publish</button>
        </form>
     

@endsection