@extends('layout.layoutuser')

@section('title_user', 'สมาชิกทั้งหมด')

@section('content_user')
<h2>จัดการจังหวัด</h2>
<form method="POST" action="/Province">
    @csrf
    <div class="input-group py-3">
        <span class="input-group-text">จังหวัด</span>
        <input type="text" name="province_name" class="form-control">
        <button class="btn btn-success btn-add pull-right" >
            เพิ่มข้อมูล
        </button>
    </div>
    @error('province_name')
        <span class="text text-danger">{{ $message }}</span>
    @enderror
</form>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th scope="col">จังหวัด</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($result as $item)
            <tr>
                <td>{{$item->province_name}}</td>
            </tr>
        @endforeach 
    </tbody>
</table>
{{$result->links()}} 
@endsection
