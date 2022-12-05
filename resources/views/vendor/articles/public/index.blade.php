@extends('pages::public.master')

@section('page')

    <x-common.container>
        <div class='blog__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>{{ $page->title }}</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-common.contentContainer>
                <x-common.tabNav>
                    @include('articles::public._tagNav')
                </x-common.tabNav>
                <div class='blog__cards' id="blog-cards">
                    @includeWhen($models->count() > 0, 'articles::public._list', ['items' => $models])

                    @if($models->lastPage() > 1)
                    <div id="add-before"></div>

                    <div class='blog__cardsAction'>
                        <x-common.button :withImage="true" :uppercase="true" id="blog-more"
                                         data-next-page-url="{{ $models->nextPageUrl() }}">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            @lang('Show more')
                        </x-common.button>
                    </div>
                    @endif
                </div>
            </x-common.contentContainer>
        </div>
    </x-common.container>
@endsection

@if($models->lastPage() > 1)
@push('js')
    <script>
        let currentPage = {{ $models->currentPage() }};
        const $blogMore = $('#blog-more');
        $blogMore.on('click', function(e) {
            if(!$blogMore.data('next-page-url')) {
                return;
            }
            $.get($blogMore.data('next-page-url'))
               .then(function(content, textStatus, request) {
                   const nextPageUrl = request.getResponseHeader('X-NextPageUrl');
                   $(content).insertBefore("#add-before");
                   $blogMore.data('next-page-url', nextPageUrl);
                   if(!nextPageUrl) {
                       $blogMore.parent().hide();
                   }
               })
              .catch(function(error) {
                  console.log(error);
              })
        });
    </script>
@endpush
@endif
