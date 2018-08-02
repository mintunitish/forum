@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 15px;">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        @guest
            <p class="text-center">Please <a href="{{ route('login') }}">SignIn</a> to participate in this discussion!</p>
        @else
            <div class="row justify-content-center" style="margin-top: 15px;">
                <div class="col-md-8 col-md-offset-2">
                    <form method="post" action="{{ $thread->path().'/replies' }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have Something to Say?" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Post</button>
                    </form>
                </div>
            </div>
        @endguest
    </div>
@endsection
