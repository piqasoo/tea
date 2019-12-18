<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Events;
use DB;
use Auth;

class EventController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule('events');
        if(!empty(self::$module) && (self::$module->statusCode == 1) && self::$module->data->namespace){
            self::$data = self::$parent->initModule(self::$module->data->namespace);
            self::$data->model = self::$module->data;
        }     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = self::$data;
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            $data->data = Events::where('active', true)->with('event_translations')->paginate(15);
            $data->action = [$data->route];
            $data->method = 'POST';
            $data->editRoute = 'admin.'.$data->model->namespace.'.edit';
            $data->deleteRoute = 'Admin\EventController@destroy';
            // ['Admin\PressController@destroy', $row['id']]
            return view('admin.index', compact('data'));
        }
        else {
            return redirect('/');
        }
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
