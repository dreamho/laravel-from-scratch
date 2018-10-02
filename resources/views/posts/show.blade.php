@extends ('layouts.master')

@section ('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>

            @if (count($post->tags) > 0)
                @foreach ($post->tags as $tag)
                    <li><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
                @endforeach
            @endif

            <p class="card-text">{{ $post->body }}</p>
        </div>
    </div>

    <hr>

    <form method="POST" action="/posts/{{ $post->id }}/comments">

        {{ csrf_field() }}

        <div class="form-group">

            <textarea class="form-control" placeholder="Enter your comment here..." name="body"></textarea>

        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary">Add Comment</button>

        </div>

    </form>

    @include ('layouts.errors')

    <hr>
    <h3>Comments:</h3>

    <div class="comments">

        <ul class="list-group">

            @foreach ($post->comments as $comment)

                <li class="list-group-item">

                    <strong>{{ $comment->created_at->diffForHumans() }} by {{ $comment->user->name }}:</strong>&nbsp;
                    {{ $comment->body }}

                </li>

            @endforeach

        </ul>

    </div>

@endsection