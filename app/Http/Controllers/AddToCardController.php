<?php

namespace App\Http\Controllers;

use App\Models\AddToCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCardController extends Controller
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
    public function add_to_card($id)
    {
        $id_user = Auth::guard('user')->user()->id;
        if (isset($id_user)) {

            $add = AddToCard::where('id_san_pham', $id)->where('id_user', $id_user)->get()->count();
            if ($add > 0) {
            } else {
                AddToCard::create([
                    'id_san_pham' => $id,
                    'id_user' =>  $id_user,
                ]);
            }
        }
        return response()->json(['status' => true]);
    }

    public function gio_hang()
    {
        $id_user = Auth::guard('user')->user()->id;
        if (isset($id_user)) {
            $gio_hang = AddToCard::where('id_user',$id_user)->get();
        }
        return view('home.gio_hang', compact('gio_hang','gio_hang'));
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
     * @param  \App\Models\AddToCard  $addToCard
     * @return \Illuminate\Http\Response
     */
    public function show(AddToCard $addToCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddToCard  $addToCard
     * @return \Illuminate\Http\Response
     */
    public function edit(AddToCard $addToCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddToCard  $addToCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddToCard $addToCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddToCard  $addToCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddToCard $addToCard)
    {
        //
    }
}
