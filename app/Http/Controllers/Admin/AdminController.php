<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\Admin;
use App\Booking;
use App\BookingComplete;
use App\User;
use Image;

class AdminController extends Controller
{

    public function showBooking(){
        $completeBookings = BookingComplete::all();

        return view('admin.completebooking' , [
            'complete' => $completeBookings
        ]);
    }

    public function dashboard()
    {
     
       
        $user_count = User::count();

        $bookings = Booking::all();
       
        return view('admin.admin_dashboard',[

            // 'orders' => $orders,
            'bookings' => $bookings,
            'user_count' => $user_count,

            

            // 'new_order_count' => $new_order_count,
            // 'payment_Paid' => $payment_Paid,
            // 'payment_Unpaid' => $payment_Unpaid,
            // 'payment_pending' => $payment_pending,
            // 'payment_accept' => $payment_accept,
            // 'payment_cancel' => $payment_cancel,

        ]);
    }

    public function bookingcomplete($id){
        $booking_details = Booking::find($id);

        BookingComplete::insert([
            'user_id' => $booking_details->user_id,
            'name' => $booking_details->name,
            'phone' => $booking_details->phone,
            'problems' => $booking_details->problems,
            'image' => $booking_details->image,
        ]);
        $booking_details->delete();
        return back()->with('success_message', 'Booking Complete Successfully!');
    }

    public function bookingdelete($id){
        BookingComplete::find($id)->delete();
        return back()->with('delete_message', 'Complete Booking Delete Successfully!');
    }

    public function settings()
    {
        // echo '<pre>';
        // print_r();
        // die();
        return view('admin.admin_settings', [
            'user' => Auth::guard('admin')->user()
        ]);
    }

    public function login()
    {
        return view('admin.admin_login');
    }

    public function loginpost(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // // echo '<pre>';
            // print_r($data);
            // die();

            // validation
            $validatedData = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('admin/dashboard');
            } else {
                Session::flash('error_message', 'invalid email or password');
                return back();
            }
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/admin');
    }

    public function chkCurrentPwd(Request $request)
    {
        $data = $request->all();
        // echo '<pre>';
        // // print_r($data);
        // print_r(Auth::guard('admin')->user()->password);
        // die();
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function updateCurrentPwd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // print_r($data);
            // check current password is correct
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                // check if new password and current password is match
                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update([
                        'password' => bcrypt($data['new_pwd'])
                    ]);
                    Session::flash('success_message', 'password updated successfully!');
                    return back();
                } else {
                    Session::flash('error_message', 'New password and confirm password dose not match');
                    return back();
                }
            } else {
                Session::flash('error_message', 'your current password is incorrect');
                return back();
            }
        }
    }

    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo '<pre>';
            // print_r($data);

            // image upload
            if ($request->hasFile('admin_image')) {
                if (Auth::guard('admin')->user()->image != 'default.png') {
                    $old_photo_location = 'public/images/admin_images/admin_profile_image/' . Auth::guard('admin')->user()->image;
                    unlink(base_path($old_photo_location));
                }
                // echo Auth::guard('admin')->id();
                // echo '<pre>';
                $uploaded_photo = $request->file('admin_image');
                $new_photo_name = Auth::guard('admin')->id() . '.' . $uploaded_photo->getClientOriginalExtension();
                $new_photo_location = 'public/images/admin_images/admin_profile_image/' . $new_photo_name;
                Image::make($uploaded_photo)->save(base_path($new_photo_location));
                Admin::where('email', Auth::guard('admin')->user()->email)->update([
                    'image' => $new_photo_name,
                ]);
                return back()->with('success_message', 'save change successfully!');
            }
            // die();
            // image upload end

            // validation start
            $validatedData = $request->validate([
                'admin_name' => 'required',
                'admin_mobile' => 'required',
            ]);
            // validation end

            Admin::where('email', Auth::guard('admin')->user()->email)->update([
                'name' => $data['admin_name'],
                'mobile' => $data['admin_mobile'],
            ]);
            return back()->with('success_message', 'save change successfully!');
        }
        return view('admin.update_admin_details', [
            'user' => Auth::guard('admin')->user()
        ]);
    }
}
