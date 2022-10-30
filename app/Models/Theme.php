<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nume',
        'status',
    ];

    protected $attributes = [
        'status' => 1
    ];

    public $timestamps = false;

    public function configurations(){
        return $this->hasMany(Configuration::class);
     }

}
