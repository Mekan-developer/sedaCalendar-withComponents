<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AudioPoem;
use App\Models\Image;
use App\Models\Poem;
use App\Models\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $poemCount = Poem::get()->count();
        $galleryCount = Image::get()->count();
        $audioCount = AudioPoem::get()->count();
        $userCount = User::get()->count();

        return view('admin.home',compact('poemCount','galleryCount','audioCount','userCount'));
    }
}
