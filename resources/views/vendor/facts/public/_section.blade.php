<x-layout.home.facts :title="$pageOptions->present()->local('facts_title')" :facts-block-carousel-id="'facts'">
    <x-slot name="text">
        <p>{{ $pageOptions->present()->local('facts_text') }}</p>
    </x-slot>
    <x-slot name="facts">
        @foreach(Facts::published()->order()->get() as $fact)
            <x-layout.home.factLink href='{{ $fact->link }}' :description="$fact->title" :number="$fact->number"
                                    :fact="$fact->link_title" :imageAlt="$fact->image->alt_attribute ?: $fact->title"
                                    :image="$fact->present()->image()"
            >
            </x-layout.home.factLink>
        @endforeach
    </x-slot>
</x-layout.home.facts>
