<?php

namespace App\Http\Controllers;

use App\Models\request_list;
use App\Models\request_list_view;
use App\Models\request_status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestStatusController extends Controller
{
    function userId()
    {
        $group = request_list_view::select('*')->get()->toArray();
        return view('request_list', compact('group'));

//        $group=DB::select('SELECT
//DISTINCT request_statuses.id_request, requests.fio, requests.stud_group,
//         statuses.name, requests.type_name, request_statuses.comment
//FROM requests
//LEFT JOIN
//(SELECT request_statuses.id_request, MAX(request_statuses.created_at) AS created_at
//FROM request_statuses GROUP BY request_statuses.id_request) AS r
//ON requests.id = r.id_request
//LEFT JOIN request_statuses ON r.id_request = request_statuses.id_request AND r.created_at = request_statuses.created_at
//LEFT JOIN statuses ON statuses.id=request_statuses.id_status;');
//        return view('request_list', compact('group'));

//        $group = request_list::query()
//        ->find($id);
//        return view ('request_edit', compact('group'));
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

    function u($id, Request $request)
    { 
        $per = request_list::query()
        ->find($id); 
        return view ('request_list', compact('per'));
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('request_edit');
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
    public function store(Request $request, $id)
    {
        \App\Models\request_status::create([
            'id_request' => $request->id_request,
            //'id_request' => \App\Models\request_list::where('id', 'id')->first()->id,
            'id_status' => $request['request'],
            'request' => $request['request'],
            'comment' => $request['comment'],
        ]);
        return redirect ('request_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\request_status  $request_status
     * @return \Illuminate\Http\Response
     */
    public function show(request_status $request_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\request_status  $request_status
     * @return \Illuminate\Http\Response
     */
    public function edit(request_status $request_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\request_status  $request_status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, request_status $request_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\request_status  $request_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(request_status $request_status)
    {
        //
    }

}
