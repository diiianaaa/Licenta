<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="../images/logo-dark.png" alt="">
						  <h3> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li>
          <a href="{{ route('blog') }}">
            <i data-feather="pie-chart"></i>
			<span>Blog</span>
          </a>
        </li>  
		
        <li class="treeview">
          <a href="">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        
            <li><a href="{{route('all.category')}}"><i class="ti-more"></i>Category</a></li>
            <li><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>SubCategory</a></li>
            <li><a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>SubSubCategory</a></li>
          </ul>
        </li> 


		  
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('add-product') }}"><i class="ti-more"></i>Add products</a></li>
            <li><a href="{{ route('manage-product')}}"><i class="ti-more"></i>Manage products</a></li>
            
          </ul>
        </li>


        
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Reservations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('tables_index') }}"><i class="ti-more"></i>Tables</a></li>
            <li><a href="{{ route('reservation_index')}}"><i class="ti-more"></i>Reservations</a></li>
            
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage slider</a></li>
           
            
          </ul>
        </li>


        		  
		<li>
          <a href="{{ route('blog') }}">
            <i data-feather="pie-chart"></i>
			<span>Blog</span>
          </a>
        </li>  
		
        <li class=treeview>
          <a href="">
            <i data-feather="file"></i>
            <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        
          
              <a href="{{ route('manage-division') }}"><i class="ti-more"></i>Division</a></li>
              <a href="{{ route('manage-district') }}"><i class="ti-more"></i>District</a></li>
              <a href="{{ route('manage-country') }}"><i class="ti-more"></i>Country</a></li>
          
          </ul>
        </li> 


		

    
        </li> 
		  

	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>