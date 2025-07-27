<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    use HasFactory;

    protected $table = 'application';
    protected $guarded = [];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function layouts() : HasMany {
        return $this->hasMany(Layout::class, 'application_id', 'id');
    }

    public function pages() : HasMany {
        return $this->hasMany(Page::class, 'application_id', 'id');
    }

    public function components() : HasMany {
        return $this->hasMany(Component::class, 'application_id', 'id');
    }
}
