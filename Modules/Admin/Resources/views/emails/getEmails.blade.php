@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/getEmail.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1> Recieved Emails</h1>
   
    <div id = "emails">
        @if($emailsInfo->first() )
            <table class="table ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="body">Body</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emailsInfo as $email)
                        <tr>
                        <td> {{$email->name}} </td>
                        <td> {{$email->email}} </td>
                        <td class="Message"> {{$email->message}} </td>
                        </tr>
                    @endforeach
                </tbody>   
            </table>
        @else
            <p>No Recieved Emails Yet! </p>
        @endif
    </div>
@endsection