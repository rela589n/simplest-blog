<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorMeta extends Model
{
    protected $table = 'visitors';
    protected $fillable = ['ip', 'browser'];
}
