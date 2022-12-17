@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('body')
    <div class="row pt-5">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Manage Product</h3>
                </div>
                <div class="card-body">
                    <span class="text-success">{{Session::has('success') ? Session::get('success') : '' }}</span>
                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Description</th>
                            <th>Product Image</th>
                            <th>Product Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{!! \Illuminate\Support\Str::words($product->description, 10, '...') !!}</td>
                                <td><img src="{{$product->image}}" width="60" height="60" alt=""></td>
                                <td>{{$product->status == 1? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('edit-product', ['id' => $product->id])}}" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                    <a href="{{route('delete-product', ['id' => $product->id])}}" onclick="return confirm('Are you sure to delete this Category!!!')" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
