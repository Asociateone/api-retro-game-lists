<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    public function lists(): belongsToMany
    {
        return $this->belongsToMany(Lists::class, 'list_items', 'game_id','lists_id');
    }
}
