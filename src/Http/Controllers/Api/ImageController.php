<?php

namespace Twyco\ImageSystem\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminAlbumResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Twyco\ImageSystem\Models\Image;
use Twyco\ImageSystem\Http\Resources\GenericPaginationResource;
use Twyco\ImageSystem\Http\Resources\ImageResource;

class ImageController extends Controller
{

    public function paginate(Request $request)
    {
        $images = Image::paginate(12);

        return response(GenericPaginationResource::make($images, ImageResource::class), 200);
    }

}