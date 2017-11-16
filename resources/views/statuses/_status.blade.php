<li id="status-{{ $status->id }}">
  <a href="{{ route('users.show', $user->id )}}">
    <img src="{{ $user->gravatar($user->avatar) }}" alt="{{ $user->name }}" class="gravatar"/>
  </a>
  <span class="user">
    <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a>
  </span>
  <span class="timestamp">
    {{ $status->created_at->diffForHumans() }}
  </span>
      @if(Auth::user()->id==$user->id)
       {!! Form::open(['method' => 'DELETE', 'route' => ['statuses.destroy',$status->id], 'class' => 'form-horizontal']) !!}
           <div class="btn-group pull-right">
               {!! Form::submit("删除", ['class' => 'btn btn-success']) !!}
           </div>
       {!! Form::close() !!}
    @endif
  <span class="content">{{ $status->content }}</span>
</li>