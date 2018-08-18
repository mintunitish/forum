<reply :attributes="{{ $reply }}" inline-template v-cloak>
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
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                <button class="btn btn-sm btn-success mr-2" @click="update">Update</button>
                <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
            </div>
            <div v-else v-text="body"></div>
        </div>
        @can('update', $reply)
            <div class="card-footer pt-2 pb-2 d-flex">
                <button class="btn btn-primary btn-sm mr-2" @click="editing = true">Edit</button>
                @can('delete', $reply)
                    <form method="post" action="/replies/{{ $reply->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                @endcan
            </div>
        @endcan
    </div>
</reply>