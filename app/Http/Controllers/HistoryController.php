<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HistoryController extends Controller
{
    public function store(Request $request)
    {
        if (Hash::check($request->password, auth()->user()->password)) {
            $baskets = Basket::where('id_user', auth()->user()->id)
                ->join('printers', 'printers.id', '=', 'baskets.id_printer')
                ->select('title', 'model', 'price', 'baskets.count')
                ->get();
            $products = "";
            $price = 0;
            foreach ($baskets as $basket) {
                $products .= $basket->title.' '.$basket->model." (".$basket->count . "x), ";
                $price += $basket->price * $basket->count;
            }
            $products = substr($products, 0, -2);
            $res = History::create([
                "user_id" => auth()->user()->id,
                "products" => $products,
                "price" => $price,
            ]);
            if ($res) {
                Basket::where('id_user', auth()->user()->id)->delete();
            }
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['password']);
    }

    public function delete($id)
    {
        History::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->where('status', 0)
            ->delete();
        return redirect()->back();
    }
    public function accept($id, Request $request)
    {
        History::where('id', $id)->update(['status' => 1]);
        return redirect()->back();
    }
    public function cancel($id, Request $request)
    {
        History::where('id', $id)->update(['status' => 2]);
        return redirect()->back();
    }
}
