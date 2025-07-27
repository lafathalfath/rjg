<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Component extends Model
{
    use HasFactory;

    protected $table = 'component';
    protected $guarded = [];

    public function application() : BelongsTo {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    public function pages() : BelongsToMany {
        return $this->belongsToMany(Page::class, 'p_page_component', 'component_id', 'page_id');
    }
}
