<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use Illuminate\Support\Facades\Hash;
use App\DataModel;
use App\User;
class DataController extends Controller
{
    public function index(){
        $DataModels = User::paginate(10);
        return view('manager',compact('DataModels'));
    }

    public function create(){
        return view('form');
    }
    public function place(){
        return view('place');
    }

    public function store(DataRequest $request){
        $saveData = new User;
        $this->save($saveData, $request);
        return redirect('/index');
    }



    public function Nonstore(DataRequest $request){
        $NonsaveData = new User;
        $this->save($NonsaveData, $request);
        return redirect('/login');
    }
    private function save($data, $value)
    {
        $data ->name     =$value->name;   
        $data ->lastname =$value->lastname;
        $data ->tel      =$value->tel;  
        $data ->email    =$value->email;  
        $data ->address  =$value->address;
        $data ->city     =$value->city;  
        $data ->dis      =$value->dis;   
        $data ->code     =$value->code;  
        $data ->password =Hash::make($value->password);
        $data ->save();
    }
}
