<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSellerController extends Controller
{
    private $sellers = [
        ['id' => 1, 'name' => 'CraftyJen', 'category' => 'Jewelry', 'products' => 24, 'status' => 'Active', 'date' => '11/22/2023'],
        ['id' => 2, 'name' => "Ben’s Workshop", 'category' => 'Home Decor', 'products' => 35, 'status' => 'Active', 'date' => '09/10/2023'],
        ['id' => 3, 'name' => "Sarah's Sculptures", 'category' => 'Handmade', 'products' => 21, 'status' => 'Active', 'date' => '07/26/2023'],
        ['id' => 4, 'name' => "Anna's Art Studio", 'category' => 'Art', 'products' => 0, 'status' => 'Pending', 'date' => '10/09/2023'],
        ['id' => 5, 'name' => "Alex's Crafts", 'category' => 'Toys', 'products' => 42, 'status' => 'Active', 'date' => '06/19/2023'],
        ['id' => 6, 'name' => "WillowWeave", 'category' => 'Accessories', 'products' => 16, 'status' => 'Active', 'date' => '05/10/2023'],
        ['id' => 7, 'name' => "Mason's Handmade", 'category' => 'Home Decor', 'products' => 0, 'status' => 'Pending', 'date' => '11/19/2023'],
        ['id' => 8, 'name' => "KnitByElla", 'category' => 'Toys', 'products' => 32, 'status' => 'Active', 'date' => '03/15/2023'],
    ];


    public function index(Request $request)
    {
        $sellers = $this->sellers;

        if ($request->search) {
            $search = strtolower($request->search);

            $sellers = array_filter($sellers, function ($seller) use ($search) {
                return str_contains(strtolower($seller['name']), $search) ||
                    str_contains(strtolower($seller['category']), $search);
            });
        }

        return view('sellers', ['sellers' => $sellers]);
    }

    public function view($id)
    {
        return back()->with('msg', "Viewing seller ID: $id");
    }

    public function suspend($id)
    {
        return back()->with('msg', "Seller $id suspended");
    }

    public function ban($id)
    {
        return back()->with('msg', "Seller $id banned");
    }
}
