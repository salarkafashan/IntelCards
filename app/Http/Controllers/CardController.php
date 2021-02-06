<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Box;
use Inertia\Inertia;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'front' => ['required', 'string'],
            'back' => ['required', 'string'],
            'box_id' => ['required', 'integer'],  
        ]);
        $data['slug']= Str::slug($data['front']);
        $data['level']= 1;
        Card::create($data);
        
        $box = Box::find($data['box_id'])->first();
        return redirect('boxes/'.$data['box_id'].'-'.$box->slug)->with('message' ,'Card added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $box = $card->box;
        return Inertia::render('Cards/show', ['card' => $card,'box' =>$box]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $data = $request->validate([
            'front' => ['required', 'string'],
            'back' => ['required', 'string'],
        ]);
        $data['slug']= Str::slug($data['front']);
        $card->update($data);

        return redirect('cards/'.$card->id.'-'.$data['slug'])->with('message' , 'card edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $box = $card->box;
        $card->delete();
        return redirect('boxes/'.$box->id.'-'.$box->slug);
    }
}
