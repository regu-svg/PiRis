<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\History;
use App\Models\Printer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function index()
    {
        $products = Printer::paginate(5);
        $auth = Auth::check();
        $admin = false;
        if (Auth::check()) {
            $admin = auth()->user()->role == 1;
        }
        return view('index', compact(['auth', 'admin', 'products']));
    }
    public function catalog()
    {
        $auth = Auth::check();
        $products = Printer::where('count', '>', 0);
        $category = Category::where('title','!=','не указано')->get();
        $selected = ['year' => null, 'country' => null, 'category' => null];
        if(isset($_GET['year'])){
            $selected['year'] = $_GET['year'];
            $products = $products->where('year', $selected['year']);
        }
        if(isset($_GET['country'])){
            $selected['country'] = $_GET['country'];
            $products = $products->where('country', $selected['country']);
        }
        if(isset($_GET['category'])){
            $selected['category'] = $_GET['category'];
            $products = $products->where('category', $selected['category']);
        }
        $products = $products->get();
        return view('catalog', compact(['products', 'selected', 'category', 'auth']));
    }
    public function basket()
    {
        $baskets = Basket::where('id_user', auth()->user()->id)
        ->join('printers','printers.id','=','baskets.id_printer')
        ->select('baskets.count', 'baskets.id', 'title', 'model', 'price', 'img')
        ->get();
        $price_all = 0;
        $count_all = 0;
        foreach ($baskets as $value) {
            $price_all += $value->price * $value->count;
            $count_all += $value->count;
        }
        return view('basket', compact(['baskets', 'price_all', 'count_all']));
    }
    public function login()
    {
        return view('login');
    }
    public function info()
    {
        $auth = Auth::check();
        return view('info', compact('auth'));
    }
    public function item()
    {
        $auth = Auth::check();
        if (isset($_GET['id'])) {
            $printer = Printer::find($_GET['id']);
            if ($printer) {
                return view('item', compact(['printer', 'auth']));
            }
            return redirect('catalog');
        }
        return redirect('catalog');
    }
    public function orders()
    {
        $status = ['Новый', 'Подтвержден', "Отменён"];
        $orders = History::where('user_id', auth()->user()->id)->get();
        return view('orders', compact(['orders', 'status']));
    }
    public function create()
    {
        return view('create');
    }
    public function adminbuy()
    {
        $status = ['Новый', 'Подтвержден', 'Отменён'];
        $category = -1;
        $histories = DB::table('histories');
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $histories = $histories->where('status', $_GET['category']);
            }
            $histories = $histories->join('users', 'users.id', '=', 'histories.user_id')
                ->select('users.name', 'histories.created_at', 'products', 'status', 'price', 'histories.id')
                ->get();
        return view('adminbuy', compact(['histories', 'status', 'category']));
    }
    public function adminitem()
    {
        $update = null;
        if (isset($_GET['update'])) {
            $update = Printer::find($_GET['update']);
        }
        $printers = Printer::all();
        $categories = Category::all();
        return view('adminitem', compact(['printers', 'update', 'categories']));
    }
}
