<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_list_view extends Model
{
    use HasFactory;

    public $table = 'request_list_view';

    protected $fillable = ['id_request','fio','stud_group','name','type_name','comment'];
}
