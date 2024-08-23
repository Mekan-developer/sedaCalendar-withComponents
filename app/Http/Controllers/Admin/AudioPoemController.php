<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AudioPoemRequest;
use App\Models\AudioPoem;
use Illuminate\Support\Facades\Storage;

class AudioPoemController extends Controller
{
    public function index(){
        $audios = AudioPoem::orderBy('id')->get();
        return view("admin.audioPoem", compact("audios"));
    }

    public function store(AudioPoemRequest $request){
        $random = hexdec(uniqid());
        $filename = $random . '.' . $request->audio->extension();
        Storage::disk('audio_uploads')->putFileAs('', $request->audio,$filename);

        AudioPoem::create([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'audio' => $filename,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.audioPoem')->with('success','Songs created successfully!');
    }

    public function edit(AudioPoem $audioPoem){
        $audioPoem['showEdit'] = true;
        $audios = AudioPoem::orderBy('id')->get(); 
        return view('admin.audioPoem',compact('audioPoem','audios'));
    }

    public function update(AudioPoemRequest $request, AudioPoem $audioPoem){
        $audioPoems = AudioPoem::all();
        $this->sortItems($audioPoems, $audioPoem->order, $request->order);

        $data = [
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'status' => $request->status,
            'order' => $request->order
        ];

        if($request->has('audio')){
            $this->removeFile($audioPoem->audio, 'audio');
            $random = hexdec(uniqid());
            $filename = $random . '.' . $request->audio->extension();
            Storage::disk('audio_uploads')->putFileAs('', $request->audio,$filename);
            $data['audio'] = $filename;
        }

        $audioPoem->update($data);
        return redirect()->route('admin.audioPoem')->with('success','audio poems successfully updated!');

    }

    public function destroy(AudioPoem $audioPoem){
        if ($audioPoem->audio) {
            $this->removeFile($audioPoem->audio, 'audio');
        } 
        $orderDeletedRow = $audioPoem->order;
        $delete_success = $audioPoem->delete();

        // sorting order
        if( $delete_success ){
            $table = AudioPoem::orderBy('order', 'asc')->get();
            $this->reorderAfterRemoval($table,$orderDeletedRow);
        }
        // end sorting order

        return redirect()->route('admin.audioPoem');
    }

    public function active(AudioPoem $audioPoem){
        if($audioPoem->status == '1'){
            $audioPoem->status = '0';
        }else{
            $audioPoem->status = '1';
        }
            $audioPoem->save();
        return redirect()->route('admin.audioPoem');
    }
}
