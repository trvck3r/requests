<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\request_list;
use App\Models\request_list_view;
use App\Models\request_status;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users_query = request_list_view::query();
        
        $search_param = $request->query('q' );

        if($search_param){
            $users_query = request_list_view::search($search_param);

        }
        if ($request->one) {
            $users_query->where('name', 'Новая');
        } 
        if ($request->two) {
            $users_query->where('name', 'Ожидает');
        }
        if ($request->three) {
            $users_query->where('name', 'Готово');
        }
        $users = $users_query->paginate(5);

        return view('request_list', compact('users', 'search_param'));
    }
}
