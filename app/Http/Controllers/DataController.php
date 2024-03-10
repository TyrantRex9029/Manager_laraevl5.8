<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\PlaceRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\DataModel;
use App\User;

class DataController extends Controller
{
    public function index(){
        $DataModels = User::paginate(10);
        return view('Admin.manager',compact('DataModels'));
    }
    public function search(Request $request){                                                   
        $search = $request->search;                                                                                                                                                      //
        $DataSearch =User::where(function($query) use ($search){                                                               
            $query->where('firstname','like',"%$search%")->orWhere('lastname','like',"%$search%")    
            ->orWhere('tel','like',"%$search%")->orWhere('email','like',"%$search%")            
            ->orWhere('address','like',"%$search%");})->get();                                                                                                   //
           return view('Admin.search',compact('DataSearch','search'));                               
    }                                                                                           

   public function create(){
        $DataPlace = DataModel::select('city','dis')->get();
        return view('Admin.form_manager',compact('DataPlace'));
    }
    public function store(DataRequest $request){
        $saveData = new User;
        $this->save($saveData, $request);
        return redirect('/');
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

    ///////////////////////Place////////////////////////////////
    public function place_create(){
        $DataModels_place = DataModel::paginate(10);
        return view('Admin.place',compact('DataModels_place'));
    }

    public function storePlace(PlaceRequest $request){
        $savePlace = new DataModel;
        $this->save_Place($savePlace, $request);
        return redirect('/place_create');
    }
    private function save_Place($data, $value)
    {
        $data ->city     =$value->city;  
        $data ->dis      =$value->dis;   
        $data ->save();
    }
    
    ///////////////////////dropdownPlace////////////////////////////
    
}
