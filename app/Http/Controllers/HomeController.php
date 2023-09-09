<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Session;
use Monarobase\CountryList\CountryListFacade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.views.dashboard');
    }
    public function newHome()
    {
        return view('frontend.home');
    }
    public function pdfview(){
        $pdf_url = url('storage/' . $pdfFilePath);
        return view('frontend.partials.shophead', ['pdf_url' => $pdf_url]);

    }


    public function showHeader($request)
    {
        $navbar = Navbar::findOrFail($request->input('id'));
        return view('frontend.partials.shophead', compact('navbar'));
    }

    public function cmeProgram()
    {
        return view('frontend.partials.cme-program');
    }

    public function medicalEquipment()
    {
        return view('frontend.partials.medical-equipment');
    }

    public function product_Details($id)
    {
        $product = Product::find($id);
        return view('frontend.partials.product_detail', compact('product'));
    }
    public function cart()
    {
        return view('frontend.partials.cart');
    }

    public function addToCart($id)

    {

        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "qty" => 1,
                    "price" => $product->price,
                    "image" => 'uploads/product/'.$product->image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Product added to cart successfully!');

        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['qty']++;

            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "qty" => 1,
            "price" => $product->price,
            "image" => 'uploads/product/'.$product->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->qty)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["qty"] = $request->qty;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
    public function Checkout()
    {
        $states = $this->nigeriaStates();
        $countries = CountryListFacade::getList('en');
        $order['checkout'] = Order::latest()->get();
        $cart = session('cart');
        return view('frontend.partials.checkout', compact('cart','countries','states',$order));
    }
    public function storeCheckout(Request $request)
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



    private function nigeriaStates()
    {
        return [
            'DB' => 'Dubai',
            'AB' => 'Abu Dhabi',
            'SH' => 'Sharjah',
            'AJ' => 'Ajman',
            'UL' => 'Umm Al Quwain',
            'RK' => 'Ras Al Khaimah',
            'FJ' => 'Fujairah',

            // Add more states here
        ];
    }
    public function getCartIcon()
    {
        $cart = session('cart', []);
        $total = 0;

        foreach($cart as $product) {
            $total += $product['price'] * $product['qty'];
        }

        return view('frontend.partials.cart-icon', [
            'cartCount' => count($cart),
            'cartTotal' => $total,
        ]);
    }
}
