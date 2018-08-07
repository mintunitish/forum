@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row border-bottom">
            <h1 class="display-4">
                {{ $profileUser->name }}
            </h1>
            <p class="ml-4"><i>Since {{ $profileUser->created_at->diffForHumans() }}</i></p>
        </div>
        <div class="row">
            @foreach($threads as $thread)
                <div class="card m-4">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <b>{{ $thread->title }}</b>
                            </span>

                            <span>{{ $thread->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            @endforeach
            {{ $threads->links() }}
        </div>
    </div>
@endsection