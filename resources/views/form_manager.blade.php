@extends('layoutuser')

@section('title_user', 'สร้างสมาชิก')

@section('content_user')
    <h2 class="py-2">สร้างสมาชิก</h2>
    <form  action="{{url('saveData')}}" method="post">
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
            <label class="input-group-text" for="city">จังหวัด</label>
            <select name="city" id="city"class="form-select">
                @foreach ($DataPlace as $item)
                    <option value = "{{ $item->city }}">{{ $item->city }}</option>
                @endforeach
            </select>
            <label class="input-group-text" for="dis">อำเภอ</label>
            <select name="dis" id="dis"class="form-select">
                @foreach ($DataPlace as $item)
                    <option value = "{{ $item->dis }}">{{ $item->dis }}</option>
                @endforeach
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
        <div><input type="submit" value="บันทึก" class="btn btn-primary"></div>
    </form>
@endsection
