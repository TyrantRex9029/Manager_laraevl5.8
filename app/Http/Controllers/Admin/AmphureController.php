<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmphureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = \App\Models\Amphure::paginate(10);
        $getProvince = \App\Models\Province::select('id','province_name')->get();
        return view('Admin.amphure', compact('result','getProvince'));
    }
    public function store(Request $request)
    {
        $input_all = new \App\Models\Amphure;
        $this->input_all($input_all, $request);
        return redirect('/Amphure');
    }
    private function input_all($data, $value)
    {
        $data ->province_id   =$value->province_id;  
        $data ->amphure_name  =$value->amphure_name;  
        $data ->zipcode       =$value->zipcode;  
        $data ->save();
    }
  
}
