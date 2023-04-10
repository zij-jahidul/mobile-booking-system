<?php

namespace App\Http\Controllers\Front;

use Auth;
use Image;
use App\Booking;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{

    public function myBooking(){
        $bookings = Booking::where('user_id' , Auth::id())->get();
        
        return view('front.booking.booking',[
            'bookings' => $bookings,
        ]);
    }

    public function bookingpost(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'problems' => 'required',
        ]);
    
        $booking_id = Booking::insertGetId($request->except('_token' , 'image') + [
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        if($request->hasFile('image')){
            $uploded_photo = $request->file('image');
            $new_photo_name = $booking_id.'-'.Str::random(3).".".$uploded_photo->extension();
            $new_photo_location = 'public/uploads/booking_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(280,250)->save(base_path($new_photo_location) , 80);
            Booking::find($booking_id)->update([
                'image' => $new_photo_name
            ]);
        }
        return back()->with('success_status','Your Booking SuccessFully!!');
    }




    // public function edit(Banner $banner)
    // {
    //     return view('admin.banner.edit',[
    //         'banner_info' => $banner
    //     ]);
    // }

    // $banner->update($request->except('_token' , '_method' , 'image'));
    //     if($request->hasFile('image')){
    //       if($banner->image != null){
    //         // delete photo
    //         $old_location = 'public/uploads/banner_photos/'.$banner->image;
    //         unlink(base_path($old_location));

    //         $uploded_photo = $request->file('image');
    //         $new_photo_name = $banner->id.'-'.Str::random(3).".".$uploded_photo->extension();
    //         $new_photo_location = 'public/uploads/banner_photos/'.$new_photo_name;
    //         Image::make($uploded_photo)->resize(1920,1000)->save(base_path($new_photo_location) , 80);
    //         Banner::find($banner->id)->update([
    //           'image' => $new_photo_name
    //         ]);
    //       }
    // }
    // return redirect('/banner/viewall')->with('udpate_status' , 'Banner Update Successfully!!');

    // public function destroy(Banner $banner)
    // {
    //     $banner->delete();
    //     return back()->with('delete_status','Banner Delete SuccessFully!!');
    // }









}
