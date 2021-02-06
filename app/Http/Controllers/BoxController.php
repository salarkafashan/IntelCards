<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = Auth::user();
        $boxes = $user->boxes;
        return Inertia::render('Boxes/index', ['boxes' => $boxes]);
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
        $data = $request->validate([
            'name' => ['required', 'min:4'],
        ]);
        $data['user_id']= Auth::user()->id;
        $data['slug']= Str::slug($data['name']);
        Box::create($data);

        return redirect('boxes')->with('message' ,'Box created');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Box $box)
    {
        $cards = $box->cards;
        return Inertia::render('Boxes/show', ['cards' => $cards,'box' =>$box]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Box $box)
    {
        $data = $request->validate([
            'name' => ['required', 'min:4'],
        ]);
        $data['user_id']= Auth::user()->id;
        $data['slug']= Str::slug($data['name']);
        $box->update($data);

        return redirect('boxes/'.$box->id.'-'.$data['slug'])->with('message' , 'Box updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Box $box)
    {
        $box->delete();
        return redirect('/boxes');
    }
}
