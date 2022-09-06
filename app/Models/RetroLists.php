<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RetroLists extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    /*
     * @return hasMany
     */
    public function users(): hasOne
    {
        return $this->hasOne(User::class);
    }
}
