<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Slider;
use DB;
use Auth;

class SliderController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule('slider');
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
            $data->data = Slider::with('slider_translations')->paginate(15);
            $data->action = $data->route;
            $data->method = 'POST';
            $data->editRoute = 'admin.'.$data->model->namespace.'.edit';
            $data->deleteRoute = 'Admin\ReviewController@destroy';
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
        $data = self::$data;
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            $data->data = new Slider;
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
        $data = new Slider;
        if(Auth::User()){
            $request->validate([
                'image' => 'required|image',
                'link'  => 'nullable|string',
                'title_01' => 'nullable|array',
                'title_01.*' => 'nullable|max:255',
                'title_02' => 'nullable|array',
                'title_02.*' => 'nullable|max:255',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['title_01'])){
                    $data->translateOrNew($locale)->title_01 = $request['title_01'][$locale];
                }
                if(isset($request['title_02'])){
                    $data->translateOrNew($locale)->title_02 = $request['title_02'][$locale];
                }
            }

            if(isset($request['link'])){
                $data->link = $request['link'];
            }
            if(isset($request['active'])){
                $data->active = $request['active'];
            }

            $data->save();

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
