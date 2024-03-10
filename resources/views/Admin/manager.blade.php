@extends('layout.layoutuser')

@section('title_user', 'สมาชิกทั้งหมด')

@section('content_user')
    <h2 class="py-2">สมาชิกทั้งหมด</h2>
    <form method="get" action="/search">
        <div class="input-group py-3">
            <input class="form-control" name="search" placeholder="Search..." value="{{ isset($search) ? $search : ''}}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
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
                    <td>{{ $item->firstname }}</td>
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
