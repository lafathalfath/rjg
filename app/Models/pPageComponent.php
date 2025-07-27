<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pPageComponent extends Model
{
    use HasFactory;
    protected $table = 'p_page_component';
    protected $guarded = [];

    public function page() : BelongsTo {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function component() : BelongsTo {
        return $this->belongsTo(Component::class, 'component_id', 'id');
    }
}
