<?php

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Categories;
use App\User;
use App\Product;
use App\Images;
use App\Cart;


class MasterComposer
{

    public function compose(View $view)
    {
        $category = Product::all();
        $view->with('category', '$category');
    }

}

?>