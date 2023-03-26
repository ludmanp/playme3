<x-layout.home.partners :carousel-id="'partners'"
    :partners="Partners::published()->order()->get()->map(function(\TypiCMS\Modules\Partners\Models\Partner $client){
    return [
        'href'=> $client->link,
        'image'=> $client->present()->image(),
        'imageAlt'=> $client->title,
    ];
    })"
></x-layout.home.partners>
