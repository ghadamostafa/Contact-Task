@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Get in touch with us</h1>
    
<div class="container">
  <div class="row">
        <div class="col-8">
            @if (session('success'))
                <div class="alert alert-success" style="margin-bottom:5px;width:600px;margin-left:70px;">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif  
            <div id="wrapper">
                <h2 id="contactHeader">Contact Us Now</h2>
                <div class="container" id="contactForm">
                <form method="POST" action="/contactus">
                    @csrf
                    <div class="input-group {{ $errors->has('name') ? 'has-error' : '' }}" style="margin-top:10px;" >
                        <span class="input-group-addon"> <i class="fa fa-user fa-2x fa-fw" aria-hidden="true" ></i></span>
                        <input type="text" name="name" placeholder="Name" value="{{ old('name') ?? $contactInfo->name}}" class="form-control rounded-pill" >
                    
                    </div>
                    @foreach ($errors->get('name') as $message)
                    <span class="text-danger" style="margin-left:50px;">{{ $message }}</span>
                    @endforeach

                    <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}" style="margin-top:10px;">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-2x fa-fw"></i></span>
                        <input class="form-control rounded-pill" type="text" name="email" value="{{ old('email') ?? $contactInfo->email}}" placeholder="Email address">
                    </div>

                    @foreach ($errors->get('email') as $message)  
                    <span class="text-danger" style="margin-left:50px;">{{ $message }}</span>
                    @endforeach

                    <div class="input-group {{ $errors->has('message') ? 'has-error' : '' }}" style="margin-top:10px;">
                        <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-2x fa-fw" aria-hidden="true"></i></i></span>
                        <textarea class="form-control "  rows="8" placeholder="Write your message" value="{{ old('message') ?? $contactInfo->message}}" name="message" style="border-radius:2%;"></textarea>
                    </div>

                    @foreach ($errors->get('message') as $message)
                    <span class="text-danger" style="margin-left:50px;">{{ $message }}</span>
                    @endforeach

                    <button type="submit" <?php if( (Auth::check()) && (Auth::user()->isAdmin) ) {?> disabled <?php }  ?> class="btn btn-primary btn-block rounded-pill" style="margin-top:10px;">Send</button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-4" >
            <h2 id="contactWaysHeader">Other ways to contact</h2>
            <div id="contactWays">
                <ul>
                    <li> 
                        <div class="row">
                            <div class="col-1"> <i class="fa fa-envelope fa-sm fa-fw"> </i> </div>
                            <div class="col">
                                @foreach($email_contacts as $email)
                                    <div> <p> {{ $email['email'] }} </p></div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li> 
                        <div class="row">
                            <div class="col-1"> <i class="fa fa-phone fa-sm fa-fw"> </i> </div>
                            <div class="col">
                                @foreach($phone_contacts as $phone)
                                <div> <p> {{$phone['phone'] }} </p> </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li> 
                        <div class="row">
                            <div class="col-1"> <i class="fa fa-home fa-sm fa-fw"> </i> </div>
                            <div class="col">
                                @foreach($address_contacts as $address)
                                    <div> <p> {{ $address ['street'] }},{{ $address ['city'] }},{{ $address['country'] }} </p> </div> 
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="socialIcons">
               <a href="#" ><span class="social"><i class="fa fa-facebook-official fa-3x " aria-hidden="true"></i></span></a>
               <a href="#" > <span class="social"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></span></a>
               <a href="#" > <span class="social"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></span></a>
            </div>
            @if(Auth::check())
                @if(Auth::user()->isAdmin)
                <div style="margin:30px 100px;">
                    <a class="btn add" style="background-color:#3b45a9;margin-right:10px;color:white;" href="{{ url('/admin/addContact') }}">Add contact </a>
                </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection