<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ZoneController extends Controller
{

    public function index()
    {
        $zone['zones'] = Zone::orderBy('id','desc')->paginate(5);
        return view('pages.result', $zone);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
        'name'=> 'required',
        'price' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
      ]);

    $path = $request->file('image')->store('public/images');
    $zone = new Zone();
    $zone->name = $request->name;
    $zone->price = $request->price;
    $zone->image = $path;
    $zone->save();

    return redirect()->route('zones.index')->with('success', 'Post has been created succesfully.');

    }


    public function show(zone $zone)
    {
        //
    }

  
    public function edit(zone $zone)
    {
        return view('zones.edit' , compact('zone'));
    }
   
    public function update(Request $request, zone $zone)
    {
        $request->validate([
            'name'=> 'required',
            'price'=> 'required',
        ]);
      $zone= Zone::find('$id');
        if ($request->hasfile('image')){
            $request->validate([
                'image'=> 'required|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
            ]);
            $path =$request->file('image')->store('public/images');
            $zone->image=$path;
        }
        $zone->name=$request->name;
        $zone->price=$request->price;
        $zone->save();

        return redirect()->route('zones.index')->with('success','Data update successfully.');
    }

    public function destroy(zone $zone)
    {
        $zone->delete();
        return redirect()->route('zones.index')
        ->with('success','Post has been deleted successfully');
    }
}
