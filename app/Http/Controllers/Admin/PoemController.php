<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PoemRequest;
use App\Models\Poem;
use Illuminate\Http\Request;

class PoemController extends Controller
{
    public function index(){
        $poems = Poem::orderBy('id')->get();
        return view("admin.poem",compact("poems"));        
    }

    public function store(PoemRequest $request){
        
        Poem::create($request->all());
        return redirect()->route('admin.poem');
    }

    public function edit(Poem $poem){
        $poem['showEdit'] = true;
        $poems = Poem::orderBy('id')->get(); 
        return view('admin.poem',compact('poem','poems'));
    }
    public function update(PoemRequest $request){
        $poem_req = Poem::find($request->id);
        $poems = Poem::all();
        $this->sortItems($poems, $poem_req->order, $request->order);
        $poem_req->update($request->all());
        return redirect()->route('admin.poem');
    }

    public function active(Poem $poem){
        if($poem->status == '1'){
            $poem->status = '0';
        }else{
            $poem->status = '1';
        }
            $poem->save();
        return redirect()->route('admin.poem');
    }


    public function destroy(Poem $poem){
        
        $orderDeletedRow = $poem->order;        
        $delete_success = $poem->delete();
         // start sorting order
        if( $delete_success ){
            $table = Poem::orderBy('order', 'asc')->get();
            $this->reorderAfterRemoval($table,$orderDeletedRow);
        }
        // end sorting order

        return redirect()->route('admin.poem');
    }
}
