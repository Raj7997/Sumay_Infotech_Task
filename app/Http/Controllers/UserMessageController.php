<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserMessage;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class UserMessageController extends Controller
{
    public function index(){
        return view('usermessage');
    }

    public function store(Request $request){
        $rules = [
            'message' => 'required|min:2|max:25'
        ];

        $messages = [
            'message.required' => 'Please Enter Short Message',
            'message.min' => 'Short Message Required Minimum 2 Characters',
            'message.max' => 'Short Message Required Maximun 25 Characters'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                $userMessageAdd = UserMessage::create([
                    'message' => $request->message,
                    'user_id' => Auth::user()->id
                ]);
                if($userMessageAdd){
                    Session::flash('success', 'User Message Added Successfully');
                    return redirect()->route('home');
                } else {
                    Session::flash('error', 'User Message Not Added');
                }
            } catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }
}
