<?php

namespace App\Http\Controllers;

use App\Imports\whiskiesImport;
use App\Models\Whisky;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WhiskyController extends Controller
{

    public function getImportWhisky(){
        return view('import-whisky');
    }

    public function postImpoerWhisky(Request $request){

        Excel::import(new whiskiesImport, request()->file('file'));
        
        return back()->with('success', 'All good!');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Whisky::orderBy('size', 'desc')->get();
        $data['sizes'] = $collection->groupBy('size');
        $data['whiskies'] = Whisky::all();
        return view('whisky', ['data' => $data]);
    }

    public function filter(Request $request){
        $collection = Whisky::orderBy('size', 'desc')->get();
        $data['sizes'] = $collection->groupBy('size');
        $data['whiskies'] = Whisky::with(['brand'])->where('size', '=', $request->size)->whereBetween('price', [$request->start_price, $request->end_price])->orderBy('price')->get();
        return view('whisky', ['data' => $data]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Whisky  $whisky
     * @return \Illuminate\Http\Response
     */
    public function show(Whisky $whisky)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whisky  $whisky
     * @return \Illuminate\Http\Response
     */
    public function edit(Whisky $whisky)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Whisky  $whisky
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Whisky $whisky)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whisky  $whisky
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whisky $whisky)
    {
        //
    }
}
