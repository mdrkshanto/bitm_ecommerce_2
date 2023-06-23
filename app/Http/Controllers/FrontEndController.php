<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    private $title;

    public function index()
    {
        $this->title = "Home";
        return view('website.home.index',["title"=>$this->title]);
    }

    public function shop()
    {
        $this->title = 'Shop';
        return view('website.shop.index',['title'=>$this->title]);
    }

    public function category()
    {
        $this->title = 'Category';
        return view('website.category.index',['title'=>$this->title]);
    }

    public function product()
    {
        $this->title = 'Product';
        return view('website.product.index',['title'=>$this->title]);
    }

    public function cart()
    {
        $this->title = 'Cart';
        return view('website.cart.index',['title'=>$this->title]);
    }

    public function checkout()
    {
        $this->title = 'Checkout';
        return view('website.checkout.index',['title'=>$this->title]);
    }
}
