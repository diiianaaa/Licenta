@extends('admin.admin_master')
@section('admin')


<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
		<section class="content">
 
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product </h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{route('blog.store')}}" enctype="multipart/form-data" >
		 	@csrf

					  <div class="row">

		





		 
		 
	 
<div class="row"> <!-- start 8th row  -->
			<div class="col-md-6">

	    <div class="form-group">
			<h5>Long Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="descp_en" rows="10" cols="80" required="">
	
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	     <div class="form-group">
			<h5>Long Description German <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor2" name="descp_ger" rows="10" cols="80">
	
						</textarea>       
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 6 -->		 
			
		</div> <!-- end 8th row  -->

	 
	 <hr>
 


	<div class="row">






<div class="col-md-6">

	    
				 
				
			</div> <!-- end col md 4 -->




						 
						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Description">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
 


	





<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>




@endsection

