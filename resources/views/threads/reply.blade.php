<div class="card mb-3" style="margin-top: 10px;">
    <div class="card-header">
        <a href="#">
            <i>{{ $reply->owner->name }}</i>
        </a>
        said {{ $reply->created_at->diffForHumans() }}...
    </div>
    <div class="card-body">
        {{ $reply->body }}
    </div>
</div>