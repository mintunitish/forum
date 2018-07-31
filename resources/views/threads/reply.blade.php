<div class="card" style="margin-bottom: 10px;">
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