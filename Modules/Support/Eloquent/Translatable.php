<?php

namespace Modules\Support\Eloquent;

use Dimsav\Translatable\Translatable as DimsavTranslatable;

trait Translatable
{
    use DimsavTranslatable;

    /**
     * Save the model to the database.
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = [])
    {
        if (parent::save($options)) {
            return $this->saveTranslations();
        }

        return false;
    }

    /**
     * This scope filters results by checking the translation fields.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $key
     * @param array $values
     * @param string $locale
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function scopeWhereTranslationIn($query, $key, array $values, $locale = null)
    {
        return $query->whereHas('translations', function ($query) use ($key, $values, $locale) {
            $query->whereIn($key, $values)
                ->when(! is_null($locale), function ($query) use ($locale) {
                    $query->where('locale', $locale);
                });
        });
    }

    public function scopeForCurrentLocaleWithFallback($query)
    {
        $query->with(['translations' => function ($translationQuery) {
            $translationQuery->whereIn('locale', [config('app.locale'), config('app.fallback_locale')]);
        }]);
    }
}
