<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserNewRequest;
use App\Http\Resources\UserListResource;
use App\Http\Resources\UserShowResource;
use App\Models\User;
use App\services\Responsejson;
use App\services\UserListResponse;
use App\services\UserShoeResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;


class UserController extends Controller
{
    public function index()
    {
        return UserListResource::collection(User::all());;

    }
   /* public function show($id)
    {
        return User::query()->findOrFail($id);

    }*/
    public function show(User $user)
    {
       // $user=new UserShoeResponse($user);
       // return $user->toArray();
       // return $this-> jsonResponse((new UserShoeResponse($user)));
  //  }
  //  private function jsonResponse(Responsejson $responsejson){
       // return $responsejson->toArray();
        return (new UserShowResource($user));
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
    public function update(Request $request, User $user){
        $user->update($request->all());
        return $user;
    }
    public function destroy(User $user){
        $user->delete();
        return 'ok';

    }

}
