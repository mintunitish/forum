@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">
                            {{ $thread->owner->name }}
                        </a>
                        posted : <b>{{ $thread->title }}</b>
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>

                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{ $replies->links() }}

                @guest
                    <p class="text-center">Please <a href="{{ route('login') }}">SignIn</a> to participate in this discussion!
                    </p>
                @else
                    <form method="post" action="{{ $thread->path().'/replies' }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Have Something to Say?"
                              rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Post</button>
                    </form>
                @endguest
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            This thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">
                                {{ $thread->owner->name }}
                            </a>, and currently has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
