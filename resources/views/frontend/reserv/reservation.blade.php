@extends('frontend.main_master')
@section('content')

@section('title')
Table Reservation
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Table Reservation Form Template Design</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->

    <!-- Bootstrap JS -->
  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Table Reservation Form -->
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
            <div class="row">
    			<div class="col-md-8 offset-md-2 text-center">
    				<h1 class="text-primary">Book A Table</h1>
    				<p class="mb-5">After booking, we will verify the disponibility and you will receive a SMS with more info.
</p>
                   
    			</div>
    		</div>

            <form action="" method="post" role="form">
              <div class="form-row">
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder=" Email">
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="number" class="form-control" name="phone" id="phone" placeholder=" Phone">
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="date" name="date" class="form-control" id="date" placeholder="Date">
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="time" class="form-control" name="time" id="time" placeholder="Time">
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="number" class="form-control" name="people" id="people" placeholder="Number of people">
                </div>
              </div>
              <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary float-right mt-3">Book </button>
            </form>
        </div>
    </section>
    <!-- End Table Reservation Form -->

    <style>
#book-a-table {
    background-color: #FAFAFA;
    padding: 50px 0px;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  
    float: left;
    width: 100%;
}
.book-a-table p {
	color: #9a9a9a;
}
.book-a-table textarea {
    min-height: 200px;
    max-width: 100%;
}
</style>

</body>
</html>

@endsection