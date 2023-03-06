<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watch;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class WatchController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $watches = Watch::latest()->paginate(5);

        return view('watch.index', ['watches' => $watches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('watch.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'material' => 'required',
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //image upload
        $file = $request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'), $file_name);

        //store db
        Watch::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $file_name,
           'material' => $request->material,
           'description' => $request->description,
        ]);

        return redirect(route('watch.index'))->with('info', 'Watch created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $watch = Watch::find($id);
        $categories = Category::all();
        return view('watch.edit', ['watch' => $watch, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $watch = Watch::find($id);

        $validator = validator($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'material' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //image upload
        if ($request->files->has('image')) {
            File::delete(public_path('/images/'.$watch->image));
            $file = $request->file('image');
            $file_name = uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images/'), $file_name);
        } else {
            $file_name = $watch->image;
        }


        $watch->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $file_name,
            'material' => $request->material,
            'description' => $request->description,
        ]);

        return redirect(route('watch.index'))->with('info', 'Watch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $watch = Watch::find($id);
        File::delete(public_path('/images/'.$watch->image));
        $watch->delete();
        return back()->with('success', 'Watch deleted!');
    }
}
