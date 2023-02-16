<?php

namespace TypiCMS\Modules\Core\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Http\Request;
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

    public function scopeTagsFromRequest(Builder $query, Request $request)
    {
        $requestQuery = $request->query();
        if(!empty($requestQuery['tag'])) {
            if(is_array($requestQuery['tag'])) {
                foreach ($requestQuery['tag'] as $tag) {
                    $query->whereHas('tags', function($q) use ($tag) {
                        $q->whereSlugIs($tag);
                    });
                }
            } else {
                $query->whereHas('tags', function ($q) use ($requestQuery) {
                    $q->whereSlugIs($requestQuery['tag']);
                });
            }
        }
        return $query;
    }
}
