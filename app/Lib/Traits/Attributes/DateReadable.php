<?php


namespace App\Lib\Traits\Attributes;


trait DateReadable
{
    public function getDateReadableAttribute()
    {
        return sprintf("%s <span>%s</span>",
            $this->created_at->format('d'),
            $this->created_at->format('M Y')
        );
    }
}
