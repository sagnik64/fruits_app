<?php

namespace App\Http\Controllers;

use App\Models\Fruits;
use CreateFruitsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FruitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Fruits::all();
        if($result) {
            return $result;
        }
        else {
            return ["Result"=>"No records found"];
        }

    }
    public function getBySearch(Request $request) {
    
        $name = $request->name;
        $color = $request->color;
        $quantityStart = (int)($request->quantityStart);
        $quantityEnd = (int)($request->quantityEnd);
        
        $fruit = Fruits::where('name','like',$name.'%')
        ->where('color','like', $color.'%')
        ->whereBetween('quantity',[$quantityStart, $quantityEnd])
        ->get();
        return [
            'name' => $name,
            'color' => $color,
            'quantityStart' => $quantityStart,
            'quantityEnd' => $quantityEnd,
            'data' => $fruit     
        ];
    }

    /**`
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
        $fruit = new Fruits();
        $fruit->name = $request->name;
        $fruit->color = $request->color;
        $fruit->quantity = $request->quantity;
        $result = $fruit->save();
        if($result) {
            return ["Result"=>"Stored successfully"];
        }
        else {
            return ["Result"=>"Failed to store"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fruits  $fruits
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Fruits::find($id);
        if($result) {
            return $result;
        }
        else {
            return ["Result"=>"Wrong ID"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fruits  $fruits
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) 
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fruits  $fruits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $fruit = Fruits::find($id);
        $fruit->update($request->all());
        return $fruit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fruits  $fruits
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Fruits::destroy($id);
    }
}
