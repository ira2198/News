@extends('layouts.index')

@section('page.title', 'Autorization')

@section('content')

<h2 class="descript  text-center mb-5">Registration</h2>
    <div class="d-flex flex-column align-items-center">

        <form class="d-flex flex-column w-50" action="{{route('admin.user.store')}}" method ="post">
            @csrf
        
            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Name</label>
                <input type="text" name="first_name" placeholder="Your name"  class="form-control mb-3" value="{{ old('first_name')}}">
                @error("first_name")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Last name</label>
                <input type="text" name="last_name" placeholder="your last name"  class="form-control mb-3" value="{{ old('last_name')}}">
                @error("last_name")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

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
            
            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Email</label>
                <input type="email" name="email" placeholder="your email"  class="form-control mb-3" value="{{ old('email')}}">
                @error("email")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Phone</label>
                <input type="phone" name="phone" placeholder="your phone"  class="form-control mb-3" value="{{ old('phone')}}">
                @error("phone")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

            <div class="">
                <label  class="form-check-label mb-2 text-info-emphasis fw-medium">Avatar</label>
                <input type="file" name="avatar" placeholder="Upload a photo"  class="form-control mb-3" value="{{ old('avatar')}}">
                @error("avatar")<p class="text-danger"> {{$message}}</p> @enderror                
            </div>

            
            <div class="mb-4">
                <input type="checkbox" name="agree" class="form-check-input">
                <label  class="form-check-label">I agree to the processing of personal data</label>
            </div>
            <button class="btn btn-primary">Register</button>
        </form>
        <button class="btn mt-4 btn-dark w-50"><a class ="nav-link" href="{{ route('index')}}">Exit</a></button>
    </div>      
   

@endsection