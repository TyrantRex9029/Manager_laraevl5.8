@extends('layout.layout_login')

@section('title_login', 'แสดงข้อมูลในรูปแบบตาราง')

@section('content_login')
    <h2 class="py-2">สร้างสมาชิก</h2>
    <form action="{{ url('NonsaveData') }}" method="post">
        @csrf
        <div class="input-group py-2">
            <span class="input-group-text">ชื่อ</span>
            <input type="text" name="firstname" class="form-control">
            <span class="input-group-text">นามสกุล</span>
            <input type="text" name="lastname" class="form-control">
        </div>
        @error('name')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        @error('lastname')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        <div class="input-group py-2">
            <span class="input-group-text">เบอร์โทร</span>
            <input type="text" name="tel" class="form-control">
            <span class="input-group-text">อีเมล</span>
            <input type="text" name="email" class="form-control">
        </div>
        @error('tel')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        @error('email')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        <div class="input-group py-2">
            <span class="input-group-text">ที่อยู่</span>
            <input type="text" name="address" class="form-control">
        </div>
        @error('address')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        <div class="input-group py-2">
            <label class="input-group-text" for="province_id">จังหวัด</label>
            <select name="province_id" id="province_id"class="form-select">
                @foreach ($GetProvince as $item)
                    <option value = "{{ $item->id }}">{{ $item->province_name  }}</option>
                @endforeach
            </select>
            <label class="input-group-text" for="amphure_id">อำเภอ</label>
            <select name="amphure_id" id="amphure_id"class="form-select">
                @foreach ($GetAmphure as $item)
                    <option value = "{{ $item->province_id }}">{{ $item->amphure_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group py-2">
            <span class="input-group-text">รหัสไปรษณีย์</span>
            <input type="text" name="zipcode" class="form-control">
            <span class="input-group-text">รหัสผ่าน</span>
            <input type="password" name="password" class="form-control">
        </div>
        @error('zipcode')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        @error('password')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        <div>
            <input type="submit" value="บันทึก" class="btn btn-primary">
            <a href="login" role="button"class="btn btn-warning">ย้อนกลับ</a>
        </div>


    </form>
@endsection
