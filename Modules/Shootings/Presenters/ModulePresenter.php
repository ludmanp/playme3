<?php

namespace TypiCMS\Modules\Shootings\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;
use TypiCMS\Modules\Shootings\Models\ShootingAddress;
use TypiCMS\Modules\Shootings\Models\ShootingDate;

class ModulePresenter extends Presenter
{
    public function toJs()
    {
        $data = $this->entity->toArray();
        $data['addresses'] = [];
        /** @var ShootingAddress $address */
        foreach ($this->entity->addresses as $address) {
            $data['addresses'][] = [
                'address' => $address->address,
            ];
        }
        $data['dates'] = [];
        /** @var ShootingDate $date */
        foreach ($this->entity->dates as $date) {
            $data['dates'][] = [
                'date' => $date->date ,
            ];
        }
        return json_encode($data);
    }
}
