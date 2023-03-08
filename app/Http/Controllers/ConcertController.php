<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('concerts.index', ['concerts' => Concert::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('concerts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'kode_konser' => 'required',
            'nama' => 'required|min:5|max:50'
        ]);
        Concert::create($validateData);
        return redirect()->route('concerts.index')->with('success','Concert created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function show(Concert $concert)
    {
        //
        return view('concerts.show',compact('concert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function edit(Concert $concert)
    {
        //
        return view('concerts.edit',compact('concert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concert $concert)
    {
        //
        $validateData = $request->validate([
            'kode_konser' => 'required',
            'nama' => 'required|min:5|max:50',
        ]);
        Concert::where('id',$concert->id)->update($validateData);
        return redirect()->route('concerts.show',['concert'=>$concert])->with('success','Concert updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concert $concert)
    {
        //
        $concert->delete();

        return redirect()->route('concerts.index')->with('success','Concert Ticket deleted successfully');
    }

    public function about (){
        return view('concerts.about');
    }
}
