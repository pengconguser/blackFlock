@if (count($comments))

<ul class="list-group">
    @foreach ($comments as $reply)
        <li class="list-group-item">
            <a href="{{$reply->article->id}}">
                {{ $reply->article->title }}
            </a>

            <div class="reply-content" style="margin: 6px 0;">
                {!! $reply->content !!}
            </div>

            <div class="meta">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 回复于 {{ $reply->created_at->diffForHumans() }}
            </div>
        </li>
    @endforeach
</ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
{!! $comments->appends(Request::except('page'))->render() !!}