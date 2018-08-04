@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new thread...</div>

                    <div class="card-body">
                        <form action="/threads" method="post">
                            {{ csrf_field() }}
                            @if($errors)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-group">
                                <label for="channel_id">Choose a channel:</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">Choose One</option>
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea class="form-control" id="body" rows="8" name="body" required>{{ old('body') }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
