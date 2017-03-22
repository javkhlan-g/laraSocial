<?php
/**
 * Created by PhpStorm.
 * User: Javkhlan.G
 * Date: 3/22/2017
 * Time: 11:12 AM
 */
namespace Social\Http\Controllers;

use Illuminate\Http\Request;
use Social\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Social\User;


class UserController extends Controller
{

    public function getDashboard()
    {
        return view('dashboard');

    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:4',
        ]);

        $user = new User();
        $user->email = $request['email'];
        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
}

?>