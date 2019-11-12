<?php

namespace App\Http\Controllers;
use App\Http\Requests\SellerRequest;
use Illuminate\Http\Request;
use App\User;

class RequestController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $requests = \App\Request::all();
        
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        $user = auth()->user();

        // validate if user is not a seller and currently has no request
        if(!$user->canRequest())
            return redirect('/requests');

        $categories = \App\SellerCategory::all();

        return view('requests.create', compact('user', 'categories'));
    }

    public function store(SellerRequest $request)
    {
        // validate request
        $validated = $request->validated();

        // check if this user already has rejected request, if yes update, if no create new
        $user = auth()->user();

        $rq = $user->request;
        if($rq == null)
            $rq = new \App\Request();

        $rq->address = $validated['address'];
        $rq->phone = $validated['phone'];
        $rq->seller_category_id = $validated['seller_category_id'];
        $rq->user_id = $user->id;
        $rq->status = false;
        
        $rq->save();
        
        return redirect('/requests');
    }
    
    public function approve($id) {
        $rq = \App\Request::where('id', $id)->firstOrFail();
        
        $rq->approve();
        
        return redirect('/requests');
    }
    
    public function reject($id) {
        $rq = \App\Request::where('id', $id)->firstOrFail();
        
        $rq->reject();
        
        return redirect('/requests');
    }
}
