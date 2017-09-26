    <li>
        <img alt="{{ $user->name }}" class="gravatar" src="{{ $user->gravatar() }}"/>
        <a class="username" href="{{ route('users.show', $user->id )}}">
            {{ $user->name }}
        </a>
    </li>