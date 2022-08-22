<?php

namespace App\Http\Controllers;

use App\Models\request_list_view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestListViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users = request_list_view::select('*')
//            ->get()
//            ->toArray();
//        dd($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'FIO' => 'required|max:255',
            'stud_group' => 'required|max:255'
        ])->validate();

        \App\Models\request_list::create([
            'fio' => $request->FIO,
            'stud_group' => $request['stud_group'],
            'type_name' => 'Получение справки об обучении в данном заведении',
        ]);

        \App\Models\request_status::create([
            'id_request' =>  \App\Models\request_list::orderBy('id', 'DESC')->first()->id,
            'id_status' => 1,
        ]);
        return view ('complete_request');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\request_list_view  $request_list_view
     * @return \Illuminate\Http\Response
     */
    public function show(request_list_view $request_list_view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\request_list_view  $request_list_view
     * @return \Illuminate\Http\Response
     */
    public function edit(request_list_view $request_list_view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\request_list_view  $request_list_view
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, request_list_view $request_list_view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\request_list_view  $request_list_view
     * @return \Illuminate\Http\Response
     */
    public function destroy(request_list_view $request_list_view)
    {
        //
    }
}
