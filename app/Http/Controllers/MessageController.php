<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    public function create()
    {
        //
    }
    public function store(Request $request){
        $data = $request->validate([
            'content' => 'required'
        ]);

        $data['user_id'] = auth()->user()->id;

        Message::create($data);

        return back();
    }
}
