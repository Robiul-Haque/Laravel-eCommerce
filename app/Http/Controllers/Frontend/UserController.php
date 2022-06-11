<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view('frontend.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:20',
            'address' => 'required|min:10|max:200',
            'password' => 'required|min:5|max:15',
            'photo' => 'required|image|max:3072',
        ], [
            'email.unique' => 'The email has already been taken, enter a new valid email.',
            'photo.max' => 'The photo must not be greater than 3 MB.',
        ]);
        $photo = $request->file('photo');
        $newName = 'user_' . time() . '.' . $photo->getClientOriginalExtension();
        $photo->move('asset/uplode/users/', $newName);
        $inputs = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
            'photo' => $newName,
        ];
        User::create($inputs);
        Session::flash('message', 'Regester successfully');
        return redirect()->route('regester');
    }

    public function profile()
    {
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('frontend.profile', compact('orders'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'phone' => 'required|max:20',
            'address' => 'required|min:10|max:200',
            'photo' => 'image|max:3072',
        ], [
            'photo.max' => 'The photo must not be greater than 3 MB.',
        ]);
        $user = auth()->user();
        $inputs = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];
        $photo = $request->file('photo');
        if ($photo) {
            if (file_exists('asset/uplode/users/' . $user->photo)) {
                unlink('asset/uplode/users/' . $user->photo);
            }
            $newName = 'user_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('asset/uplode/users/', $newName);
            $inputs['photo'] = $newName;
        }
        $user->update($inputs);
        Session::flash('message', 'Profile update successfully');
        return redirect()->route('profile');
    }

    // public function invoice($id)
    // {
    //     $data['item'] = Order::where('id','=',$id)->first();
    //     $pdf = PDF::loadView('order_invoice', $data);
    //     return $pdf->stream();
    // }
}
