<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'link' => 'required',
        ], [
            'link.required' => 'please enter your Category name',
        ]);



        if ($request->hasFile('image')) {

            $name = $request->image->getClientOriginalName();
            $request->image->storeAs('slider', $name, 'public');

            Slider::Create([
                'link' => $request->link,
                'image' => $name,
                'author_id' => Auth::guard('admin')->user()->id,
            ]);


            return redirect()->route('slider.index')->with('success', 'successfully data added');
        } else {
            Slider::Create([
                'link' => $request->link,
                'author_id' =>  Auth::guard('admin')->user()->id,
            ]);
            return redirect()->route('slider.index')->with('success', 'successfully data added');
        };
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
        $slider = Slider::where('id', $id)->get()->first();


        return view('admin.slider.edit', compact('slider'));
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

        $old_image = $request->old_image;
        if ($request->hasFile('image')) {
            $name = $request->image->getClientOriginalName();
            $request->image->storeAs('slider', $name, 'public');
            Slider::findOrFail($id)->update([
                'link'      => $request->link,
                'image'     => $name,
                'author_id' => Auth::guard('admin')->user()->id,
            ]);

            if(isset($old_image)){
                unlink($old_image);
            }
            return redirect()->route('slider.index')->with('success', 'successfully data added');
        } else {

            Slider::findOrFail($id)->update([
                'link'      => $request->link,
                'author_id' => Auth::guard('admin')->user()->id,

            ]);
            return redirect()->route('slider.index')->with('success', 'successfully data added');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $slider = Slider::findOrFail($id);

        Storage::delete('storage/slider' . $slider->image);

        $slider->delete();
        return redirect(route('slider.index'));
    }
}
