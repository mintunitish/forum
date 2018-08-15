@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse($threads as $thread)
                <div class="col-md-8 pb-3">
                    <div class="card shadow">
                        <div class="card-header pb-0 pt-2">
                            <div class="level">
                                <h5 class="flex">
                                    <a href="{{ $thread->path() }}">
                                        <strong>{{ $thread->title }}</strong>
                                    </a>
                                </h5>
                                <a href="{{ $thread->path() }}">
                                    {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="body text-justify">{{ $thread->body }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>No relevant threads to show!</h2>
            @endforelse
        </div>
    </div>
@endsection
