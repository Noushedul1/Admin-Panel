<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontenduser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FrontenduserRequest;

class FrontenduserController extends Controller
{
    public function registerShow() {
        return view('frontend.auth.register');
    }
    public function store(FrontenduserRequest $request) {
        $request->validated();
        if($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageFileToStore = time().".".$extension;
            $request->file('image')->storeAs('public/frontenduser_images',$imageFileToStore);
        } else {
            $imageFileToStore = 'nofrontenduserimage.jpg';
        }
        $frontenduser = new Frontenduser();
        $frontenduser->name = $request->name;
        $frontenduser->email = $request->email;
        $frontenduser->password = Hash::make($request->password);
        $frontenduser->image = $imageFileToStore;
        $frontenduser->save();
        return redirect('/');
    }
    public function loginShow() {
        return view('frontend.auth.login');
    }
    public function loginCheck(Request $request) {
        $email = Frontenduser::where('email',$request->email)->first();
        if(!$email && !Hash::check($request->password, $email->password)) {
            return 'not akib';
        }else {
            return 'akib';
        }
    }
}
