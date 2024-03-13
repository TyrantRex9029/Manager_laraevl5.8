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
            <label class="input-group-text">จังหวัด</label>
            <select id="input_province" name="province_id" class="form-select">
                <option value = "">กรุณาเลือกจังหวัด</option>
                @foreach ($provinces as $item)
                    <option value="{{ $item->id }}">{{ $item->province_name }}</option>
                @endforeach
            </select>


            <label class="input-group-text">อำเภอ</label>
            <select id="input_amphure" name="amphure_id" class="form-select">
                <option value = "">กรุณาเลือกเขต/อำเภอ</option>
                @foreach ($amphures as $item)
                    <option value="{{ $item->id }}"></option>
                @endforeach
            </select>
        </div>
        <div class="input-group py-2">
            <span class="input-group-text">รหัสไปรษณีย์</span>
            <input id="input_zipcode" name="zipcode" class="form-control" placeholder="รหัสไปรษณีย์" />
            <span class="input-group-text">รหัสผ่าน</span>
            <input type="text" name="password" class="form-control">
        </div>
        @error('zipcode')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        @error('password')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        <div>
            <input type="submit" value="บันทึก" class="btn btn-primary">
        </div>
    </form>

    <script>
        function showAmphures() {
    let input_province = document.querySelector("#input_province");
    let url = "{{ url('/amphures') }}?province_id=" + input_province.value;
    console.log(url);
    //  if(input_province.value == "") return;
    fetch(url)
        .then(response => response.json())
        .then(result => {
            console.log(result);
            //UPDATE SELECT OPTION
            let input_amphure = document.querySelector("#input_amphure");
            input_amphure.innerHTML = '<option value="">กรุณาเลือกเขต/อำเภอ</option>';
            for (let item of result) {
                let option = document.createElement("option");
                option.text = item.amphure_name;
                option.value = item.id;
                input_amphure.appendChild(option);
            }
            //QUERY AMPHOES
            showZipcode();
        });
}

function showZipcode() {
    let input_province = document.querySelector("#input_province");
    let input_amphure = document.querySelector("#input_amphure");
    let url = "{{ url('/zipcodes') }}?province_id=" + input_province.value + "&id=" + input_amphure.value;
    console.log(url);
    fetch(url)
        .then(response => response.json())
        .then(result => {
            console.log(result);
            //UPDATE SELECT OPTION
            let input_zipcode = document.querySelector("#input_zipcode");
        
            for (let item of result) {
                input_zipcode.value = item.zipcode;
                break;
            }
        });
}
//EVENTS
document.querySelector('#input_province').addEventListener('change', (event) => {
    showAmphures();
});
document.querySelector('#input_amphure').addEventListener('change', (event) => {
    showZipcode();
});
    </script>

@endsection
