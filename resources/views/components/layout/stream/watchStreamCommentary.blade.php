<div class='watchStream__commentary {{ isset($user) ? 'watchStream__commentary_user': '' }}'>
    <div class='watchStream__commentaryUser'>
        <img src='{{ $image ?? '' }}' alt=''>
    </div>
    <div class='watchStream__commentaryText'>
        {{ $commentary ?? '' }}
    </div>
</div>
