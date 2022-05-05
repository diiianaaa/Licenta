@extends('admin.admin_master')
@section('admin')


<!-- Contect Wrapper -->

<div class="container-full">

    <!-- //Content Header (Page Header) -->


    <!-- Main Content -->
    <section class="content">
        <div class="row">

            <div class="col-8">

                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Tables List</h3>

                    </div>


                    <div class="box-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">


                                <thead>

                                    <tr>

                                        <th>Name</th>
                                        <th>Guest Number</th>
                                        <th>Status</th>
                                        <th>Location</th>



                                    </tr>
                                </thead>
                                
                                <tbody>

                                    @foreach($table as $item)

                                    <tr>

                                        <td>{{ $item->name }}
                                          
                                            <span><i class=""></i></span></td>
                                        
                                      
                                        <td> <a href="" class=" btn btn-info" title="Edit Data">
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


            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category </h3>
                    </div>
                    <div class="box-body">

                    <div class="table-responsive">

                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('table.store') }}" >
           

            @csrf


            <div class="form-group">
                <h5>Name  <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="name" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>




            <div class="form-group">
                <h5>Guest Number  <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="guest_number" class="form-control">
                    @error('guest_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <h5>Status <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="status" class="form-control">
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <h5>Location <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="location" class="form-control">
                    @error('location')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>



            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Table">

            </div>

            </form>
    </section>






@endsection