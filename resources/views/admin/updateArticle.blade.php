
@extends('layouts.index')

@section('page.title', 'Create article')
{{-- {{ dd($news)}} --}}

@section('content')
    <h2 class="descript text-center mb-5">Update  article</h2>
    <div class="d-flex flex-column align-items-center">
        {{-- enctype="multipart/form-data" --}}
        <form class="d-flex flex-column w-50" action="{{route ('admin.article.update', ['news'=> $news])}}"  enctype="multipart/form-data" method ="post">
            @csrf
            @method('put')

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Article title</label>
                <input type="text" name="title" placeholder="Title"  class="form-control mb-3" value="{{ $news->title}}">
                @error("title")<p class="text-danger"> {{$message}}</p> @enderror
            </div>

            <div class=""> 
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Description</label>
                <textarea placeholder="description"  name="description"  class="form-control mb-3" rows="3" value="{{ $news->description }}"> {{ $news->description }} </textarea>
                @error("description")<p class="text-danger"> {{$message}}</p> @enderror
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Author</label>
                <input type="text" name='user_id' placeholder="specify the number 1-10" class="form-control mb-3" value="{{ $news->user_id }}">
                @error("user_id")<p class="text-danger"> {{$message}}</p> @enderror
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
                @error("categories_id")<p class="text-danger"> {{$message}}</p> @enderror
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Sources</label>
                <select class="form-control mb-3" multiple name="sources[]" id="sources mb-4" >
                    @foreach ($sources as $item)                       
                    <option 
                        @if(in_array($item->id, $news->sources->pluck('id')->toArray())) selected @endif value="{{ $item->id}}">                    
                            {{$item->id}}. {{$item->name_source}}  
                    </option>
                        
                    @endforeach  
                </select>                
                @error("sources")<p class="text-danger"> {{$message}}</p> @enderror
            </div>
           
            <div class='d-flex flex-column mb-4 text-info-emphasis fw-medium'>Status:</p>
                <select name="status" id="status">
                    <option @if($news->status === 'hot') selected @endif value="{{\App\Enums\NewsStatus::HOT->value}}"> 
                        HOT
                    </option> 
                    <option @if($news->status === 'active') selected @endif value="{{\App\Enums\NewsStatus::ACTIVE->value}}"> 
                        ACTIVE 
                    </option>
                    <option @if($news->status === 'working') selected @endif value="{{\App\Enums\NewsStatus::WORKING->value}}"> 
                        WORKING 
                    </option>
                    <option @if($news->status === 'bloked') selected @endif value="{{\App\Enums\NewsStatus::BLOKED->value}}">
                        BLOKED
                    </option>          
                </select>
                @error("status")<p class="text-danger"> {{$message}}</p> @enderror
            </div>

            <div class="">
                <label for="main_img" class="form-check-label mb-2 text-info-emphasis fw-medium">Image</label>
                <img src="{{ Storage::disk('public')->url($news->main_img) }}" />
                <input type="file" name="main_img" id="main_img" class="form-control mb-3" value="{{$news->main_img}}">
                @error("main_img")<p class="text-danger"> {{$message}}</p> @enderror 
                
            </div> 


            <div class=" mb-4"> <p class="text-info-emphasis fw-medium">Content:</p>
                <input id="x" value="" type="hidden" name="text" value="{{$news->text}}">
                <textarea name="text" id="text">{{$news->text}}</textarea>
                @error("text")<p class="text-danger"> {{$message}}</p> @enderror
            </div>
            
            <button class="btn btn-info">Save</button>
        </form>
        @push('jsTextEditor')

        <script>
            ClassicEditor
                .create( document.querySelector( '#text' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
            
        @endpush

@endsection