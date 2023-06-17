@extends('layouts.index')

@section('page.title', 'Autorization')

@section('content')

<h2 class="descript  text-center mb-5">Authorization</h2>
    <div class="d-flex flex-column align-items-center">
        <form class="d-flex flex-column w-50" action="" method ="post">
        
            <input type="text" name="login" placeholder="login" class="form-control mb-3">
            <input type="password" name="password" placeholder="password" class="form-control mb-3">
            <div class="mb-3">
                <input type="checkbox" name="checkbox" class="form-check-input">
                <label  class="form-check-label">Remember me</label>
            </div>
            <button class="btn btn-primary">Enter</button>
        </form>
        <button class="btn mt-4 btn-dark w-50"><a class ="nav-link" href="{{ route('index')}}">Exit</a></button>
    </div>      
   

@endsection