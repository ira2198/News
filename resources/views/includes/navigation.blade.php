
<ul>
    <li>
        <a class="navbar-brand" href="{{ route('categories') }}">Categories</a>  
        <ul>
        </ul>     
    </li>
    <li>
        <a class="navbar-brand" href="{{ route('news.show') }}">News</a>
    </li>
    <li> 
        <a class="navbar-brand" href="{{ route('authorization') }}">Authorization</a>        
    </li>
    <li>
        <a class="navbar-brand" href="{{ route('admin.index') }}">Administration</a>
        <ul>
            <li>
                <a class="navbar-brand" href="{{ route('admin.article.create') }}">Create article</a>
            </li>
            <li>
                <a class="navbar-brand" href="{{ route('admin.news.show') }}">News</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="navbar-brand" href="{{ route('appeal.create') }}">Application</a>  
    </li>
</ul>