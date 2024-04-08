<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users_tables;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function form(Request $request)
    {
        if($request->has('firstname') && $request->has('lastname')) {
            $request->validate([
                'firstname' => ['required', 'max:255'],
                'lastname' => ['required', 'max:255'],
                'description' => ['nullable', 'max:255']
            ]);

            $user = new Users_tables();
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->description = $request->input('description');
            $user->save();

            return redirect()->back()->with('success', 'Данные успешно сохранены');
        }

        return view('form', ['firstname'   => trans('form.firstname'), 
                             'lastname'    => trans('form.lastname'), 
                             'description' => trans('form.description')
        ]);

    }

}
