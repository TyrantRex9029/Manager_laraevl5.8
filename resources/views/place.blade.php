@extends('layoutuser')

@section('title_user', 'ระบบจัดการที่จังหวัด และ จัดการอำเภอ')

@section('content_user')
    <h2>ระบบจัดการที่จังหวัด และ จัดการอำเภอ</h2>
    <form method="POST" action="#">
        @csrf
        <div class="input-group py-2">
            <span class="input-group-text">จังหวัด</span>
            <input type="text" name="city" class="form-control">
            <span class="input-group-text">อำเภอ</span>
            <input type="text" name="dis" class="form-control">
            <input type="submit" value="เพิ่มจังหวัดและอำเภอ" class="btn btn-primary">
        </div>
        @error('city')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
        @error('dis')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
    </form>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">จังหวัด</th>
                <th scope="col">อำเภอ</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($Insert_City as $item)
                <tr>
                    <td>{{$item->City}}</td>
                    <td>{{$item->Dis}}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
    {{-- {{$Insert_City->links()}} --}}
@endsection
