
<ul>

    <li>
        <a class="navbar-brand" href="{{ route('admin.user.show') }}">Users</a>
    </li>
    <li>
        <a class="navbar-brand" href="{{ route('authorization') }}">Login</a>
    </li>
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
                <a class="navbar-brand" href="{{ route('admin.news.show') }}">News</a>
            </li>
            <li>
                <a class="navbar-brand" href="{{ route('admin.article.create') }}">Create article</a>
            </li>
            <li>
                <a class="navbar-brand" href="{{ route('admin.categories.show') }}">Categories</a>
            </li>
            <li>
                <a class="navbar-brand" href="{{ route('admin.create.category') }}">Create category</a>
            </li>
            <li>
                <a class="navbar-brand" href="{{ route('admin.source.index') }}">Sources</a>
            </li>
            <li>
                <a class="navbar-brand" href="{{ route('admin.source.create') }}">Crete sources</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="navbar-brand" href="{{ route('appeal.create') }}">Application</a>  
    </li>
</ul>