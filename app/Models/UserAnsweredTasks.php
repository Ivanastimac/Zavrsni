<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnsweredTasks extends Model
{
    use HasFactory;
    protected $table = 'user_answered_tasks';
}
