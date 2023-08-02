@extends('layouts.index')

@section('page.title', 'Autorization')

@section('content')

<h2 class="descript  text-center mb-5">Edit account</h2>
    <div class="d-flex flex-column align-items-center">

        <form class="d-flex flex-column w-50" action="{{route('user.update', ['user' => $user])}}" enctype="multipart/form-data" method ="post">
            @csrf
        
            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Name</label>
                <input type="text" name="name" placeholder="Your name"  class="form-control mb-3" value="{{$user->name}}">
                @error("name")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>


             @if (Auth::user()->id === $user->id)
                <div class="">
                    <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Password</label>
                    <input type="password" name="password" placeholder="Come up with a password"  class="form-control mb-3" value="{{ old('password')}}">
                    @error("password")<p class="text-danger"> {{$message}}</p> @enderror                
                </div>

                <div class="">
                    <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Current password</label>
                    <input type="password" name="current_password" placeholder="Repeat the password"  class="form-control mb-3" value="{{ old('current_password')}}">
                    @error("current_password")<p class="text-danger"> {{$message}}</p> @enderror                
                </div>
            
            @endif
           
            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Email</label>
                <input type="email" name="email" placeholder="your email"  class="form-control mb-3" value="{{$user->email}}">
                @error("email")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Phone</label>
                <input type="phone" name="phone" placeholder="your phone"  class="form-control mb-3" value="{{$user->phone}}">
                @error("phone")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

            @if(Auth::user()->status === 'admin')
                <div class='d-flex flex-column mb-4 text-info-emphasis fw-medium'>Status:</p>
                    <select name="status" id="status">
                        <option @if($user->status === 'admin') selected @endif value="{{\App\Enums\UserStatus::ADMIN->value}}"> 
                            admin
                        </option> 
                        <option @if($user->status === 'active') selected @endif value="{{\App\Enums\UserStatus::ACTIVE->value}}"> 
                            active 
                        </option>
                        <option @if($user->status === 'remote') selected @endif value="{{\App\Enums\UserStatus::REMOTE->value}}"> 
                            remote 
                        </option>
                                 
                    </select>
                    @error("status")<p class="text-danger"> {{$message}}</p> @enderror
                </div>

            @endif

           
            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Avatar</label>
                <input type="file" name="avatar" placeholder="Upload a photo"  class="form-control mb-3">
                @error("avatar")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

            
            <div class="mb-4">
                <input type="checkbox" name="agree" class="form-check-input">
                <label  class="form-check-label">I agree to the processing of personal data</label>
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
        <button class="btn mt-4 btn-dark w-50"><a class ="nav-link" href="{{ route('account')}}">Exit</a></button>
    </div>      
   

@endsection