<?php

namespace TypiCMS\Modules\Clients\Services;

use TypiCMS\Modules\Clients\Models\Client;

class ListServices
{
    public function allForList(): array
    {
        return Client::published()->order()->get()->map(function(\TypiCMS\Modules\Clients\Models\Client $client){
            return [
                'href'=> $client->link,
                'image'=> $client->present()->image(),
                'imageAlt'=> $client->title,
            ];
        })->all();
    }

}
