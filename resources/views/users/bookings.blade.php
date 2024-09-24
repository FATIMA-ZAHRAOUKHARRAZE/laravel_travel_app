@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>My Bookings </h4>
          <h2>Amazing Prices &amp; More</h2>
        </div>
      </div>
    </div>
  </div>
<div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
        @foreach ($bookings as $booking)
        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                
                <div class="image">
                    <img src="{{asset('assets/images/'.$booking->image.'')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6 align-self-center">
                  <div class="content">
                    <h4>{{$booking->name}}</h4>
                    <div class="row">
                      <div class="col-6">
                        <i class="fa fa-clock"></i>
                        <span class="list">{{$booking->destination}} Days</span>
                      </div>
                    </div>
                    <div class="main-button">
                      <a href="{{route('traveling.Reservation',$booking->id)}}">Make a Reservation</a>
                    </div>
                  </div>
                
                
              </div>
            </div>
          
          </div>
        </div>
         @endforeach
       
      </div>
    </div>
  </div>
@endsection
