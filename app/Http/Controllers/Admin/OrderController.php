<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function __construct(Order $userObject)
    {
        $this->middleware('auth:web');
        $this->obj_user = $userObject;
    }


    public function index()
    {
        $orders = Order::with('orderItems')->get();
        return view('admin.orders.index', compact('orders'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create', ['title' => 'Create order']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users,email|max:255',
            'address' => 'required',
            'phone_no' => 'required',
            'company' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'status' => '',

        ]);

        $order = new Order;
        $order->id = strval(random_int(1000000000, 9999999999)); // Set the order_id explicitly
        $order->firstName = $validatedData['firstName'];
        $order->lastName = $validatedData['lastName'];
        $order->email = $validatedData['email'];
        $order->address = $validatedData['address'];
        $order->phone_no = $validatedData['phone_no'];
        $order->company = $validatedData['company'];
        $order->zip = $validatedData['zip'];
        $order->country = $validatedData['country'];
        if ($request->active) {
            $order->active = 1;
        } else {
            $order->active = 0;
        }
        $order->overall_total = 0;
        $order->save();

        $overall_total = 0;

        foreach (session('cart') as $id => $product) {
            $order_item = new OrderItem;
            $order_item->order_id = $order->id;
            $order_item->product_id = $id;
            $order_item->name = $product['name'];
            $order_item->qty = $product['qty'];
            $order_item->price = $product['price'];
            $order_item->total_price = $product['qty'] * $product['price'];
            $order_item->save();

            $overall_total += $order_item->total_price;
        }

        $order->overall_total = $overall_total;
        $order->save();

        Session()->flash('success_message', 'Great! Your Order has been submitted successfully. It will be Delivered Within 24hr!');
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
        $order = $this->obj_user->findOrFail($id);
        return view('admin.orders.edit', ['title' => 'Update Order Details', 'product' => $order]);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg'
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
        Session::flash('success_message', 'Order successfully deleted!');
        return redirect()->route('order.index');
    }

    public function deleteSelectedOrder(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'order' => 'required',

        ]);
        foreach ($input['order'] as $index => $id) {

            $user = $this->obj_user->findOrFail($id);
            $user->delete();

        }
        Session::flash('success_message', 'Order successfully deleted!');
        return redirect()->back();

    }
    public function orderDetail(Request $request)
    {
        $order = Order::findOrFail($request->input('id'));
        $order_items = $order->orderItems;
        return view('admin.orders.single', ['order' => $order, 'order_items' => $order_items]);
    }


}
