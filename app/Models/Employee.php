<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $fillable = ['name', 'role', 'color'];

    public function shifts(): HasMany
    {
        return $this->hasMany(Shift::class);
    }
}
