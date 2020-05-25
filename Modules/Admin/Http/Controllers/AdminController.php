<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Contacts;
use App\ContactEmails;
use App\ContactPhones;
use App\ContactAddresses;
use Modules\Admin\Http\Requests\ContactInfoRequest;
use Modules\ContactUs\Entities\ContactUs;
use Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getEmails()
    {
        $emailsInfo=ContactUs::all();
        
        return view('admin::emails.getEmails',compact('emailsInfo'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function addContact()
    {
        $oldContact = new Contacts();
        return view('admin::contactInfo.create',compact('oldContact'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), []);
        $validator->sometimes('email', 'unique:contact_emails|email', function($input) {
            return  $input->email != NULL;
        });
        $validator->sometimes('phone', 'unique:contact_phones||digits:11|numeric', function($input) {
            return  $input->phone != NULL;
        });
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        // insert data
        $contact=Contacts::create([]);
        if($request->email)
        {
            $email=ContactEmails::create(['email' => $request->email ,'contacts_id' => $contact->id ]);
            return back()->with('success', 'Add contacts successfully');
        }
        if($request->phone)
        {
            $phone=ContactPhones::create(['phone' => $request->phone ,'contacts_id' => $contact->id ]);
            return back()->with('success', 'Add contacts successfully');
        }
        if($request->street && $request->city && $request->country )
        {
            $phone=ContactAddresses::create(['street' => $request->street ,'city' => $request->city,'country' => $request->country,'contacts_id' => $contact->id ]);
            return back()->with('success', 'Add contacts successfully');
        }
        else
        {
            return back()->with('error', 'No data entered');
        }
        //
    }

}
