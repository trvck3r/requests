<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class request_list extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = ['id','fio','stud_group','type_name', 'created_at', 'updated_at'];
}
