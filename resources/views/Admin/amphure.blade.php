@extends('layout.layoutuser')

@section('title_user', 'ระบบจัดการที่จังหวัด และ จัดการอำเภอ')

@section('content_user')
    <h2>จัดการอำเภอ</h2>
    <form method="POST" action="/Amphure">
        @csrf

        <div class="input-group py-3">
            <label class="input-group-text " for="province_id">จังหวัด</label>
            <select name="province_id" id="province_id"class="form-select">
                @foreach ($getProvince as $item)
                    <option value = "{{ $item->id }}">{{ $item->province_name }}</option>
                @endforeach
            </select>
            <span class="input-group-text">อำเภอ</span>
            <input type="text" name="amphure_name" class="form-control">
            <span class="input-group-text">รหัสไปรณีย์</span>
            <input type="text" name="zipcode" class="form-control">
            <button class="btn btn-success btn-add pull-right" >
                เพิ่มข้อมูล
            </button>
        </div>
        @error('province_id')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        @error('amphure_name')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        @error('zipcode')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
    </form>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">ไอดี จังหวัด</th>
                <th scope="col">อำเภอ</th>
                <th scope="col">รหัสไปรณีย์</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resull as $item)
                <tr>
                    <td>{{$item->province_id}}</td>
                    <td>{{$item->amphure_name}}</td>
                    <td>{{$item->zipcode}}</td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    {{$resull->links()}} 
@endsection