<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion\Slider;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
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
        $categories = Category::all();
        // return  $categories ;
        $subcategory = SubCategory::all();
        // return  $subcategories ;

        return view('admin.slider.create',compact('categories','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            'link' => 'required',
        ], [
            'link.required' => 'please enter your Category name',
        ]);



        if ($request->hasFile('image')) {

            $name = $request->image->getClientOriginalName();
            $request->image->storeAs('slider', $name, 'public');

            Slider::Create([
                'link'            => $request->link,
                'image'           => $name,
                'category_id'     => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'author_id'       => Auth::guard('admin')->user()->id,
            ]);


            return redirect()->route('slider.index')->with('success', 'successfully data added');
        } else {
            Slider::Create([
                'link'            => $request->link,
                'category_id'     => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'author_id'       => Auth::guard('admin')->user()->id,
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
        $categories = Category::all();
        // return  $categories ;
        $subcategories = SubCategory::all();
        // return  $subcategory ;
        $slider = Slider::where('id', $id)->get()->first();


        return view('admin.slider.edit', compact('slider','categories','subcategories'));
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
        // return $request->all();

        $old_image = $request->old_image;
        if ($request->hasFile('image')) {
            $name = $request->image->getClientOriginalName();
            $request->image->storeAs('slider', $name, 'public');
            Slider::findOrFail($id)->update([
                'link'            => $request->link,
                'image'           => $name,
                'category_id'     => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'author_id'       => Auth::guard('admin')->user()->id,
            ]);

            if (isset($old_image)) {
                unlink($old_image);
            }
            return redirect()->route('slider.index')->with('success', 'successfully data added');
        } else {

            Slider::findOrFail($id)->update([
                'link'            => $request->link,
                'category_id'     => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'author_id'       => Auth::guard('admin')->user()->id,
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

        Storage::disk('public')->delete('slider/' . $slider->image);
        // return 'storage/slider/' . $slider->image;

        $slider->delete();
        return redirect(route('slider.index'));
    }
}
