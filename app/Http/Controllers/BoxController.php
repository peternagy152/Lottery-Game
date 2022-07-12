<?php

namespace App\Http\Controllers;

use App\Models\box;
use App\Models\boxitem;
use App\Models\winner;
use App\Http\Requests\StoreboxRequest;
use App\Http\Requests\UpdateboxRequest;
use Illuminate\Support\Facades\DB;
use Session;
use Cart;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($box_id)
    {
         $selected_box = box::find($box_id);

         $selected_box -> owner = Session::get('loginId');
         $selected_box -> save();
        return redirect('/home');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $totalprice = 0;
        $box = new box();
        $box -> name = 'Box_1';
        $box -> price = 0;
        $box -> disc = 'Box Containing ';
        $box -> save();

        $boxitem = new boxitem();
        $boxitem -> box_ID = $box -> id ;
        $boxitem -> item_ID = '1';
        $item = DB::table('items')
        ->where('id' , $boxitem->item_ID)
        ->first();
        $boxitem -> item_name  = $item -> name;
        $boxitem -> item_price = $item -> price;
        $boxitem -> save();
        $totalprice = $totalprice + $boxitem -> item_price;

        $boxitem = new boxitem();
        $boxitem -> box_ID = $box -> id ;
        $boxitem -> item_ID = '2';
        $item = DB::table('items')  
        ->where('id' , $boxitem->item_ID)
        ->first();
        $boxitem -> item_name  = $item -> name;
        $boxitem -> item_price = $item -> price;
        $boxitem -> save();
        $totalprice = $totalprice + $boxitem -> item_price;

        $box -> price = $totalprice + 0.1 * $totalprice;
        $box -> save();





    }
    public function Add_to_cart($item_id)
    {
        $Selected_item = DB::table('items')
        ->where('id' , $item_id)
        ->first();

        Cart::add($item_id , $Selected_item -> name ,1 ,$Selected_item -> price );
        return redirect()->route('cart');
        
    }
    public function Empty_cart()
    {
        Cart::destroy();
        return redirect()->route('home');
    }
    public function Remove_item($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart');
    }

    public function create_box()
    {
        $box = new box();
        $latest_box_id = DB::table('boxes')
        ->orderby('created_at' , 'desc')
        ->first();
        if($latest_box_id)
        {
            $latest_box_id->id = $latest_box_id->id +1 ; 
            $box -> name = "box_".$latest_box_id->id ;
        }
        else
        {
            $box -> name = "box_1";
        }
        
       
        $price = 0;
        $desc = 'Box Containing ';
        
        foreach(Cart::content() as $item)
        {
            $price = $price + $item->price;
            $desc = $desc . " " .  $item -> name ." Worth " . $item->price . " ETH";
            
        }

        $box->price = $price + 0.1 * $price;
        $box-> disc  = $desc;

        $box -> save();

        Cart::destroy();

        return redirect()->route('AdminPage');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreboxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreboxRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\box  $box
     * @return \Illuminate\Http\Response
     */
    public function show(box $box)
    {
        //
    }
    public function winner()
    {
        $Active_boxes = DB::table('boxes')
        ->where('active' , 1)
        ->get();

       
        $Possible_winner = DB::table('boxes')
        ->where('active' , 1)
        ->where('owner' , '!=' , 0)
        ->get();
        if(sizeof($Active_boxes) == 0)
        {
            return "NO Active Boxes";
        }
        else if(sizeof($Possible_winner) == 0)
        {
            return "there is no buyers ! ";
        }
        else{
            $random_number = rand(0 , sizeof($Possible_winner) - 1);
        

            $prize  = 0;
            for($x =0 ; $x < sizeof($Possible_winner) ;$x++)
            {
                $prize = $prize + $Possible_winner[$x] -> price ;
    
            }
            $owner_name = DB::table('users')
            ->where('id' ,$Possible_winner[$random_number]->owner)
            ->first();
    
    
            $winner = new winner();
            $winner -> box_name = $Possible_winner[$random_number] -> name ;
            $winner -> owner_name = $owner_name ->Fname;
            $winner -> owner = $Possible_winner[$random_number]->owner;
            $winner -> prize = 0.1 * $prize;
            $winner -> save();
    
            // Reset All Active Boxes to Zero 
            box::where('active', '=', 1)->update(['active' => 0]);
    
            return redirect() -> route('AdminPage');
    
        }
        
        



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\box  $box
     * @return \Illuminate\Http\Response
     */
    public function edit(box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateboxRequest  $request
     * @param  \App\Models\box  $box
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateboxRequest $request, box $box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\box  $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(box $box)
    {
        //
    }
}
