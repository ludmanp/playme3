<?php

namespace TypiCMS\Modules\Broadcasts\Data;

/**
 * @property string $cameras
 * @property string $equipment_delivery_included
 * @property string $broadcasting
 * @property string $makeup_service
 * @property string $graphic_design_service
 * @property string $final_video_cameras
 * @property string $sound
 * @property string $light
 * @property string $video_for_social_media
 * @property string $reporting_video
 * @property string $corporate_video
 * @property string $promo_video
 * @property string $conference_2_cameras
 * @property string $conference_4_cameras
 */
class BroadcastData
{
    /** @var array */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function get(string $key): mixed {
        return $this->data[$key] ?? null;
    }

    public function set(string $key, mixed $value): self {
        $this->data[$key] = $value;
        return $this;
    }

    public function all(): array {
        return $this->data;
    }
}
