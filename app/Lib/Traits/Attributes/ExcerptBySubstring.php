<?php


namespace App\Lib\Traits\Attributes;


use Illuminate\Support\Str;

trait ExcerptBySubstring
{
    public function getExcerptAttribute()
    {
        $attrName = $this->excerptAttribute;

        return Str::words($this->$attrName, 25);
    }
}
