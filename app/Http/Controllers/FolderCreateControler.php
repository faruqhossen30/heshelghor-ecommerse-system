<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FolderCreateControler extends Controller
{
    public function folder()
    {
        if(!is_dir('uploads/brand')){
            mkdir('uploads/brand');
        }
        if(!is_dir('uploads/category')){
            mkdir('uploads/category');
        }
        if(!is_dir('uploads/market')){
            mkdir('uploads/market');
        }
        if(!is_dir('uploads/merchant')){
            mkdir('uploads/merchant');
        }
        if(!is_dir('uploads/product')){
            mkdir('uploads/product');
        }
        if(!is_dir('uploads/products')){
            mkdir('uploads/products');
        }
        if(!is_dir('uploads/shop')){
            mkdir('uploads/shop');
        }
        if(!is_dir('uploads/subcategory')){
            mkdir('uploads/subcategory');
        }
        if(!is_dir('uploads/user/profile')){
            mkdir('uploads/user/profile');
        }

        echo "All Folder create successfully";
    }
}
