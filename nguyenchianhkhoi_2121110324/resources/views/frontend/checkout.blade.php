@extends('layouts.site')
@section('title', 'gio hang')

@section('content')
<div class="container">
    <h1>thanh toan</h1>
    <div class="row">
            <div class="col-md-9">
                    <table class ="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 90px">Hình</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalMoney=0;
                            @endphp
                            @foreach ( $list_cart as $row_cart)
                            <tr>
                                <td>{{ $row_cart['id'] }}</td>
                                <td>
                                  <img class ="img-fluid" src="{{asset ('images/products/'.$row_cart['image'])}}" alt="{{ $row_cart['image']}}">
                                </td>
                                <td>{{ $row_cart['name'] }}</td>
                                <td>
                                    {{$row_cart['qty']}}
                                </td>
                                <td>{{ number_format($row_cart['price']) }}</td>
                                <td>{{ number_format($row_cart['price']*$row_cart['qty']) }}</td>

                            </tr>
                            @php
                                $totalMoney += $row_cart['price']*$row_cart['qty'];
                            @endphp
                            @endforeach
                        </tbody>
                    </table>

            </div>
            <div class="col-md-3">
                <strong> Tổng tiền: {{ number_format($totalMoney)}} </strong>
            </div>
    </div>

</div>

@endsection
