<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'arata_detalii_tabel',
        'theme_id',

    ];

    protected $attributes = [
        'arata_detalii_tabel' => 1
    ];

    public $timestamps = false;

    // Relationship To User
    public function user() {
        return $this->hasOne(User::class, 'user_id');
    }

    // Relationship To Theme
    public function theme() {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

}
