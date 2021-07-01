<?php

namespace App\Http\Controllers;

use App\Catagory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allCat(){
        $catagories = Catagory::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.category.index', compact('catagories'));
    }

    public function addCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
        ],
        [
            'category_name.required' => 'Please Enter Catagory Name...',
            'category_name.max' => 'Catagory name must be lase than 255 chars.',
        ]
    );

    Catagory::insert([
        'category_name' => $request->category_name,
        'user_id'       => Auth::user()->id,
        'created_at'    => Carbon::now()
    ]);

    return redirect()->back()->with('success', 'Catagory add succesfully');


    }

    public function editCat($id){
        $catagory = Catagory::find($id);
        return view('admin.category.edit', compact('catagory'));
        // return $catagory;

    }
    public function upadateCat(Request $request, $id){
        $udpdate = Catagory::find($id)->update(
            [
                'category_name' => $request->category_name,
                'user_id'       => Auth::user()->id,
            ]
        );

        return redirect()->route('all.category')->with('success', 'Catagory Updated !');

    }

    public function destroyCat($id){
        $delete = Catagory::find($id)->delete();

        return redirect()->route('all.category')->with('success', 'Catagory has been deleted !');

    }
}
