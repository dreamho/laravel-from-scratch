<div class="blog-post" xmlns="http://www.w3.org/1999/html">
    <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta"><small>{{ $post->created_at->toDayDateTimeString() }}</small> by <a href="#"><strong>{{ $post->user->name }}</strong></a></p>
    <p>{{ $post->body }}</p>
</div><!-- /.blog-post -->