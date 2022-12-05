<ul class="teammember-social-list-list">
    @foreach ($items as $social)
    @include('teammembers::public.socials._list-item')
    @endforeach
</ul>
