<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VisitorMeta
 *
 * @property int $id
 * @property string $ip
 * @property string $browser
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VisitorMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VisitorMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VisitorMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VisitorMeta whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VisitorMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VisitorMeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VisitorMeta whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VisitorMeta whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VisitorMeta extends Model
{
    protected $table = 'visitors';
    protected $fillable = ['ip', 'browser'];
}
