<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $event = Event::find($request->id);
        } catch(\Exception $e) {
        
            Log::stack(['app'])->error('Erro ao carregar objeto ' . Event::class . ' de id ' . $request->id . ' . Mensagem: ' . $e->getMessage() . ' [' . $request->ip() . ']');
            return back()->withWarning('Erro ao encontrar evento!');
        }

        return view('checkout.index', [
            'event' => $event,
        ]);
    }
}
