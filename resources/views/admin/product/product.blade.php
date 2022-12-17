@extends('admin.master')
@section('title')
    Add Product
@endsection
@section('body')
    <div class="row py-5">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Product</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('new-product')}}" method="post" enctype="multipart/form-data">
                        <span class="text-success">{{Session::has('success') ? Session::get('success') : '' }}</span>
                        @csrf
                        <div class="row mt-2">
                            <label class="col-md-4" >Category Name</label>
                            <div class="col-md-8">
                                <input type="text" name="category_name" class="form-control" />
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="col-md-4" >Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" name="brand_name" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4" >Product Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4" >Product Price</label>
                            <div class="col-md-8">
                                <input type="number" name="price" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4" >Product Description</label>
                            <div class="col-md-8">
                                <textarea name="description" id="description" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4" >Product Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" name="status" value="1" checked> Published</label>
                                <label><input type="radio" name="status" value="0" checked> Unpublished</label>

                            </div>

                        </div>

                        <div class="row mt-2">
                            <label class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-warning" value="Add Product">

                            </div>

                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection
