<?php

namespace App\Http\Controllers;

use App\Member;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function register(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
         
        ]);
        $member = new Member();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->save();
        Toastr::success('Membership request sent successfully. we will confirm to you shortly','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
