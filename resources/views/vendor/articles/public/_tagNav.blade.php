@php
    $query = collect(request()->query());
    $url = route(config('app.locale') . '::index-articles');
@endphp
@foreach($tags as $tag)
    @php
        $q = clone($query);
        $tt = $q->get('tag') ?? [];
        if(($k = array_search($tag->slug, $tt)) !== false) {
            unset($tt[$k]);
        } else {
            $tt = $q->get('tag') ?? [];
            $tt[] = $tag->slug;
            sort($tt);
        }
        if(empty($tt)) {
            $q->forget('tag');
        } else {
            $q->put('tag', $tt);
        }
        if(!empty($qString = $q->all())) {
            $qString = '?' . http_build_query($qString);
        } else {
            $qString = '';
        }
    @endphp
    <x-common.link href='{!! $url . $qString !!}' class="{{ in_array($tag->slug, $selectedTags) ? 'active' : '' }}" :tab="true">
        <x-slot name="icon">
            <x-icons.runningsmall></x-icons.runningsmall>
        </x-slot>
        <span class="focus">#{{ $tag->tag }}</span>
    </x-common.link>
@endforeach
