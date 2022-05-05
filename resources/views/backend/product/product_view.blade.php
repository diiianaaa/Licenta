@extends('admin.admin_master')
@section('admin')


<!-- Contect Wrapper -->

<div class="container-full">

    <!-- //Content Header (Page Header) -->



    <!-- Main Content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Product List</h3>

                    </div>


                    <div class="box-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">


                                <thead>

                                    <tr>

                                        <th>Image</th>
                                        <th>Product Name English</th>
                                        <th>Product Name German</th>
                                        <th>Quantity</th>
                                        <th>Action</th>



                                    </tr>
                                </thead>
                                
                                <tbody>

                                    @foreach($products as $item)

                                    <tr>

                                        <td> <img src="{{ asset($item->product_small)}}"
                                         style="width: 60px; height: 50px;"> </td>
                                            <td>{{ $item->product_name_en }}</td>
                                            <td>{{ $item->product_name_hin }}</td>
                                            <td>{{ $item->product_quantity }}</td>
                                            
                                        
                                      
                                        <td>
                                             <a href="{{ route('product.edit', $item->id) }}" class=" btn btn-info" title="Edit Data">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="" class=" btn btn-info" title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a></td>

                                        

                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>
                    </div>


                </div>


            </div>


         
    </section>






@endsection