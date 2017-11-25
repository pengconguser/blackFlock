<div class="comment-list">
    @foreach ($comments as $index => $comment)
        <div class=" media"  name="reply{{ $comment->id }}" id="comment{{ $comment->id }}">
            <div class="avatar pull-left">
                <a href="{{ route('users.show', [$comment->user_id]) }}">
                <img class="media-object img-thumbnail" alt="{{ $comment->user->name }}" src="{{ $comment->user->gravatar($comment->user->avatar) }}"  style="width:48px;height:48px;"/>
                </a>
            </div>

            <div class="infos">
                <div class="media-heading">
                    <a href="{{ route('users.show', [$comment->user_id]) }}" title="{{ $comment->user->name }}">
                    {{ $comment->user->name }}
                    </a>
                    <span> •  </span>
                    <span class="meta" title="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</span>

                    {{-- 回复删除按钮 --}}
                    <span class="meta pull-right">
                       <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-default btn-xs pull-left">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                        </form>
                    </span>
                </div>
                <div class="comment-content">
                    {{  $comment->content }}
                </div>
            </div>
        </div>
        <hr>
    @endforeach
     {!! $comments->render() !!}
</div>