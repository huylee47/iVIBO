<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tasks';
    protected $fillable = ['task_name', 'status', 'user_id','project_id','level', 'note','start_time','end_time']; 
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
