@extends('admin/layout/layout')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/table.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/layouttitle.css')}}">

@section('mycss')
@endsection

@section('contents')
<div class="layouttitle">
    <section class="header">
        <div class="title">
            <h1>Customer List</h1>
            <span>IShopApple Admin Panel</span>
        </div>
    </section>
    <section class=body>
        <h3>Customer Lists</h3>
        <hr>
        <table border="1">
            <thead>
                <td>id</td>
                <td>fullname</td>
                <td>image</td>
                <td>email</td>
                <td>phone</td>
                <td>address</td>
                <th><a href="{{route('customer.create')}}" style="color:green"><i class="fa-solid fa-plus"></i></a></th>
            </thead>
            <tbody>
                @foreach($customer as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name." ".$item->last_name}}</td>
                    <td><img src="{{asset($item->image)}}" alt="" width="50" height="50" style="border-radius:50%"></td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <th>
                        <form action="{{route('customer.destroy',$item->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit">
                                <i class="fa-solid fa-delete-left"></i>
                            </button>
                        </form>
                        <button><a href="{{route('customer.edit',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></button>
                    </th>
                </tr>

                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
    </section>

</div>@endsection

@section('myjs')
<script>
    $(document).ready(function() {
        $('.btn-search').on('click', function() {
            var valuesearch = $('.valuesearch').val();
            window.location.href = "{{ route('searchcustomer', ['valuesearch' => 'replacevaluesearch']) }}".replace('replacevaluesearch', valuesearch);
        });
    });
</script>
@endsection