<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title','description','category','location','start_at','end_at','price','quota','sold','image_path','is_active'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function availableQuota()
    {
        return max(0, $this->quota - $this->sold);
    }
}
