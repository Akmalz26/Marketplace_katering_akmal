<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MerchantProfile;
use App\Models\Menu;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $location = $request->input('location');
        $food_type = $request->input('food_type');

        $query = MerchantProfile::query();

        if ($location) {
            $query->where('address', 'LIKE', "%{$location}%");
        }

        if ($food_type) {
            $query->whereHas('menus', function ($query) use ($food_type) {
                $query->where('name', 'LIKE', "%{$food_type}%");
            });
        }

        $results = $query->get();

        return view('customer.search', compact('results'));
    }
}
