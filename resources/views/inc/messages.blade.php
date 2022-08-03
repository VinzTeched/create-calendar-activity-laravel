
	
	@if (session()->has('message'))
		<p class="alert alert-success mr-4 ml-4 mt-5">{{ session('message') }}</p>	
	@endif

	@if (session()->has('wrong'))
		<p class="alert alert-danger mr-4 ml-4 mt-5">{{ session('wrong') }}</p>	
	@endif

	@if(session('status'))
		<script> 
		    $(function() {
		    const Toast = Swal.mixin({
		      toast: true,
		      position: 'top-end',
		      showConfirmButton: false,
		      timer: 5000
		    });

		      Toast.fire({
		        type: 'success',
		        title: '{{ session('status') }}'
		      });

		    });
		</script>
	@endif
	@if(session('status'))
		<script> 
		    $(function() {
		    const Toast = Swal.mixin({
		      toast: true,
		      position: 'top-end',
		      showConfirmButton: false,
		      timer: 5000
		    });

		      Toast.fire({
		        type: 'success',
		        title: '{{ session('status') }}'
		      });

		    });
		</script>
	@endif

	@if(session('test'))
		<script> 
		    $(function() {
		    const Toast = Swal.mixin({
		      toast: true,
		      position: 'top-end',
		      showConfirmButton: false,
		      timer: 5000
		    });

		      Toast.fire({
		        type: 'success',
		        title: '{{ session('test') }}'
		      });

		    });
		</script>
	@endif
			
	
	@if (session()->has('p_message'))
		<p class="alert alert-danger mr-4 ml-4 mt-5">{!! htmlspecialchars_decode(session('p_message')) !!}</p>	
		<script> 
		    $(function() {
		    const Toast = Swal.mixin({
		      toast: true,
		      position: 'top-end',
		      showConfirmButton: false,
		      timer: 5000
		    });

		      Toast.fire({
		        type: 'error',
		        title: '{{ session('p_message') }}'
		      });

		    });
		</script>
	@endif	