<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = 'pid';

    public function getRouteKeyName()
    {
        return 'pid';
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
    protected $fillable = ['title', 'start_date', 'end_date', 'phase', 'description', 'uid'];
}
