<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item" href="/">Home</a>
            <a class="blog-nav-item" href="/posts/create">Create a post</a>
            <a class="blog-nav-item" href="/register">Register</a>
            <a class="blog-nav-item" href="/login">Login</a>
            @if (Auth::check())
                <a class="blog-nav-item float-right" href="/logout">Logout</a>
                <a class="blog-nav-item float-right" href="#">Hello {{ Auth::user()->name }}</a>
            @endif
        </nav>
    </div>
</div>