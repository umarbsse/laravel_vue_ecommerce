
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('assets/plugins/chartjs/js/chart.js')}}"></script>
	<script src="{{asset('assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('assets/js/app.js')}}"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
	<script>
		$(document).ready(function(){
			$("#dynamic_form").on('submit',function(e){
				e.preventDefault();
				var form_data=new FormData(this);
				var url = $(this).attr('action');
				$.ajax({
					type:'POST',
					url:url,
					data:form_data,
					cache:false,
					contentType:false,
					processData:false,
					success:function(response){
						console.log(response);
					}
				});
			});
		});
	</script>