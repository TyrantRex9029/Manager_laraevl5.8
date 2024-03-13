<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DataRequest;
use App\Http\Requests\PlaceRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CreateUserController extends Controller
{
    public function index(){
        $DataModels = \App\User::paginate(10);
        return view('Admin.manager',compact('DataModels'));
    }

    public function search(Request $request){                                                   
        $search = $request->search;                                                                                                                                                      //
        $DataSearch =\App\User::where(function($query) use ($search){                                                               
            $query->where('firstname','like',"%$search%")->orWhere('lastname','like',"%$search%")    
            ->orWhere('tel','like',"%$search%")->orWhere('email','like',"%$search%")            
            ->orWhere('address','like',"%$search%");})->get();                                                                                                   //
           return view('Admin.search',compact('DataSearch','search'));                               
    } 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function create(){
        $provinces = \App\Models\Province::select('id','province_name')->distinct()->get();
        $amphures = \App\Models\Amphure::select('id','province_id','amphure_name','zipcode')->distinct()->get();
        return view('Admin.form_manager',compact('provinces','amphures'));
}

    public function getProvinces(){
        $provinces = \App\Models\Province::select('id')
            ->distinct()
            ->get();
        return $provinces;
    }
    public function getAmphures(Request $request)
    {
        $province = $request->get('province_id');
        $amphures = \App\Models\Amphure::select('id','amphure_name')
            ->where('province_id', 'like', "%$province%")
            ->distinct()
            ->get();
        return $amphures;
    }
    public function getZipcodes(Request $request){
        $province = $request->get('province_id');
        $amphure = $request->get('id');
        $zipcodes = \App\Models\Amphure::select('zipcode')
            ->where('province_id', $province)
            ->where('id', $amphure)
            ->get();
        return $zipcodes;
    }
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function store(Request $request){
        $saveData = new \App\User;
        $this->save($saveData, $request);
        return redirect('/');
    }

    public function Nonstore(Request $request){
        $NonsaveData = new \App\User;
        $this->save($NonsaveData, $request);
        return redirect('/login');
    }


    private function save($data, $value)
    {
        $data ->firstname       =$value->firstname;   
        $data ->lastname        =$value->lastname;
        $data ->tel             =$value->tel;  
        $data ->email           =$value->email;  
        $data ->address         =$value->address;
        $data ->amphure_id      =$value->amphure_id;   
        $data ->province_id     =$value->province_id;  
        $data ->zipcode         =$value->zipcode;  
        $data ->password        =Hash::make($value->password);
        $data ->save();
    }

}
