<?php

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst(string $string, string $encoding = 'UTF-8'): string
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding).$then;
    }
}

if (!function_exists('column')) {
    function column(string $column): string
    {
        return $column.'->'.config('app.locale');
    }
}

if (!function_exists('locales')) {
    function locales(): array
    {
        return array_keys(config('typicms.locales'));
    }
}

if (!function_exists('getMigrationFileName')) {
    function getMigrationFileName(string $name): string
    {
        $directory = database_path(DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR);
        $migrations = File::glob($directory.'*_'.$name.'.php');

        return $migrations[0] ?? $directory.date('Y_m_d_His').'_'.$name.'.php';
    }
}

if (!function_exists('useModifiers')) {
    function useModifiers(string $base, array $mods): string
    {
        $className = '';

        foreach ($mods as $mod => $applies) {
            if ($applies) {
                $className .= ' '.$base.'_'.$mod;
            }
        }

        return $className;
    }
}

if(! file_exists('trueFalseValue')) {
    function trueFalseValue($value)
    {
        return $value ? 'true' : 'false';
    }
}

if(! file_exists('makeQuery')) {
    function makeQuery(\TypiCMS\Modules\Core\Models\Tag $tag)
    {
        $query = collect(request()->query());
        $tagQuery = $query->get('tag') ?? [];
        if(($k = array_search($tag->slug, $tagQuery)) !== false) {
            unset($tagQuery[$k]);
        } else {
            $tagQuery = $query->get('tag') ?? [];
            $tagQuery[] = $tag->slug;
            sort($tagQuery);
        }
        if(empty($tagQuery)) {
            $query->forget('tag');
        } else {
            $query->put('tag', $tagQuery);
        }
        if(!empty($queryString = $query->all())) {
            $queryString = '?' . http_build_query($queryString);
        } else {
            $queryString = '';
        }

        return $queryString;
    }
}

if(! file_exists('currentQueryString')) {
    function currentQueryString(): string
    {
        $queryString = explode('?', url()->full())[1] ?? '';
        if($queryString) {
            $queryString = '?'. $queryString;
        }
        return $queryString;
    }
}
