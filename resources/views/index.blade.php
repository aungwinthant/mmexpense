@extends('layouts.app')



@section('content')
@include('layouts.navbar')

<header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0">MMExpense</h1>
        <h2 class="masthead-subheading mb-0">Your Personal expense tracking website</h2>
        <a href="/transactions" class="btn btn-primary btn-xl rounded-pill mt-5">Start Tracking Now</a>
      </div>
    </div>
</header>
<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-lg-2">
        <div class="p-5">
        <img class="img-fluid rounded-circle" src="{{asset('images/01.jpg')}}" alt="">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <div class="p-5">
          <h2 class="display-4 info-header">Keep your daily expense</h2>
          <p>It's very simple. One click and you are good to go</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="p-5">
          <img class="img-fluid rounded-circle" src="{{asset('images/02.jpg')}}" alt="">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="p-5">
          <h2 class="display-4 info-header">Check Details!</h2>
          <p>Your transactions your control. Check every transactions and control your own financial record</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-lg-2">
        <div class="p-5">
        <img class="img-fluid rounded-circle" src="{{asset('images/03.jpg')}}" alt="">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <div class="p-5">
          <h2 class="display-4 info-header">Wherever you go!</h2>
          <p>Unless you are in a cave or in a remote area.</p>
        </div>
      </div>
    </div>
  </div>
</section>

@include('layouts.footer')
@endsection