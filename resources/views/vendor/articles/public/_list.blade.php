@php
$rows = [
    'one' => [],
    'two' => [],
    'three' => [],
];
foreach ($items as $i => $article) {
    if($i == 0) {
        $rows['one'][] = $article;
    } elseif ($i > 0 && $i < 3) {
        $rows['two'][] = $article;
    } else {
        $rows['three'][] = $article;
    }
}
@endphp
@foreach($rows as $key => $row)
    @if(!empty($row))
        @switch($key)
            @case('one')
                <x-layout.blog.cardsFull>
                    @foreach ($row as $article)
                        @include('articles::public._list-item')
                    @endforeach
                </x-layout.blog.cardsFull>
                @break
            @case('two')
                <x-layout.blog.cardsOneAndHalf>
                    @foreach ($row as $article)
                        @include('articles::public._list-item')
                    @endforeach
                </x-layout.blog.cardsOneAndHalf>
                @break
            @case('three')
                <x-layout.blog.cardsThree>
                    @foreach ($row as $article)
                        @include('articles::public._list-item')
                    @endforeach
                </x-layout.blog.cardsThree>
                @break
        @endswitch
    @endif
@endforeach



