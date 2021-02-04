<?php


namespace App\services;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserListResponse implements Responsejson
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function toArray()
    {
        return [
            'id'=> $this->model->id,
            'name'=> $this->model->name,
            'created_from'=> $this->model->created_at ? $this->model->created_at->diffForHumans() : ""

        ];
    }
    public static function collection(collection $collection)
    {
        $data=[];
        foreach ($collection as $item){
            $user =  new UserListResponse($item);
            $data[]= $user->toArray();
        }
        return $data;
    }


}
