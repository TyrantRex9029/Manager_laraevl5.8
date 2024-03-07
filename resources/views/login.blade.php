@extends('layout_login')

@section('title_login', 'แสดงข้อมูลในรูปแบบตาราง')

@section('content_login')
    <div class="container">
        <div class="card mt-5 w-50 mx-auto">
            <h1 class="mx-3">ระบบล็อกอิน</h1>
            <div class="card-body">
                <form action="{{ url('login') }}" method="post">
                    @csrf()
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">อีเมล์</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="passwordLabel" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="passwordLabel" name="password" value="">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">ล็อกอิน</button>
                    <a href="register" role="button"class="btn btn-warning">สร้างสมาชิก</a>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection
