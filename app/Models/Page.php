<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Page extends Model
{
    use HasFactory;
    protected $table = 'page';
    protected $guarded = [];

    public function application() : BelongsTo {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    public function layouts() : BelongsTo {
        return $this->belongsTo(Layout::class,'layout_id','id');
    }

    public function components() : BelongsToMany {
        return $this->belongsToMany(Component::class, 'p_page_component', 'page_id', 'component_id');
    }
}
