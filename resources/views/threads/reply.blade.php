<div class="card mb-3" style="margin-top: 10px;">
    <div class="card-header">
        <div class="level">
            <p class="flex" style="margin-bottom: 0;">
                <a href="#">
                    <i>{{ $reply->owner->name }}</i>
                </a>
                said {{ $reply->created_at->diffForHumans() }}...
            </p>

            <div>
                <form action="/replies/{{ $reply->id }}/favorites" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-outline-info" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->isFavorited() ? 'Liked' : 'Like' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ $reply->body }}
    </div>
</div>