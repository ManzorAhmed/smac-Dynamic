<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct(Product $userObject)
    {
        $this->middleware('auth:web');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        $product=Product::get();
        return view('admin.products.index', ['title' => 'Registered products List','product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', ['title' => 'Create product']);
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
            'name' => 'required|unique:products,name|max:255',
            'description' => 'required',
            'Paragraph' => 'required,max:655',
            'price' => 'required|integer',
            'original_price' => 'required|integer',
            'discount' => 'integer',
            'p_save' => 'integer',
            'sku' => 'required|unique:products,sku',
            'availability' => 'required|in:in_stock,out_of_stock',
            'color' => 'required|in:blue,white,black',
            'size' => 'required|in:small,medium,large',
            'qty' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => '',
        ]);

        $input = $request->all();
        $product = new Product();
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->Paragraph = $input['Paragraph'];
        $product->price = $input['price'];
        $product->original_price = $input['original_price'];
        $product->p_save = $input['p_save'];
        $product->sku = $input['sku'];
        $product->availability = $input['availability'];
        $product->color = $input['color'];
        $product->size = $input['size'];
        $product->discount = 5; // Set discount amount to 5%
        $product->qty = $input['qty'];
        if ($request->active) {
            $product->active = 1;
        } else {
            $product->active = 0;
        }
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = "uploads/product/";
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileName = rand() . $fileName;
                $request->file('image')->move($destinationPath, $fileName);
                $product->image = $fileName;
                $product->save();
            }
        }
        $product->save();
        Session::flash('success_message', 'Great! Product has been saved successfully!');
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
        $product = $this->obj_user->findOrFail($id);
        return view('admin.products.edit', ['title' => 'Update Service Details', 'product' => $product]);
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
            'name' => 'required|max:255|unique:products,name,'.$id,
            'description' => 'required',
            'paragraph' => 'max:655',
            'price' => 'numeric',
            'original_price' => 'numeric',
            'discount' => 'nullable|numeric',
            'p_save' => 'nullable|numeric',
            'sku' => '|unique:products,sku,'.$id,
            'availability' => 'in:in_stock,out_of_stock',
            'color' => 'in:blue,white,black',
            'size' => 'in:small,medium,large',
            'qty' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'status' => '',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->paragraph = $request->input('paragraph');
        $product->price = $request->input('price');
        $product->original_price = $request->input('original_price');
        $product->discount = $request->input('discount', 0);
        $product->p_save = $request->input('p_save', 0);
        $product->sku = $request->input('sku');
        $product->availability = $request->input('availability');
        $product->color = $request->input('color');
        $product->size = $request->input('size');

        $product->qty = $request->input('qty');
        if ($request->active) {
            $product->active = 1;
        } else {
            $product->active = 0;
        }
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'image|mimes:jpeg,png,jpg'
                ]);

                $destinationPath = "uploads/product/";
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = rand() . '.' . $extension;
                $request->file('image')->move($destinationPath, $fileName);
                $product->image = $fileName;
            }
        }

        $product->save();

        Session::flash('success_message', 'Great! Product has been updated successfully!');

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
        Session::flash('success_message', 'Product successfully deleted!');
        return redirect()->route('product.index');
    }

    public function deleteSelectedProduct(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'product' => 'required',

        ]);
        foreach ($input['product'] as $index => $id) {

            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'Product successfully deleted!');
        return redirect()->back();

    }
    public function productDetail(Request $request)
    {
        $p = Product::findOrFail($request->input('id'));
        return view('admin.products.single', ['title' => 'Product Detail', 'product' => $p]);
    }
}
