<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Merchant\Shop;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ShopListPageController extends Controller
{
    public function allshop()
    {
        $district_id = null;
        if (isset($_GET['district_id'])) {
            $district_id = $_GET['district_id'];
        }

        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        }

        $shops = Shop::active()
            ->when($district_id, function ($query, $district_id) {
                $query->where('district_id', $district_id);
            })
            ->when($keyword, function ($query, $keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->select('id', 'name', 'slug', 'address', 'image', 'img_small')
            ->paginate(30);

        // return $shops;
        $divisions = Division::with('districts')
            ->orderBy('name', 'asc')
            ->get();

        return view('frontend.shoppage', compact('shops', 'divisions'));
    }
}
