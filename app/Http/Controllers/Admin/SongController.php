<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SongRequest;
use App\Models\AudioPoem;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index(){

        return view("admin.audioPoem");
        
    }

    public function store(SongRequest $request){
        $random = hexdec(uniqid());
        $filename = $random . '.' . $request->audio->extension();
        Storage::disk('audio_uploads')->put($filename, $request->audio);

        $song = AudioPoem::create([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'audio' => $filename,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.audioPoem')->with('success','Songs created successfully!');

    }
}
