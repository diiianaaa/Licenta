@extends('admin.admin_master')
@section('admin')


<div class="container-full">

    <!-- //Content Header (Page Header) -->


    <!-- Main Content -->
    <section class="content">
        <div class="row">

            <div class="col-8">

                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Tables </h3>

                    </div>


                    <div class="box-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">


                                <thead>

                                    <tr>

                                        <th>Table Number</th>
                                        <th>Number of seats</th>
                                        



                                    </tr>
                                </thead>
                                
                                <tbody>

                                    @foreach($type as $ty)

                                    <tr>

                                        <td>{{ $ty->table_nb }}
                                            <td>{{ $item->seats_nb }}</td>
                                           
                                        
                                       
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
                        <h3 class="box-title">Add Table </h3>
                    </div>
                    <div class="box-body">

                    <div class="table-responsive">

                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('table.store') }}" >
           

            @csrf


            <div class="form-group">
                <h5>Table Number <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="table_nb" class="form-control">
                    @error('table_nb')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <h5>Number of seats for the table <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="seats_nb" class="form-control">
                    @error('seats_nb')
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