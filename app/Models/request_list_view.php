<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingPrefix;

class request_list_view extends Model
{
    use HasFactory, Searchable;

    public $table = 'request_list_view';

    protected $fillable = ['id_request','fio','stud_group','name','type_name','comment'];

    #[SearchUsingPrefix(['fio'])]
    public function toSearchableArray()
    {
        return [
            'id_request' => $this->id_request,
            'fio' => $this->fio,
            'stud_group' => $this->stud_group,
            'name' => $this->name,
            'type_name' => $this->type_name,
            'comment' => $this->comment
        ];
    }
}
