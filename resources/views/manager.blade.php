@extends('layoutuser')

@section('title_user', 'สมาชิกทั้งหมด')

@section('content_user')
    <h2 class="py-2">สมาชิกทั้งหมด</h2>
    <form class="d-flex py-2" action="search">
        <input class="form-control me-2" name="search" placeholder="ค้นหา" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">ค้นหา</button>
    </form>
    <table class="table table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เบอร์โทร</th>
                <th>อีเมล์</th>
                <th>ที่อยู่</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($DataModels as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastname }}</td>
                    <td>{{ $item->tel }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$DataModels->links()}}
@endsection
