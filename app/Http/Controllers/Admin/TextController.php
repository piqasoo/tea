<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class TextController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = array();

        $langs = \Config::get('app.locales');
        $defaultLang = \Config::get('app.fallback_locale');

        foreach ($langs as $key => $lang) {
            $path = public_path('../') . 'resources/lang/'.$lang.'/'.$lang.'.json';
            if(file_exists($path)){
                $fileContent = file_get_contents($path);
                $dataContent = json_decode($fileContent,true);
                $texts[$lang] = $dataContent;
            } 
            else {
                mkdir(public_path('../') . 'resources/lang/'.$lang, 0777, true);
                $jsonFile = fopen(public_path('../') . 'resources/lang/'.$lang.'/'.$lang.'.json', "w") or die("Unable to open file!");
                $defaultLangData = file_get_contents(public_path('../') . 'resources/lang/'.$defaultLang.'/'.$defaultLang.'.json');
                fwrite($jsonFile, $defaultLangData);
                fclose($jsonFile);

                $langFiles = json_decode($defaultLangData, true);
            
                if(!empty($langFiles)){
                    foreach ($langFiles as $key => $langFile) {
                        $phpFile = fopen(public_path('../') . 'resources/lang/'.$lang.'/'.$key.'.php', "w") or die("Unable to open file!");
                             $content = 
                        "<?php
                        \$path = public_path('../') . 'resources/lang/".$lang."/".$lang.".json';
                        \$fileContent = file_get_contents(\$path);
                        \$data = json_decode(\$fileContent,true);

                        if(isset(\$data['".$key."'])){
                            return \$data['".$key."'];
                        }";
                        fwrite($phpFile, $content);
                        fclose($phpFile);

                        $fileContent = file_get_contents(public_path('../') . 'resources/lang/'.$lang.'/'.$lang.'.json');
                        $dataContent = json_decode($fileContent,true);
                        $texts[$lang] = $dataContent;
                    }
                }

            }
        }
        $data = array(
            'langs' => $langs,
            'texts' => $texts,
        );
        $data = (object) $data;
        return view('admin.texts.index', compact('data'));
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
        
        $lang = '';
        $group = isset($request['group']) ? $request['group'] : 'texts';
        $key = '';
        $value = '';
        $oldValue = '';
        $newValue = '';
        $response = [];
        $defaultLang = \Config::get('app.fallback_locale');
        $langs = \Config::get('app.locales');

        if(isset($request['lang'])){
            $lang = $request['lang'];
        }
        if(isset($request['key'])){
            $key = $request['key'];
        }
        if(isset($request['value'])){
            $value = $request['value'];
        }
        if(isset($request['old_value'])){
            $oldValue = $request['old_value'];
        }
        if(isset($request['new_value'])){
            $newValue = $request['new_value'];
        }

        if(isset($request['newText']) && $request['newText'] == "true"){
            if(!$key && !$value && !$group){
                $response = [
                    'code' => 404,
                    'status' => 'error',
                    'msg'   => 'cant create text record!',
                ];
            }
            else {

                foreach($langs as $k => $lang) {
                    $res = $this->makeFile($group, $lang, $key, $value);
                    if(!empty($res)){
                        array_push($response, $res);
                    }
                    
                }
                
            }
        }
        else {

            if(!$lang && !$group && !$key && !$newValue){

                $response = [
                    'code' => 404,
                    'status' => 'error',
                    'msg'   => 'group or key doesn`t exists!',
                ];
            }
            else {
                $jsonConf = public_path('../') . 'resources/lang/'.$lang.'/'.$lang.'.json';
                if(file_exists($jsonConf)){
                    $confData = file_get_contents($jsonConf);
                    $data = json_decode($confData,true);

                    if(isset($data[$group])){
                        $data[$group][$key] = $newValue;
                    }
                    $data = json_encode($data);
                    $fh = fopen( $jsonConf, 'w');
                    fwrite($fh, $data);
                    fclose($fh);
                }
                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'msg'   => 'texts has been updated!',
                ];
            }
        }

        return response()->json($response);
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
    public function destroy(Request $request, $id)
    {
        $locales = \Config::get('app.locales') ? \Config::get('app.locales') : \Config::get('app.fallback_locale');          
        $group = '';
        $key = '';
        $response = [];

        if(isset($request['group'])){
            $group = $request['group'];
        }
        if(isset($request['key'])){
            $key = $request['key'];
        }

        if(!$group && !$key){

            $response = [
                'code' => 404,
                'status' => 'error',
                'msg'   => 'group or key doesn`t exists!',
            ];
        }
        else {

            foreach ($locales as $lang) {
                $jsonConf = public_path('../') . 'resources/lang/'.$lang.'/'.$lang.'.json';
                if(file_exists($jsonConf)){
                    $confData = file_get_contents($jsonConf);
                    $data = json_decode($confData,true);

                    if(isset($data[$group])){
                        unset($data[$group][$key]);
                    }
                    
                    $data = json_encode($data);
                    $fh = fopen( $jsonConf, 'w');
                    fwrite($fh, $data);
                    fclose($fh);
                }
            }
            $response = [
                'code' => 200,
                'status' => 'success',
                'msg'   => 'texts has been updated!',
            ];
        }

        return response()->json($response);
    }

    public function makeFile($group, $lang, $key, $value){
        $response = [];
        $jsonConf = public_path('../') . 'resources/lang/'.$lang.'/'.$lang.'.json';

        if(file_exists($jsonConf)){
            $confData = file_get_contents($jsonConf);
            
            $data = json_decode($confData,true);
            if(isset($data[$group]) && !isset($data[$group][$key])){
                $data[$group][$key] = $value;
            }
            $data = json_encode($data);
            // dd($data);
            $fh = fopen( $jsonConf, 'w');
            fwrite($fh, $data);
            fclose($fh);
        }
        $res = [
            'code' => 200,
            'status' => 'success',
            'msg'   => 'texts has been created!',
            'lang' => $lang,
        ];
        array_push($response, $res);
        return $response;
    }
}
