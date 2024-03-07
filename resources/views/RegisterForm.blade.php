@extends('layout_login')

@section('title_login', 'แสดงข้อมูลในรูปแบบตาราง')

@section('content_login')
    <h2 class="py-2">สร้างสมาชิก</h2>
    <form  action="{{url('NonsaveData')}}" method="post">
        @csrf
        <div class="input-group py-2">
            <span class="input-group-text">ชื่อ</span>
            <input type="text" name="name" class="form-control">
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
            <label class="input-group-text" for="dis">อำเภอ</label>
            <select name="dis" class="form-select" id="dis">
                <option selected>กรุณาเลือก</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label class="input-group-text" for="city">จังหวัด</label>
            <select name="city" class="form-select" id="city">
                <option selected>กรุณาเลือก</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="input-group py-2">
            <span class="input-group-text">รหัสไปรษณีย์</span>
            <input type="text" name="code" class="form-control">
            <span class="input-group-text">รหัสผ่าน</span>
            <input type="password" name="password" class="form-control">
        </div>
        @error('code')
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
