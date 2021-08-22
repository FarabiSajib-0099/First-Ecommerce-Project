
<div class="container" style="padding:30px 0;">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Products
                              </div>
                              <div class="col-md-6">

                                  <a href="{{route('add.products')}}" class="btn btn-success pull-right">Add Product</a>
                              </div>
                    </div>

                </div>
                <div class="panel-body">
@if (Session::has('message'))
<div class="alert alert-danger">{{Session::get('message')}}</div>

@endif
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                 <th>Sale Price</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)


                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="{{asset('frontend')}}/assets/images/products/{{$product->image}}" width="50px" alt=""></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->stock_status}}</td>
                                <td>{{$product->regular_price}}</td>
                                <td>{{$product->sale_price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->created_at}}</td>
                                <td><a href="{{route('edit.product',['product_slug'=>$product->slug])}}">

                                    <i  class="fa fa-edit fa-2x"></i>
                                    </a>

                                  <a href="#" onclick="confirm('Are you sure, You want to delete this product?') || event.stopImmediatePropagation()"  wire:click.prevent="deleteProduct('{{$product->id}}')">
                                    <i  class="fa fa-times text-danger fa-2x"></i>
                                  </a>

                                    </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

