@extends ('layouts.master')

@section ('content')

    <form method="POST" action="/posts">

        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title">
        </div>

        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" name="body"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>

    </form>

    @include ('layouts.errors')

@endsection