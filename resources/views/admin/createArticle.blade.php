
@extends('layouts.index')

@section('page.title', 'Create article')



@section('content')
   
    <h2 class="descript text-center mb-5">Create article</h2>
    <div class="d-flex flex-column align-items-center">

        <form class="d-flex flex-column w-50" action="{{route ('admin.article.store')}}" method ="post">

            @csrf

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Article title</label>
                <input type="text" name="title" placeholder="Title"  class="form-control mb-3" value="{{ old('title')}}">
                @error("title")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

            <div class=""> 
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Description</label>
                <textarea placeholder="description"  name="description"  class="form-control mb-3" rows="3" value="{{ old('description') }}"></textarea>
                @error("description")<p class="text-danger"> {{$message}}</p> @enderror  
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Author</label>
                <input type="text" name='user_id' placeholder="specify the number 1-10" class="form-control mb-3" value="{{Auth::user()->id}}">
                @error("user_id")<p class="text-danger"> {{$message}}</p> @enderror 
                {{-- <input type="text" name='user_id' placeholder="Author" class="form-control mb-3" value="{{ old('user_id') }}">    --}}
            </div> 

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Category</label>
                <select class="form-control mb-3" name="categories_id" value="{{ old('categories_id') }}">
                    <option hidden disabled selected > please select a category </option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">
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
                    <option value="{{ $item->id}}"
                        @if(in_array($item->id, old('sources') ?? [])) selected @endif value="{{ $item->id}}">                    
                        {{$item->id}}. {{$item->name_source}}  
                    </option>
                        
                    @endforeach  
                </select>  
                @error("sources")<p class="text-danger"> {{$message}}</p> @enderror                 
            </div>
           
            <div class='d-flex flex-column mb-4 text-info-emphasis fw-medium'>Status:</p>
                <select name="status" id="">
                    <option @if(old('status') === 'hot') selected @endif value="{{\App\Enums\NewsStatus::HOT->value}}">
                        HOT
                    </option> 
                    <option @if(old('status') === 'active') selected @endif  value="{{\App\Enums\NewsStatus::ACTIVE->value}}"> 
                        ACTIVE 
                    </option>
                    <option @if(old('status') === 'working') selected @endif  value="{{\App\Enums\NewsStatus::WORKING->value}}"> 
                        WORKING 
                    </option>
                    <option @if(old('status') === 'bloked') selected @endif  value="{{\App\Enums\NewsStatus::BLOKED->value}}">
                        BLOKED
                    </option> 
                </select>
                @error("status")<p class="text-danger"> {{$message}}</p> @enderror  
            </div>

            <div class=" mb-4"> <p class="text-info-emphasis fw-medium">Content:</p>
                <input id="x" value="" type="hidden" name="text" value="{!! old('text') !!}">
                <trix-editor input="x" value="{!! old('text') !!}"></trix-editor>
                @error("text")<p class="text-danger"> {{$message}}</p> @enderror  
            </div>
            
            <button class="btn btn-info">To publish</button>
        </form>
     

@endsection