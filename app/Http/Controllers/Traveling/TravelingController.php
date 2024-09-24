<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Country\Country;
use App\Models\Reservation\Reservation;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TravelingController extends Controller
{
     public function about($id)
     {
        $cities=City::select()->orderBy('id','desc')->where('country_id',$id)->get();
        $country =Country::find($id);
        $citiescount=City::select()->where('country_id',$id)->count();
        return view('traveling.about',compact('cities','country','citiescount'));
     }
     public function Reservation($id)
     {
      $cities=City::find($id);
      return view('traveling.Reservation',compact('cities','id'));
     }
     public function StoreReservation(Request $request ,$id)
     {
      $city=City::find($id);
      $store=Reservation::create([
         "name"=>$request->name,
         "phone_number"=>$request->Number,
         "num_guests"=>$request->Guests,
         "check_in_date"=>$request->date,
         "destination"=>$request->chooseDestination,
         "price"=>$request->price ,
         "user_id"=>$request->user_id,
      ]);
      if($store)
      {
        return Redirect::route('traveling.Pay');
      }
      return view('traveling.Reservation',compact('cities'));
     }
     public function Paypaypal()
     {
      return view('traveling.Pay');
     }
     public function deals()
     {
      $cities=City::select()->orderBy('id','desc')->get();
      return view('traveling.deals',compact('cities'));
     }
     public function searchdeals(Request $request)
     {
      $country_id=$request->get('country_id');
      $price=$request->get('price');
      $searches=City::where('country_id',$country_id)->where('price','>=',$price)->orderBy('id','desc')->get();
      $countries=Country::all();
      return view('traveling.searchdeals',compact('searches','countries'));
     }
}