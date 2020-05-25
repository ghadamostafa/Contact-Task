@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">
@endsection

@section('content')

            @if (session('success'))
                <div class="alert alert-success message">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger message">
                    {{ session('error') }}
                </div>
            @endif  
            <div id="AddContact">
                <h2 id="contactHeader">Add Contact Information</h2>
                <div class="container" id="contactForm">
                <form method="POST" action="/admin/addContact">
                    @csrf
                    <div class="input-group {{ $errors->has('phone') ? 'has-error' : '' }}" style="margin-top:10px;" >
                        <span class="input-group-addon"> <i class="fa fa-phone fa-2x fa-fw" aria-hidden="true" ></i></span>
                        <input type="text" name="phone" placeholder="Phone"  class="form-control "  >
                    
                    </div>
                    @foreach ($errors->get('phone') as $message)
                    <span class="text-danger" style="margin-left:50px;">{{ $message }}</span>
                    @endforeach

                    <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}" style="margin-top:10px;">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-2x fa-fw"></i></span>
                        <input class="form-control " type="text" name="email" placeholder="Email address">
                    </div>

                    @foreach ($errors->get('email') as $message)  
                    <span class="text-danger" style="margin-left:50px;">{{ $message }}</span>
                    @endforeach

                    <div class="input-group {{ $errors->has('address') ? 'has-error' : '' }}" style="margin-top:10px;">
                        <span class="input-group-addon"><i class="fa fa-home fa-2x fa-fw" aria-hidden="true"></i></i></span>
                        <input class="form-control " type="text" name="street" placeholder="Street" style="margin-left:5px;">
                        <input class="form-control " type="text" name="city" placeholder="City" style="margin-left:5px;">
                        <input class="form-control " type="text" name="country" placeholder="Country" style="margin-left:5px;">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block rounded-pill" style="margin-top:10px;">Add</button>
                </form>
                </div>
            </div>
 
@endsection