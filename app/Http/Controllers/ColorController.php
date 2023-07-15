<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
    public function index()
    {
        $colors = Color::all();
        return view('admin.pages.colors.index',['colors' => $colors]);
    }
    public function store(Request $request){
        $request ->validate([
            'name' => 'required|unique:colors|max:255',
            'code' => 'required|max:255'
        ]);

        //store
        $color = new Color();
        $color ->name = $request->name;
        $color ->code = $request->code;
        $color->save();

        //return respone
        return back()->with('success','Color Saved Successfully.');
    }

    public function destroy($id){
        //test-> dd($request->all());
        Color::findOrFail($id)->delete();
        return back()->with('success','Color Deleted Successfully.');
    }
}
