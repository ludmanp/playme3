<?php

namespace TypiCMS\Modules\Core\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Models\Translation;

class TranslationsExport implements ShouldAutoSize, FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return QueryBuilder::for(Translation::class)
            ->allowedSorts(['key', 'translation_translated'])
            ->allowedFilters([
                AllowedFilter::custom('key,translation', new FilterOr()),
            ])
            ->get();
    }

    /**
     * @param Translation $model
     * @return array
     */
    public function map($model): array
    {
        $langData = [];
        foreach (locales() as $locale) {
            $langData[] = $model->translate('translation', $locale);
        }
        return array_merge([
            $model->key,
        ], $langData);
    }

    public function headings(): array
    {
        return array_merge([
            __('Key'),
        ], locales());
    }
}
