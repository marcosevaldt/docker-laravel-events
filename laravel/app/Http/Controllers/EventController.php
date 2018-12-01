<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try{
            
            $event = Event::findOrFail($id);
        
        } catch(\Exception $e) {
            Log::stack(['app'])->error('Erro ao carregar objeto ' . Event::class . ' de id ' . $id . ' . Mensagem: ' . $e->getMessage() . ' [' . $request->ip() . ']');
            return redirect()->route('home')->withWarning('Erro ao encontrar evento!');
        }

        return view('event.show', [
            'event' => $event,
        ]);
    }
}
