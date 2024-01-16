<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function store(Request $request, $id)
    {
        $basket = [
            'id_printer' => $id,
            'id_user' => auth()->user()->id,
            'count' => 1,
        ];
        $res = Basket::create($basket);
        if($res){
            return redirect("basket");
        }
    }

    public function destroy($id)
    {
        $basket = Basket::find($id);
        if($basket){
            if(auth()->user()->id != $basket['id_user']){
                return redirect('basket');
            }
            $basket->delete();
            return redirect('basket');
        }
    }

    public function plus($id)
    {
        $res = Basket::find($id);
        if($res){
            $res->count++;
            $res->save();
            return redirect('basket');
        }
    }

    public function minus($id)
    {
        $res = Basket::find($id);
        if($res){
            if($res->count <= 1){
                $res->delete();
                return redirect()->back();
            }
            $res->count--;
            $res->save();
            return redirect('basket');
        }
    }
}
