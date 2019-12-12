<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use DB;

class AboutController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule('about');
        if(!empty(self::$module) && self::$module->data->namespace){
            self::$data = self::$parent->initModule(self::$module->data->namespace);
        }
        
        // dd(self::$data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = self::$data;
        $data->model = self::$module;
        $data->route = 'admin.'.$data->model->data->namespace.'.update';
        $data->data = DB::table('abouts')
                        ->where('id', 1)
                        // ->leftJoin('about_translations', 'abouts.id', '=', 'about_translations.about_id')
                        ->first();
        // dd($data->data);
        return view('admin.index', compact('data'));
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
