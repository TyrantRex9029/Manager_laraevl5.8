<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $resull = \App\Models\Province::paginate(10);
        return view('Admin.province', compact('resull'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_all = new \App\Models\Province;
        $this->input_all($input_all, $request);
        return redirect('/Province');
    }
  
    private function input_all($data, $value)
    {
        $data ->province_name    =$value->province_name;  
        $data ->save();
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $result = \App\Models\Province::find($id);

    //     return json_encode($result);
    // }

}
