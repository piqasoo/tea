<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Providers\MediaProvider as MediaLibrary;
// use App\Banner;
use DB;
use Auth;

class ExampleController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        $this->middleware('auth');
        $moduleName = ''; //module name
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule($moduleName);
        if(!empty(self::$module) && self::$module->data->namespace){
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
            // $data->data = Model::with('model_translations')->paginate(15);
            $data->action = $data->route;
            $data->method = 'POST';
            $data->editRoute = 'admin.'.$data->model->namespace.'.edit';
            // $data->deleteRoute = 'Admin\ModelController@destroy';
            //// ['Admin\PressController@destroy', $row['id']]
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
        $data = self::$data;
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            //$data->data = new Model;
            $data->action = ['admin.'.$data->model->namespace.'.store'];
            $data->method = 'POST';
            return view('admin.index', compact('data'));
        }
        else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = self::$data;
        // $data = new Model;
        if(Auth::User()){
            $request->validate([
                // 'image' => 'required|image',
                // 'title_01' => 'required|array',
                // 'title_01.*' => 'required|max:255',
                // 'text' => 'nullable',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                // if(isset($request['title_01'])){
                //     $data->translateOrNew($locale)->title_01 = $request['title_01'][$locale];
                //     $data->translateOrNew($locale)->slug = str_slug($request['title_01'][$locale]);
                // }
            }

            // $data->save();

            return redirect('admin/'.$model->model->namespace);
        }
        else {
            return redirect('/');
        }  
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
        $param = 'param';
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            // $data->data = Model::find($id);
            $data->action = ['admin.'.$data->model->namespace.'.update', $param => $id];
            $data->method = 'PUT';
            if(isset($data->data)){
                return view('admin.index', compact('data'));
            }
            else {
                return redirect('/');
            }
        }
        else {
            return redirect('/');
        }
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
        // $data = Model::find($id);
        if(Auth::User() && $data){
            // MediaLibrary::deleteImage($data, 'field',  'path');
            $data->delete();
            return back();
        }
        else {
            return redirect('/');
        }
    }
}
