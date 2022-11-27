<?php

namespace TypiCMS\Modules\Core\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use TypiCMS\Modules\Core\Models\Tag;

trait HasTags
{
    public static function bootHasTags()
    {
        static::saved(function (Model $model) {
            if (request()->has('tags')) {
                $tags = $model->processTags(request('tags'));
                $model->syncTags($model, $tags);
            }
        });
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable')
            ->orderBy('tag')
            ->withTimestamps();
    }

    /**
     * Convert string of tags to array.
     */
    protected function processTags(?string $tags): array
    {
        if (!$tags) {
            return [];
        }

        $tags = explode(',', $tags);

        foreach ($tags as $key => $tag) {
            $tags[$key] = trim($tag);
        }

        return $tags;
    }

    protected function syncTags(Model $model, array $tags)
    {
        // Create or add tags
        $tagIds = [];

        if ($tags) {
            $contentLocale = config('typicms.content_locale', config('app.locale'));
            Log::debug('syncTags', ['typicms.content_locale' => config('typicms.content_locale'), 'app.locale' => config('app.locale')]);
            Log::debug(Tag::whereRaw(
                'JSON_UNQUOTE(JSON_EXTRACT(`tag`, \'$.'.$contentLocale.'\')) IN ('.collect($tags)->implode(function($t){return '"' . $t . '"';}, ',').')'
            )->toSql());
            $foundTags = Tag::whereRaw(
                'JSON_UNQUOTE(JSON_EXTRACT(`tag`, \'$.'.$contentLocale.'\')) IN ('.collect($tags)->implode(function($t){return '"' . $t . '"';}, ',').')'
            )->get();

            $returnTags = [];

            /** @var Tag $tag */
            foreach ($foundTags as $tag) {
                $pos = array_search($tag->getTranslation('tag', $contentLocale), $tags);

                // Add returned tags to array
                if ($pos !== false) {
                    Log::debug('Found tag', $tag->toArray());
                    $returnTags[] = $tag;
                    unset($tags[$pos]);
                }
            }

            // Add remainings tags as new
            foreach ($tags as $tag) {
                $returnTags[] = Tag::create([
                    'tag' => [$contentLocale => $tag],
                    'slug' => [$contentLocale => Str::slug($tag)],
                ]);
            }

            foreach ($returnTags as $tag) {
                $tagIds[] = $tag->id;
            }
        }

        // Assign tags to model
        $model->tags()->sync($tagIds);
    }
}
