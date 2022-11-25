<?php

namespace App\Http\Controllers;

use Sesion;
use Redirect;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Helpers\MessagesHelper;


class ProductoImageController extends Controller
{

    public function destroy(int $id) {
        ProductImage::find($id)->delete();
        return MessagesHelper::getMessage(trans('lang.delete_message'), trans('lang.image_removed'));
    }


}
