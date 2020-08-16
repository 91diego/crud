<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_name', 'start_task_name', 'end_task_name', 'user_id',
    ];

    // Especificamos relacion
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
