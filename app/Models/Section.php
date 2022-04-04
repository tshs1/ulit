<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Section extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'teacher_id',
    ];
    protected $appends = [
        'adviser',
    ];

    public function getAdviserAttribute()
        {
            if ($this->teacher) {
                return $this->teacher->name;
            }
            return null;
        }
    public function teacher(){return $this->belongsTo(User::class);}
}
