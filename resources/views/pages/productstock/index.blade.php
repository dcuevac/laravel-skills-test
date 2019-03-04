@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Products Stocks
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Product name</td>
                                <td>Quantity in stock</td>
                                <td>Price per item</td>
                                <td>Total value</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $stock)
                                <tr>
                                    <td>
                                        {{$stock->data['name']}}
                                    </td>
                                    <td>
                                        {{$stock->data['quantity']}}
                                    </td>
                                    <td>
                                        {{$stock->data['price']}}
                                    </td>
                                    <td>
                                        {{$stock->data['quantity'] * $stock->data['price']}}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-right">
                                    Total:
                                </td>
                                <td>
                                    {{$total}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
