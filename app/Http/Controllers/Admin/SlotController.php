<?php

namespace App\Http\Controllers\Admin;
use App\Slot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::all();
        return view('admin.slot.index',compact('slots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.slot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'game_slot' => 'required'
        ]);
        $slot = new Slot();
        $slot->game_slot = $request->game_slot;
        $slot->slug = str_slug($request->game_slot);
        $slot->save();
        return redirect()->route('slot.index')->with('successMsg','Category Successfully Saved');
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
        $slot = Slot::find($id);
        return view('admin.slot.edit',compact('slot'));
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
         $this->validate($request,[
            'game_slot'=>'required'
        ]);

        $slot = Slot::find($id);
        $slot->game_slot = $request->game_slot;
        $slot->slug = str_slug($request->game_slot);
        $slot->save();
        return redirect()->route('slot.index')->with('successMsg','Slot Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slot::find($id)->delete();
       return redirect()->back()->with('successMsg','Slot Successfully Delete');
    }
}
