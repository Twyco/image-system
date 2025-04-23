<?php

namespace Twyco\ImageSystem\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Twyco\ImageSystem\Models\Image;

class ImageController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:16384',
        ]);

        throw_unless(Gate::allows('create', Image::class), 403);

        $path = $request->file('image')->store('images', config('image-system.disk', 'public'));

        $image = Image::create([
            'owner_type' => App\Models\User::class,
            'owner_id' => Auth::user()->id,
            'image_path' => $path,
        ]);

        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}