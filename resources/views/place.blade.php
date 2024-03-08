@extends('layoutuser')

@section('title_user', 'ระบบจัดการที่จังหวัด และ จัดการอำเภอ')

@section('content_user')
    <h2>ระบบจัดการที่จังหวัด และ จัดการอำเภอ</h2>
    <form method="POST" action="/savePlace">
        @csrf
        <div class="input-group py-3">
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
            @foreach ($DataModels_place as $item)
                <tr>
                    <td>{{$item->city}}</td>
                    <td>{{$item->dis}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$DataModels_place->links()}}
@endsection