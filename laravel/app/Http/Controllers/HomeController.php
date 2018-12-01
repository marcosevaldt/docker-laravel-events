<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            
            $events = Event::active()->get();
        
        } catch(\Exception $e) {
        
            Log::stack(['app'])->error('Erro ao carregar objeto ' . Event::class . ', Mensagem: '. $e->getMessage() . ' [' . $request->ip() . ']');
            return back()->withWarning('Erro ao carregar eventos!');
        }

        return view('home', [
            'events' => $events,
        ]);
    }
}
