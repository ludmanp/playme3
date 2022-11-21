<x-layout.home.clients
    :clients="Clients::published()->order()->get()->map(function(\TypiCMS\Modules\Clients\Models\Client $client){
    return [
        'href'=> $client->link,
        'image'=> $client->present()->image(),
        'imageAlt'=> $client->title,
    ];
    })"
></x-layout.home.clients>
