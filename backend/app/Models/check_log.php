<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class check_log extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'check_logs';
    protected $fillable = ['user_id', 'location_check', 'check_in_time'];
}
    