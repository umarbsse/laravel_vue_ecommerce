<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text">{{Auth::User()->name}}</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="{{url('admin/dashboard')}}">
				<div class="parent-icon"><i class='bx bx-home-alt'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<li class="menu-label">UI Elements</li>
		<li>
			<a href="widgets.html">
				<div class="parent-icon"><i class='bx bx-cookie'></i>
				</div>
				<div class="menu-title">Widgets</div>
			</a>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-cart'></i>
				</div>
				<div class="menu-title">eCommerce</div>
			</a>
			<ul>
				<li> <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Products</a>
				</li>
				<li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product Details</a>
				</li>
				<li> <a href="ecommerce-add-new-products.html"><i class='bx bx-radio-circle'></i>Add New Products</a>
				</li>
				<li> <a href="ecommerce-orders.html"><i class='bx bx-radio-circle'></i>Orders</a>
				</li>
			</ul>
		</li>

		
		<li class="menu-label">Pages</li>
		
		<li>
			<a href="{{url('admin/profile_settting')}}">
				<div class="parent-icon"><i class="bx bx-user-circle"></i>
				</div>
				<div class="menu-title">User Profile</div>
			</a>
		</li>
		
		<li>
			<a href="{{url('admin/change_pswd')}}">
				<div class="parent-icon"><i class="bx bx-lock-alt"></i>
				</div>
				<div class="menu-title">Change Password</div>
			</a>
		</li>
		
		<li>
			<a href="{{url('logout')}}">
				<div class="parent-icon"><i class="bx bx-log-out-circle"></i>
				</div>
				<div class="menu-title">Logout</div>
			</a>
		</li>
		
	</ul>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->