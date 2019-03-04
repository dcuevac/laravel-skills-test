@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add Product Stock
                </div>
                <div class="card-body">
                    <form>
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="productName">Product Name</label>
                          <input type="text" required name="name" class="form-control" id="productName" placeholder="Ex. Earphones">
                        </div>
                        <div class="form-group">
                            <label for="productQuantityInStock">Quantity in stock</label>
                            <input type="number" required name="quantity" min='0' class="form-control" id="productQuantityInStock" >
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Price per item</label>
                            <input type="number" required name="price" min='0' class="form-control" id="productPrice" >
                        </div>
                        <div id="add_product_stock" class="btn btn-primary" onclick="submitForm()">Submit</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
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
                        <tbody id="product_stocks_tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $( document ).ready(function() {
            $.ajax({
                url: "{{route('product.stock.index')}}",
                type: 'GET'
            }).done(function(result) {
                appendTableBody(result);
            });
        });

        function submitForm() {
            let _token = $( "input[name='_token']" ).val();
            let name = $('#productName').val();
            let quantity = $('#productQuantityInStock').val();
            let price = $('#productPrice').val();

            if (!_token || !name || !quantity || !price) {
                alert('All fields are required');
            }

            $.ajax({
                url: "{{route('product.stock.store')}}",
                data: {
                    '_token': _token,
                    'name': name,
                    'quantity': quantity,
                    'price': price,
                },
                type: 'POST'
            }).done(function(result) {
                appendTableBody(result);
            });
        }

        function appendTableBody(result) {
            $('#product_stocks_tbody').html('');
            result.stocks.map((stock) => {
                html = '<tr>\n' +
                    '<td>' + stock.data['name'] + '</td>\n' +
                    '<td>' + stock.data['quantity'] + '</td>\n' +
                    '<td>' + stock.data['price'] + '</td>\n' +
                    '<td>' + stock.data['quantity'] * stock.data['price'] + '</td>\n' +
                '</tr>';
                $('#product_stocks_tbody').append(html);
            });
            total_html = '<tr><td colspan="3" class="text-right">Total:</td><td id="total_value">' + result.total + '</td></tr>';
            $('#product_stocks_tbody').append(total_html);
        }
    </script>
@endsection
