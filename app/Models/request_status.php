<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class request_status extends Model
{
    use HasFactory;

    protected $table = 'request_statuses';

    protected $fillable = ['id','id_request','id_status','comment','created_at','updated_at'];

    public function getStatic(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this -> belongsToMany(request_status::class, 'statuses', 'id', 'id_status');
    }
}
