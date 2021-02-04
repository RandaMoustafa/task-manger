<?php


namespace App\services;


use Illuminate\Database\Eloquent\Model;

interface Responsejson
{
    public function __construct(Model $model);

    public function toArray();



}
