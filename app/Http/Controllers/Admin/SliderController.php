<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_user;

    public function __construct(Slider $userObject)
    {
        $this->middleware('auth:web');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        $slider=Slider::get();
        return view('admin.sliders.index', ['title' => 'Registered slider List','slider'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create', ['title' => 'Create slider']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sliders,name|max:255',
            'paragraph' => 'required|unique:sliders,paragraph|max:255',
            'button' => 'required|unique:sliders,paragraph|max:255',
            'slug' => 'required|unique:sliders,paragraph|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $input = $request->all();
        $slider = new Slider();
        $slider->name = $input['name'];
        $slider->paragraph = $input['paragraph'];
        $slider->button = $input['button'];
        $slider->slug = $input['slug'];
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/gallery/";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                $request->file('image')->move($destinationPath, $fileName);
                $slider->image = $fileName;
                $slider->save();
            }
        }
        $slider->save();
        Session::flash('success_message', 'Great! Slider has been saved successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this->obj_user->findOrFail($id);
        return view('admin.sliders.edit', ['title' => 'Update Service Details', 'slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'paragraph' => 'max:255',
            'button' => 'max:255',
            'slug' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        $slider = Slider::findOrFail($id); // find the slider by ID

        $slider->name = $request->input('name');
        $slider->paragraph = $request->input('paragraph');
        $slider->button = $request->input('button');
        $slider->slug = $request->input('slug');

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg'
            ]);

            $file = $request->file('image');
            $destinationPath = "uploads/gallery/";
            $extension = $file->getClientOriginalExtension();
            $fileName = rand() . '.' . $extension;
            $file->move($destinationPath, $fileName);
            $slider->image = $fileName;
        }

        $slider->save();

        Session::flash('success_message', 'Great! Slider has been updated successfully!');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->obj_user->findOrFail($id);
        $user->delete();
        Session::flash('success_message', 'Slider successfully deleted!');
        return redirect()->route('slider.index');
    }

    public function deleteSelectedGallery(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'gallery' => 'required',

        ]);
        foreach ($input['gallery'] as $index => $id) {

            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'Gallery successfully deleted!');
        return redirect()->back();

    }
}
