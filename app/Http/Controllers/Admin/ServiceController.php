<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_user;

    public function __construct(Service $userObject)
    {
        $this->middleware('auth:web');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        $service=Service::get();
        return view('admin.services.index', ['title' => 'Registered services List','service'=>$service]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create', ['title' => 'Create service']);
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
            'name' => 'required|unique:services,name|max:255',
            'paragraph' => 'required|:services,paragraph',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status'=>''
        ]);
        $input = $request->all();
        $service = new Service();
        $service->name = $input['name'];
        $service->paragraph = $input['paragraph'];
        if ($request->active) {
            $service->active = 1;
        } else {
            $service->active = 0;
        }

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
                $service->image = $fileName;
                $service->save();
            }
        }
        $service->save();
        Session::flash('success_message', 'Great! Service has been saved successfully!');
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
        $service = $this->obj_user->findOrFail($id);
        return view('admin.services.edit', ['title' => 'Update Service Details', 'service' => $service]);
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
            'name' => 'required|unique:services,name,'.$id.'|max:255',
            'paragraph' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            'status'=>''
        ]);

        $service = Service::findOrFail($id);
        $service->name = $request->input('name');
        $service->paragraph = $request->input('paragraph');
        if ($request->active) {
            $service->active = 1;
        } else {
            $service->active = 0;
        }
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);

                $file = $request->file('image');
                $destinationPath = "uploads/gallery/";
                $extension = $file->getClientOriginalExtension();
                $fileName = rand() . $file->getClientOriginalName();
                $file->move($destinationPath, $fileName);

                $delete_old_file = "uploads/images/" . $service->image;
                if (File::exists($delete_old_file)) {
                    File::delete($delete_old_file);
                }

                $service->image = $fileName;
            }
        }

        $service->save();

        Session::flash('success_message', 'Great! Service has been updated successfully!');
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
        Session::flash('success_message', 'Service successfully deleted!');
        return redirect()->route('service.index');
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
        Session::flash('success_message', 'Service successfully deleted!');
        return redirect()->back();

    }
}
