<?php

namespace App\Traits;

trait Translatable
{
    public function getAttribute($key)
    {
        $locale = app()->getLocale();

        $localizedKey = $key . '_' . $locale;

        if (array_key_exists($localizedKey, $this->getAttributes())) {
            return $this->getAttributes()[$localizedKey];
        }

        return $this->getAttributes()[$key] ?? parent::getAttribute($key);
    }
}