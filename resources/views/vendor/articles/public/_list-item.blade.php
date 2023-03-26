@php
$qString = request()->query();
if($qString['page'] ?? false) {
    unset($qString['page']);
}
$qString = (empty($qString) ? '' : '?') . http_build_query($qString);
@endphp
    <x-layout.home.blogCard :image="$article->image ? $article->present()->image() : ''" :imageAlt="$article->image->alt_attribute"
                            :author="$article->author ? $article->author->title : ''" :date="$article->publishedDate"
                            :authorImage="optional($article->author)->image ? $article->author->present()->image(24, 24) : ''"
                            :authorImageAlt="optional($article->author)->image ? $article->author->image->alt_attribute : ''"
                            :header="$article->title" :carousel-id="'blogCardCarousel-' . $article->id">
        <x-slot name="text">
            {!! $article->summary !!}
        </x-slot>
        <x-slot name="tags">
            @foreach($article->tags as $tag)
            <x-common.link :tag="true" href="javascript:void(0)">
                #{{ $tag->tag }}
            </x-common.link>
            @endforeach
        </x-slot>
        <x-slot name="action">
            <x-common.link :withImage="true" :uppercase="true" :href="$article->uri() . $qString">
                <x-slot name="icon">
                    <x-icons.running></x-icons.running>
                </x-slot>
                @lang('Read')
            </x-common.link>
        </x-slot>
    </x-layout.home.blogCard>

