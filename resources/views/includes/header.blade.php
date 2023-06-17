

<nav class="navbar bg-body-tertiary">
    <div class="header text-center  container-xl p-4 ">
        <div class="">

            <button class="btn  btn-dark"><a class ="nav-link" href="{{route('index')}}">
                <div class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-heart-fill" viewBox="0 0 16 16">
                    <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707L7.293 1.5Z"/>
                    <path d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9.293Zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018Z"/>
                </svg> </div>Main</a>
            </button>

            <button class="btn btn-outline-primary" ><a class ="nav-link" href="{{ url()->previous() }}">
                <div class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                    <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                </svg></div>Back</a>
            </button>  
        </div> 

        <div class="">      
        <button class="btn btn-light" ><a class="navbar-brand" style="font-size: medium" href="{{ route('categories') }}">News by category</a></button>
        <button class="btn btn-light" ><a class="navbar-brand" style="font-size: medium" href="{{ route('authorization') }}">Authorization</a></button>
        <button class="btn btn-light" ><a class="navbar-brand" style="font-size: medium" href="{{ route('admin.index') }}">Administration</a></button>
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Navigation</button>
    </div>    
    </div>
</nav>
