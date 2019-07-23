<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\User;

use App\Http\Requests\ListingRequest;

class ListingController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::with('users')->latest()->paginate(10);

        return view('listing.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListingRequest $request)
    {
        $request->user()->listings()->create($request->all());
        
        return redirect('/listing')->with('success', 'Listing Addded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);

        return view('listing.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);

        // if(\Gate::denies('update', $listing){
        //     abort(403, "Access Denied")
        // });

        if(Auth()->user()->id !== $listing->user_id){
            abort(403, "Access Denied");
        }

        return view('listing.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ListingRequest $request, $id)
    {
        $listing = Listing::find($id);

        $listing->Update($request->only('name', 'website', 'email', 'phone', 'address', 'bio'));
        
        return redirect('/listing')->with('success', 'Listing Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);

        // if(\Gate::denies('delete', $listing){
        //     abort(403, "Access Denied")
        // });

        if(Auth()->user()->id !== $listing->user_id){
            abort(403, "Access Denied");
        }

        $listing->Delete();

        return redirect('/listing')->with('success', 'Listing Deleted successfully');
    }
}
