@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row border-bottom">
            <h1 class="display-2">
                {{ $profileUser->name }}
            </h1>
        </div>
        <div class="row">
            @foreach($activities as $date => $activity)
                <h3 class="border-bottom mt-3">{{ $date }}</h3>
                @foreach($activity as $record)
                    @if(view()->exists("profiles.activities.{$record->type}"))
                        @include("profiles.activities.{$record->type}", ['activity' => $record])
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection