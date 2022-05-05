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

                        <h3 class="box-title">Reservations List</h3>

                    </div>


                    <div class="box-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">


                                <thead>

                                    <tr>

                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Tel. Number</th>
                                        <th>Reservation Date</th>
                                        <th>Table</th>
                                        <th>Guest Number</th>
                                        >



                                    </tr>
                                </thead>
                                
                                <tbody>

                                    @foreach($reservation as $item)

                                    <tr>

                                        <td>
                                          
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


            
    </section>






@endsection