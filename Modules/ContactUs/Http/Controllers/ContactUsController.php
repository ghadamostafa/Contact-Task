<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ContactUs\Http\Requests\ContactUsRequest;
use  Modules\ContactUs\Entities\ContactUs;
use App\Contacts;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('contactus::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $all_contacts=Contacts::all();
        $email_contacts=[];
        $phone_contacts=[];
        $address_contacts=[];
        // dd($all_contacts);
        foreach ($all_contacts as $contact) {
            // dd($contact);
            if($contact->emails->first())
            {
                $email_contacts=array_merge($email_contacts,$contact->emails->toArray());
            } 
            if($contact->phones->first())
            {
                $phone_contacts= array_merge($phone_contacts,$contact->phones->toArray()) ;
            }
            if($contact->addresses->first())
            {
                $address_contacts= array_merge($address_contacts,$contact->addresses->toArray()) ;
            }
        }
        // dd($email_contacts);
        $contactInfo = new ContactUs();
        return view('contactus::create',compact('contactInfo','email_contacts','phone_contacts','address_contacts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ContactUsRequest $request)
    {
        $validated = $request->validated();
        $details=['title' => 'Message from Contact us page','body' =>$request->message,'name' =>$request->name];
        \Mail::to($request->email)->send(new \App\Mail\ContactMail($details));
        if(count(\Mail::failures()) > 0){
            return back()->with('error', 'Failed to send message, please try again');
        }
        else
        {
            $contactInfo = ContactUs::create($request->all());
            if($contactInfo -> save())
            { 
                return back()->with('success', 'Message sent successfully');
            }
        }
            

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('contactus::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('contactus::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
