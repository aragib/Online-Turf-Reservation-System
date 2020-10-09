<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Slider;
use App\Slot;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $items = Item::all();
        $slots = Slot::all();
        return view('welcome',compact('sliders','categories','items', 'slots'));
    }
}
