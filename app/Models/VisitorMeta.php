<?php

namespace App\Models;

use App\Lib\Traits\TableNameAccessor;
use Illuminate\Database\Eloquent\Model;

class VisitorMeta extends Model
{
    use TableNameAccessor;

    protected $table = 'visitors';
    protected $fillable = ['ip', 'browser'];
}
