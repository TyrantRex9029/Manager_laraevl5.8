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

    public function create(){
        $GetProvince = \App\Models\Province::select('id','province_name')->get();
        $GetAmphure = \App\Models\Amphure::select('province_id','amphure_name')->get();
        return view('Admin.form_manager',compact('GetProvince','GetAmphure'));
    }
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
        $data ->password =Hash::make($value->password);
        $data ->save();
    }

  


    /////////////////////////////////////////////////////

    // public function queryForExport($request){
        

    //     $result = \App\User::select(
    //         'provinces.province_name',
    //         'amphures.amphure_name'
    //     )
    //     ->leftJoin('provinces', 'admin_users.province_id', '=', 'provinces.id')
    //     ->leftJoin('amphures', 'admin_users.amphur_id', '=', 'amphures.id');
    //     return $result;
    // }
    // public function GetAmphur($province_id)
    // {
    //     $result = \App\Models\Amphure::where('province_id', $province_id)->orderBy('amphure_name')->get();
    //     return $result;
    // }

    // public function GetZipcode($amphur_id)
    // {
    //     $amphur = \App\Models\Amphure::find($amphur_id);
    //     $result = $amphur->zipcode;
    //     return $result;
    // }

}
