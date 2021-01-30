<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserNewRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;


class UserController extends Controller
{
    public function index()
    {
        return User::all();

    }
   /* public function show($id)
    {
        return User::query()->findOrFail($id);

    }*/
    public function show(User $user)
    {
        return $user;

    }
    public function store(UserNewRequest $request){
      /*  $request->validate([
            'name'=> 'required'
        ]);*/
       /* Facades\Validator::validate($request->all(),[
            'name'=> 'required'

        ]);*/
       // $data = $request->all();
      //  return data_get($data,'phone','empty');
       // User::create($request->all());
      /*  $user = User::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'phone'=> $request->input('phone'),
            'password'=>Hash::make($request->input('password'))
        ]);*/
        //return $request->input('name','empty');
       $data= $request->all();
     //   $data['password']= Hash::make($request->input('password'));
        return User::create($data);
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }
    public function destroy(User $user){
        $user->delete();
        return 'ok';

    }
}
