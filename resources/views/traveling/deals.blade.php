@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Discover Our Weekly Offers</h4>
          <h2>Amazing Prices &amp; More</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="POST" role="search" action="{{route('traveling.search.deals')}}">
           @csrf
            <div class="row">
              <div class="col-lg-2">
                <h4>Sort Deals By:</h4>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="country_id" class="form-select" aria-label="Default select example" id="country_id" onChange="this.form.click()">
                          <option selected>Destinations</option>
                          <option value="1">egypt</option>
                          <option value="2">Caribbean</option>
                          
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="price" class="form-select" aria-label="Default select example" id="price" onChange="this.form.click()">
                          <option selected>Price Range</option>
                          <option value="100">$100</option>
                          <option value="250">$250</option>
                          <option value="500">$500</option>
                          <option value="1000">$1,000 - $2,500</option>
                        
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-2">                        
                  <fieldset>
                      <button type="submit" class="border-button">Search Results</button>
                  </fieldset>
              </div>
            </div>
          </form>
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
        @foreach ($cities as $citie)
        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                
                <div class="image">
                    <img src="{{asset('assets/images/'.$citie->image.'')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6 align-self-center">
                  <div class="content">
                    <span class="info">*Limited Offer Today</span>
                    <h4>{{$citie->name}}</h4>
                    <div class="row">
                      <div class="col-6">
                        <i class="fa fa-clock"></i>
                        <span class="list">{{$citie->num_days}} Days</span>
                      </div>
                      <div class="col-6">
                        <i class="fa fa-map"></i>
                        <span class="list">Daily Places</span>
                      </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet dire consectetur adipiscing elit.</p>
                    <div class="main-button">
                      <a href="{{route('traveling.Reservation',$citie->id)}}">Make a Reservation</a>
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