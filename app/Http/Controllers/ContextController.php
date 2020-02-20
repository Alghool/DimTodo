<?php

namespace App\Http\Controllers;

use App\context;
use Illuminate\Http\Request;
use Auth;

class ContextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return  view('context/index', ['contexts'=>Context::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Context::create($request->validate(['name' => 'required|string|max:250']));
        return redirect()->route('context.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\context  $context
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, context $context)
    {
        echo "in update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\context  $context
     * @return \Illuminate\Http\Response
     */
    public function destroy(context $context)
    {
        echo "in destroy";
    }
}
