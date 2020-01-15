<?php

namespace App\Http\Controllers;
use App\Slider;
use App\Events;
use App\Video;
use App\Review;
use App\News;
use App\Contact;
use Carbon\carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	static $generalData;

	public function __construct(){

		$currentDate = Carbon::now()->format('Y-m-d');
        $events = Events::whereDate('date', '>=', $currentDate)->orderBy('date', 'asc')->skip(0)->take(3)->get();
        $news = News::where('active', true)->orderBy('date', 'desc')->skip(0)->take(3)->get();
        $contact = Contact::find(1);

        $data = array(
        	'events' => $events,
        	'news'	 => $news,
        	'contact' => $contact,
        );
        self::$generalData = (object) $data;
    }
    public function homePage(){
    	$data = [];
    	$general = self::$generalData;
    	$data['general'] = $general;

    	$slider = Slider::where('active', true)->orderBy('ord', 'asc')->get();
    	$currentDate = Carbon::now()->format('Y-m-d');
        $events = Events::whereDate('date', '>=', $currentDate)->orderBy('date', 'asc')->get();
    	$news = News::where('active', true)->orderBy('date', 'desc')->skip(0)->take(3)->get();
    	$reviews = Review::where('active', true)->orderBy('ord', 'asc')->get();
    	$videos = Video::where('active', true)->orderBy('date', 'desc')->get();

    	$pageData = array(
    		'slides' => $slider,
    		'events' => $events,
    		'news' => $news,
    		'reviews'	=> $reviews,
    		'videos'	=> $videos,
    	);
    	$data['data'] = (object) $pageData;
    	$data = (object) $data;
    	return view('home', compact('data'));
    }

    public function biographyPage(){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;

        $data = (object) $data;
    	return view('biography', compact('data'));
    }
    public function eventsPage($filter){
        $data = [];
        $events = [];
        $banner = null;
        $topEvent = null;
        $general = self::$generalData;
        $data['general'] = $general;
        $filters = ['future', 'passed'];
        $currentDate = Carbon::now()->format('Y-m-d');

        if(in_array($filter, $filters)){
            if($filter && $filter == 'future'){
                $topEvent = Events::whereDate('date', '>=', $currentDate)->orderBy('date', 'asc')->first();
                $events = Events::whereDate('date', '>=', $currentDate)->where('id', '!=', $topEvent->id)->orderBy('date', 'asc')->get();
            }
            elseif($filter == 'passed'){
                $events = Events::whereDate('date', '<=', $currentDate)->orderBy('date', 'asc')->get();
            }
            $pageData = array(
                'banner' => $banner,
                'topEvent' => $topEvent,
                'events' => $events,
                'filter' => $filter,
            );
            $data['data'] = (object) $pageData;
            $data = (object) $data;
            return view('events', compact('data'));
        }
        else {
            return redirect('/');
        }
        
    }
}
