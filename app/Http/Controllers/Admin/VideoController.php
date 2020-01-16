<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Providers\MediaProvider as MediaLibrary;
use App\Video;
use DB;
use Auth;

class VideoController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        $this->middleware('auth');
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule('video');
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
            $data->data = Video::with('video_translations')->paginate(15);
            $data->action = $data->route;
            $data->method = 'POST';
            $data->editRoute = 'admin.'.$data->model->namespace.'.edit';
            $data->deleteRoute = 'Admin\VideoController@destroy';
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
            $data->data = new Video;
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
        // dd($request->all());
        $model = self::$data;
        $data = new Video;
        if(Auth::User()){
            $request->validate([
                'image' => 'required|image',
                'video' => 'required|string',
                'title' => 'required|array',
                'title.*' => 'required|max:255',
                'text' => 'nullable',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['title'])){
                    $data->translateOrNew($locale)->title = $request['title'][$locale];
                    $data->translateOrNew($locale)->slug = str_slug($request['title'][$locale]);
                }
                if(isset($request['text'])){
                    $data->translateOrNew($locale)->text = $request['text'][$locale];
                }
            }

            if(isset($request['date'])){
                $data->date = $request['date'];
            }
            if(isset($request['active'])){
                $data->active = $request['active'];
            }
            if(isset($request['video'])){
                $link = $request['video'];
                $video_id = explode("/", $link);
                if(count($video_id) == 4 && $video_id[3]){
                    $data->video = $video_id[3];
                }
                else {
                    $data->video = $request['video'];
                }
            }

            $data->save();

            if(isset($request['image'])){
                MediaLibrary::putImage($data, 'image', $request['image'],  'video');
            }

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
            $data->data = Video::find($id);
            $data->action = ['admin.'.$data->model->namespace.'.update', 'video' => $id];
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
        $data = Video::find($id);
        if(Auth::User()){
            $request->validate([
                'image' => 'nullable|image',
                'video' => 'required|string',
                'title' => 'required|array',
                'title.*' => 'required|max:255',
                'text' => 'nullable',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['title'])){
                    $data->translateOrNew($locale)->title = $request['title'][$locale];
                    $data->translateOrNew($locale)->slug = str_slug($request['title'][$locale]);
                }
                if(isset($request['text'])){
                    $data->translateOrNew($locale)->text = $request['text'][$locale];
                }
            }

            if(isset($request['date'])){
                $data->date = $request['date'];
            }
            if(isset($request['active'])){
                $data->active = $request['active'];
            }
            if(isset($request['video'])){
                $link = $request['video'];
                $video_id = explode("/", $link);
                if(count($video_id) == 4 && $video_id[3]){
                    $data->video = $video_id[3];
                }
                else {
                    $data->video = $request['video'];
                }                
            }

            $data->save();

            if(isset($request['image'])){
                MediaLibrary::putImage($data, 'image', $request['image'],  'video');
            }

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
        $data = Video::find($id);
        if(Auth::User() && $data){
            MediaLibrary::deleteImage($data, 'image',  'video');
            $data->delete();
            return back();
        }
        else {
            return redirect('/');
        }
    }
}
