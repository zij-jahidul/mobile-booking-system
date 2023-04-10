<?php

namespace App\Http\Controllers\Front;

use App\Order;
use App\Order_detail;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function customerHome(){

        return view('Front.customer.home');
    }

    public function customerOrder(){

        return view('Front.customer.order_list',[
            'orders' => Order::with(['order_detail'])->where('user_id',Auth::id())->orderBy('id', 'desc')->get(),
        ]);
    }

    public function customerInvoice($order_id){
        $order_details = Order_detail::where('order_id',$order_id)->get();
        $pdf = PDF::loadView('pdf.customer_invoice',compact('order_details'));
        return $pdf->download('invoice.pdf');
    }
}
