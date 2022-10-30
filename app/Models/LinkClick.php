<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkClick extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'link_id',
        'created_at',
        'location',
    ];

    public $timestamps = false;


    // Relationship To Link
    public function link() {
        return $this->belongsTo(Link::class, 'link_id');
    }

}
