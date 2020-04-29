<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Billing;
use App\Shipping;
use App\Product_Settings;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all()->sortByDesc('created_at');
        if (auth()->user()->type == "customer") {
            $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $PageTitle = "All Orders";

        return view('admin.order.index', compact('orders', 'PageTitle'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['PageTitle'] = "Create Order";
        $data['users'] = User::all();
        $data['order_code'] = $this->generateOrdercodeNumber();
        return view('admin.order.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //--- Validation Section
          $rules = [

            'order_code' => 'required|unique:orders',
            'status' => 'required',
            'email' => 'required|max:40',

        ];
        $customs = [

            'order_code.unique' => 'This Order code has already been taken.',

        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();

        }
//--- Validation Section Ends
        //Logic
        $shipping_info = null;
        $billing_info = null;
        $billing_id = auth()->user()->billing->id;
        $shipping_id = auth()->user()->shipping->id;

        //check if the shipping is pulled from previous
        if (empty($request->getshippinginfo)) {

            $shipping = Shipping::findOrFail($shipping_id);
            $shipping->first_name = $request->ship_first_name;
            $shipping->last_name = $request->ship_last_name;
            $shipping->email = $request->ship_email;
            $shipping->phone_number = $request->ship_phone_number;
            $shipping->address = $request->ship_address;
            $shipping->state = $request->ship_state;
            $shipping->shipping_method = $request->shipping_method;
            if (!empty($save_shippinginfo)) {

                $shipping->update();
            } else {
                //save separately
                $shipping_info = serialize($shipping);
                $shipping_id = null;
            }
        }

        if (empty($request->getbillinginfo)) {

            $billing = Billing::findOrFail($billing_id);
            $billing->first_name = $request->bill_first_name;
            $billing->last_name = $request->bill_last_name;
            $billing->email = $request->bill_email;
            $billing->phone_number = $request->bill_phone_number;
            $billing->address = $request->bill_address;
            $billing->state = $request->bill_state;
            if (!empty($save_billinginfo)) {
                $billing->update();
            } else {
                $billing_info = serialize($billing);
                $billing_id = null;
            }
        }

        $order = Order::Create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'shipping_id' => $shipping_id,
            'billing_id' => $billing_id,
            'email' => $request->email,
            'order_code' => $request->order_code,
            'items' =>serialize(Cart::content()) ,
            'status' => $request->status,
            'quantity' => Cart::instance('default')->count(),
            'subtotal' => Cart::subtotal(),
            'total' => Cart::total(),
            'shipping_info' => $shipping_info,
            'billing_info' => $billing_info,
        ]);

        Cart::destroy();

        return redirect()->route('admin-order-index')
            ->with('success', ' Order Added Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['order'] = Order::find($id);
        $data['orderProduct'] =Order::orderProduct(  $data['order']->id ) ;

        $data['shipping'] = Order::orderShipping($id);

        $data['billing'] = Order::orderBilling($id);

        $data['PageTitle'] = "Edit  Order " . $data['order']->order_code;

        $order = Order::find($id);
        $orderProduct =Order::orderProduct($order->id ) ;

        return view('admin.order.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $data['order'] = Order::find($id);
        if (empty($data['order'])) {
            return redirect()->route('admin-order-index')
                ->with('success', ' Order not found.');
        }
        $data['PageTitle'] = "Edit  Order " . $data['order']->order_code;

        $data['shipping'] = Order::orderShipping($id);

        $data['billing'] = Order::orderBilling($id);
        //   dd( $data['billing']);

        return view('admin.order.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order               $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $order = Order::findOrFail($id);

        if (empty($order)) {
            return redirect()->route('admin-order-index')
                ->with('success', ' Order not found.');
        }

        //--- Validation Section
        $rules = [

            'order_code' => 'required|unique:orders,order_code,' . $id,
            'status' => 'required',
            'email' => 'required|max:40',

        ];
        $customs = [

            'order.unique' => 'Order code has already been taken.',

        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();

        }
//--- Validation Section Ends

        $shipping_info = null;
        $billing_info = null;
        $billing_id = auth()->user()->billing->id;
        $shipping_id = auth()->user()->shipping->id;

        // dd($request->all());
        //Logic

// shipping
        $shipping = Shipping::findOrFail($request->ship_id);
        $shipping->first_name = $request->ship_first_name;
        $shipping->last_name = $request->ship_last_name;
        $shipping->email = $request->ship_email;
        $shipping->phone_number = $request->ship_phone_number;
        $shipping->address = $request->ship_address;
        $shipping->state = $request->ship_state;
        $shipping->shipping_method = $request->shipping_method;

        if ($order->shipping_id == null) {

            $shipping_info = serialize($shipping);
            $shipping_id = null;
        } else {
            $shipping->update();
        }

//billing

        $billing = Billing::findOrFail($request->bill_id);
        $billing->first_name = $request->bill_first_name;
        $billing->last_name = $request->bill_last_name;
        $billing->email = $request->bill_email;
        $billing->phone_number = $request->bill_phone_number;
        $billing->address = $request->bill_address;
        $billing->state = $request->bill_state;

        if ($order->billing_id == null) {
            $billing_info = serialize($billing);
            $billing_id = null;
        } else {
            $billing->update();
        }

        $order->user_id = $request->user_id;
        $order->shipping_id = $shipping_id;
        $order->billing_id = $billing_id;
        $order->email = $request->email;
        // $order->items = serialize($request->items);
        $order->status = $request->status;
        $order->shipping_info = $shipping_info;
        $order->billing_info = $billing_info;
        $order->update();

        return redirect()->route('admin-order-index')
            ->with('success', ' Order Added Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Order::findOrFail($request->id);

        $order->delete();
         //--- Redirect Section

         $msg = 'Order deleted Successfully !';
         return response()->json(array(
             'success' => true,
             'data'   => $msg
         ));

    }

    //adding a cart
    public function add_cart()
    {
        $tax = Product_Settings::settings()->get('tax');
        Cart::setGlobalTax($tax);

        // dd(Cart::total());
        Cart::add([
            ['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00, 'weight' => 550],
            ['id' => '4832k', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'weight' => 550, 'options' => ['size' => 'large']],
        ]);

        return redirect()->route('admin-order-index')
            ->with('success', 'Product Added to Card Successfully.');
    }

    protected function generateOrdercodeNumber()
    {
        $number = mt_rand(1000000000, 9999999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->ordercodeNumberExists($number)) {
            return generateOrdercodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    protected function ordercodeNumberExists($number)
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Order::where('order_code', $number)->exists();
    }

//load the saved shipping data
    public function loadShipping($id)
    {

        $shipping = Shipping::where('user_id', $id)->first();
        return $shipping;
    }
//load the saved Billing data
    public function loadBilling($id)
    {

        $shipping = Billing::where('user_id', $id)->first();
        return $shipping;
    }

    //new order
    function new () {
        $orders = Order::where('status', 'new')->orderBy('created_at', 'desc')->get();
        if (auth()->user()->type == "customer") {
            $orders = Order::where('status', 'new')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $PageTitle = "All New";

        return view('admin.order.index', compact('orders', 'PageTitle'));

    }

    //shipped order
    public function shipped()
    {
        $orders = Order::where('status', 'shipped')->orderBy('created_at', 'desc')->get();
        if (auth()->user()->type == "customer") {
            $orders = Order::where('status', 'shipped')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $PageTitle = "All Shipped";

        return view('admin.order.index', compact('orders', 'PageTitle'));

    }

    //shipped order
    public function returned()
    {
        $orders = Order::where('status', 'returned')->orderBy('created_at', 'desc')->get();
        if (auth()->user()->type == "customer") {
            $orders = Order::where('status', 'returned')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $PageTitle = "All Returned";

        return view('admin.order.index', compact('orders', 'PageTitle'));

    }
    //shipped order
    public function cancelled()
    {
        $orders = Order::where('status', 'cancelled')->orderBy('created_at', 'desc')->get();
        if (auth()->user()->type == "customer") {
            $orders = Order::where('status', 'cancelled')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $PageTitle = "All Cancelled";

        return view('admin.order.index', compact('orders', 'PageTitle'));

    }
    //shipped order
    public function delivered()
    {
        $orders = Order::where('status', 'delivered')->orderBy('created_at', 'desc')->get();
        if (auth()->user()->type == "customer") {
            $orders = Order::where('status', 'delivered')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $PageTitle = "All Delivered";

        return view('admin.order.index', compact('orders', 'PageTitle'));

    }

    //load the save data
    public function tracking($order_code)
    {
        $track = Order::where('order_code', $order_code)->first();



            $track->user_id = User::username($track->user_id);
        $track->show = route('admin-order-show', ['id' => $track->id]);
        $track->print = route('admin-order-invoice', ['id' => $track->id]);
        
        return $track;
    }

    public function track()
    {
        $data['PageTitle']='Tracking Order';
        return view('admin.order.track',$data);
    }



    public function invoice($id)
    {
        if(!Order::where('id',$id)->exists())
        {
            Alert::warning('Order Invoice', 'Sorry the page does not exist.');
            return redirect()->route('admin-order-index');
        }

        $data['order'] = Order::find($id);
        $data['orderProduct'] =Order::orderProduct(  $data['order']->id ) ;

        $data['shipping'] = Order::orderShipping($id);

        $data['billing'] = Order::orderBilling($id);

        $data['PageTitle'] = "Invoice  Order " . $data['order']->order_code;



        return view('admin.order.invoice',$data);

    }

}
