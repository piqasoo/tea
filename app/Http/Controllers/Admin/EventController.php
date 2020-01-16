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
        $this->middleware('auth');
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
            $data->data = Events::with('event_translations')->paginate(15);
            $data->action = $data->route;
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
        $data = self::$data;
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            $data->data = new Events;
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
        $data = new Events;
        if(Auth::User()){
            $request->validate([
                'name' => 'required|array',
                'name.*' => 'required|max:255',
                'text' => 'nullable',
                'place' => 'required|array',
                'place.*' => 'required|max:255',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['name'])){
                    $data->translateOrNew($locale)->name = $request['name'][$locale];
                    $data->translateOrNew($locale)->slug = str_slug($request['name'][$locale]);
                }
                if(isset($request['place'])){
                    $data->translateOrNew($locale)->place = $request['place'][$locale];
                }
                if(isset($request['role'])){
                    $data->translateOrNew($locale)->role = $request['role'][$locale];
                }
                if(isset($request['text'])){
                    $data->translateOrNew($locale)->text = $request['text'][$locale];
                }
            }

            if(isset($request['date'])){
                $data->date = $request['date'];
            }
            if(isset($request['address_link'])){
                $data->address_link = $request['address_link'];
            }
            if(isset($request['ticket'])){
                $data->ticket = $request['ticket'];
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
        $data = self::$data;
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            $data->data = Events::find($id);
            $data->action = ['admin.'.$data->model->namespace.'.update', 'event' => $id];
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
        $model = self::$data;
        $data = Events::find($id);
        if(Auth::User()){
            $request->validate([
                'name' => 'required|array',
                'name.*' => 'required|max:255',
                'text' => 'nullable',
                'place' => 'required|array',
                'place.*' => 'required|max:255',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['name'])){
                    $data->translateOrNew($locale)->name = $request['name'][$locale];
                    $data->translateOrNew($locale)->slug = str_slug($request['name'][$locale]);
                }
                if(isset($request['place'])){
                    $data->translateOrNew($locale)->place = $request['place'][$locale];
                }
                if(isset($request['role'])){
                    $data->translateOrNew($locale)->role = $request['role'][$locale];
                }
                if(isset($request['text'])){
                    $data->translateOrNew($locale)->text = $request['text'][$locale];
                }
            }

            if(isset($request['date'])){
                $data->date = $request['date'];
            }
            if(isset($request['address_link'])){
                $data->address_link = $request['address_link'];
            }
            if(isset($request['ticket'])){
                $data->ticket = $request['ticket'];
            }

            $data->save();

            return redirect('admin/'.$model->model->namespace);
        }
        else {
            return redirect('/');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Events::find($id);
        if(Auth::User() && $data){
            $data->delete();
            return back();
        }
        else {
            return redirect('/');
        }
    }
}
