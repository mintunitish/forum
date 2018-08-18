<div class="card mb-3" id="reply-{{ $reply->id }}" style="margin-top: 10px;">
    <div class="card-header">
        <div class="level">
            <p class="flex" style="margin-bottom: 0;">
                <a href="/profiles/{{ $reply->owner->name }}">
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
    @can('delete', $reply)
        <div class="card-footer pt-2 pb-2 text-right">
            <form method="post" action="/replies/{{ $reply->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    @endcan
</div>