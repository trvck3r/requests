<?php

namespace App\Http\Controllers;
use App\Models\request_list;
use App\Models\request_list_view;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class request_listController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View

     */
    public function index()
    {
        return view ('request_list');
    }

    public function search(Request $request)
    {
       $s=$request->s;
       
       $users=request_list_view::where('fio', 'LIKE',"%{$s}%")->orderBy('fio');
    //    dd($users);
       return view ('request_list', compact('users'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function pag()
    {
        $request_list=request_list_view::orderBy('id', 'asc')->paginate(5);
        return view ('request_list', compact('request_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(),[
//            'FIO' => 'required|max:255',
//            'stud_group' => 'required|max:255'
//        ])->validate();
//
//       \App\Models\request_list::create([
//             'fio' => $request->FIO,
//             'stud_group' => $request['stud_group'],
//             'type_name' => 'Получение справки об обучении в данном заведении',
//        ]);
//
//        \App\Models\request_status::create([
//            'id_request' =>  \App\Models\request_list::orderBy('id', 'DESC')->first()->id,
//            'id_status' => 1,
//        ]);
//        return view ('complete_request');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
