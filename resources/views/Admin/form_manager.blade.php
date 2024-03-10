@extends('layout.layoutuser')

@section('title_user', 'สร้างสมาชิก')

@section('content_user')
    <h2 class="py-2">สร้างสมาชิก</h2>
    <form action="{{ url('saveData') }}" method="post">
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
        </div>

    </form>
        
    {{-- <script>
        $('#add_province').select();
        $('#add_amphure').select();
        $('#add_current_address_province_id').select();
        $('#add_current_address_amphur_id').select();

        $('body').on('change', '#add_province', function() {
            var province_id = $(this).val();
            $('#add_zipcode').val('');
            $('#add_amphure').empty();
            $('#add_amphure').append('<option value="">เลือกอำเภอ</option>');
            $('#add_amphure').select2('val', '');
            $.ajax({
                method: "GET",
                url: url_gb + "User/GetAmphur/" + province_id,
                dataType: 'json'
            }).done(function(res) {
                $.each(res, function(k, v) {
                    $('#add_amphure').append('<option value="' + v.id + '">' + v.amphure_name +
                        '</option>');
                });
            }).fail(function(data) {
                //        btn.button("reset");
            });
        });

        $('body').on('change', '#add_amphure', function() {
            var amphur_id = $(this).val();
            $.ajax({
                method: "GET",
                url: url_gb + "User/GetZipcode/" + amphur_id,
                dataType: 'json'
            }).done(function(res) {
                $('#add_zipcode').val(res);
            }).fail(function(data) {
                //        btn.button("reset");
            });

        });

        $('body').on('change', '#add_current_address_province_id', function() {
            var province_id = $(this).val();
            $('#add_current_address_zipcode').val('');
            $('#add_current_address_amphur_id').empty();
            $('#add_current_address_amphur_id').append('<option value="">เลือกอำเภอ</option>');
            $('#add_current_address_amphur_id').select('val', '');
            $.ajax({
                method: "GET",
                url: url_gb + "/User/GetAmphur/" + province_id,
                dataType: 'json'
            }).done(function(res) {
                $.each(res, function(k, v) {
                    $('#add_current_address_amphur_id').append('<option value="' + v.id + '">' + v
                        .amphure_name + '</option>');
                });
            }).fail(function(data) {
                //        btn.button("reset");
            });
        });

        $('body').on('change', '#add_current_address_amphur_id', function() {
            var amphur_id = $(this).val();
            $.ajax({
                method: "GET",
                url: url_gb + "/User/GetZipcode/" + amphur_id,
                dataType: 'json'
            }).done(function(res) {
                $('#add_current_address_zipcode').val(res);
            }).fail(function(data) {
                //        btn.button("reset");
            });

        });
    </script> --}}

@endsection
