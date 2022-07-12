<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Http\Requests\StoreitemRequest;
use App\Http\Requests\UpdateitemRequest;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $item = new item();
        $item -> name = $req -> input('name');
        $item -> price =  $req -> input('price');
        $item -> image =  $req -> input('image');
        $item -> disc =  $req -> input('disc');
        $item -> save();

        return redirect()->route('AdminPage');

    }

    public function itemAddPage()
    {
        if(Session::has('loginId'))
        {
           
           $user = DB::table('users')
           ->where('id' , Session::get('loginId'))
           ->first();
           if($user -> Role == 'ADM')
           {
                return view('additem');
             
           }
           else 
           {
            return "You are Not allowed to Reach this Page";
           }

        }
        else{
            return "You Must Login First";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new item();
        $item -> name = 'Voucher';
        $item -> price = 0.0096;
        $item -> image = 'Image Path';
        $item -> disc = "Voucher worth 0.096 ETH";
        $item -> save();

        $item = new item();
        $item -> name = 'iPhone';
        $item -> price = 0.000048 ;
        $item -> image = 'Image Path';
        $item -> disc = "iPhone  worth 0.000048 ETH";
        $item -> save();

        $item = new item();
        $item -> name = 'laptop';
        $item -> price = 2.39 ;
        $item -> image = 'Image Path';
        $item -> disc = "laptop  worth 2.39 ETH";
        $item -> save();
        



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreitemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreitemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateitemRequest  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateitemRequest $request, item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        //
    }

}
