<?php

namespace TypiCMS\Modules\Broadcasts\Presenters;

use Drnxloc\LaravelHtmlDom\HtmlDomParser;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;
use TypiCMS\Modules\Broadcasts\Models\BroadcastAddress;
use TypiCMS\Modules\Broadcasts\Models\BroadcastDate;
use TypiCMS\Modules\Core\Presenters\Presenter;

/**
 * @property Broadcast $entity
 */
class ModulePresenter extends Presenter
{
    public function toJs()
    {
        $data = $this->entity->toArray();
        $data['addresses'] = [];
        /** @var BroadcastAddress $address */
        foreach ($this->entity->addresses as $address) {
            $data['addresses'][] = [
                'address' => $address->address,
            ];
        }
        $data['dates'] = [];
        /** @var BroadcastDate $date */
        foreach ($this->entity->dates as $date) {
            $data['dates'][] = [
                'date' => $date->date ,
                'starts_at' => $date->start_time,
                'arrive_at' => $date->arrive_time,
            ];
        }
        return json_encode($data);
    }

    public function prepareScript(): string
    {
        if(!$this->entity->embed_script) {
            return '';
        }
        $dom = HtmlDomParser::str_get_html( $this->entity->embed_script );
        $iframe = $dom->find('iframe');
        if(!empty($iframe)) {
            $iframe = $iframe[0];
            $iframe->width = null;
            $iframe->height = null;
            $iframe->class = 'clientGallery__videoImage';
        }
        return $dom->save();
    }
}
