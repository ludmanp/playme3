<?php

namespace TypiCMS\Modules\Broadcasts\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use TypiCMS\Modules\Broadcasts\Enums\StatusEnum;

class StatusCast implements CastsAttributes
{
    /**
     * @param $model
     * @param $key
     * @param $value
     * @param $attributes
     * @return mixed|StatusEnum|null
     */
    public function get($model, $key, $value, $attributes)
    {
        return StatusEnum::tryFrom($value);
    }

    /**
     * @param $model
     * @param $key
     * @param StatusEnum $value
     * @param $attributes
     * @return mixed|string
     */
    public function set($model, $key, $value, $attributes)
    {
        /** @var StatusEnum $value */
        return $value->value;
    }

    /**
     * @param $model
     * @param string $key
     * @param StatusEnum $value
     * @param array $attributes
     * @return mixed
     */
    public function serialize($model, string $key, $value, array $attributes)
    {
        return $value->value;
    }
}
