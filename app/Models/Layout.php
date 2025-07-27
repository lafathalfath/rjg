<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layout extends Model
{
    use HasFactory;

    protected $table = 'layout';
    protected $guarded = [];

    public function application() : BelongsTo {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    public function pages() : HasMany {
        return $this->hasMany(Page::class, 'layout_id', 'id');
    }
}
