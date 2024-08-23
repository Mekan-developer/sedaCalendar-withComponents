<?php

namespace App\Http\Controllers;

use App\Models\AudioPoem;
use App\Models\Image;
use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $poems = Poem::where("status",true)->orderBy('order')->get();
        $audios = AudioPoem::where('status',true)->orderBy('order')->get();
        $images = Image::where("status", true)->orderBy('order')->get();
        
        return view("user", compact("images","audios","poems"));
    }

    public function admins(){
        $admins = User::where("is_admin",0)->get();
        return view("admin.adminControll",compact("admins"));
    }

    public function create(Request $request){
        User::create($request->all());
        return redirect()->route('admin.controll')->with('message', 'successfully created admin');       
    }

    public function destroy(User $user){
        $user = $user->delete();
        return redirect()->route('admin.controll')->with('message','Admin deleted successfully!');
    }

    public function showPoem(Poem $poem){
        return view('show-poem',compact('poem'));
    }
}
