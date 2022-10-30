<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Link extends Model
{
    use HasFactory;

    const STATUS = [
        0 => 'deleted',
        1 => 'active'
    ];

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'original_link',
        'shorten_link',
        'description',
        'expired_at',
        'status',
        'user_id'
    ];

    protected $attributes = [
        'status' => 1
    ];

    public function getStatusFormatedAttribute() 
    {
        return self::STATUS[$this->status];
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderByRaw("original_link");
    }

    public function scopeGetCustomSearch($query, $slug)
    {
        $query = $query->select('*', DB::raw("CONCAT(shorten_link, description) AS slug"));
        // not working
        $query = $query->where('slug', $slug);

        return $query;
    }

    public function linkClicks()
    {
        return $this->hasMany(LinkClick::class)->orderBy('created_at');
    }

    public function user() 
     {
        return $this->belongsTo(User::class, 'user_id');
    }

}
