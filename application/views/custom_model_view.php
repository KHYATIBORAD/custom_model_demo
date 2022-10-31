<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	echo $css;
	echo $js;
	?>
	<title></title>
</head>
<body>
	<div class="container-fluid">
		<div class="pt-4">
			<h3 class="text-center">CUSTOM MODEL DEMO</h3>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="p-3 text-dark">
					<div class="card" style="width: 18rem;">
						<div class="card-header ">
							<h5>METHODS</h5>
						</div>
						<ul class="list-group list-group-flush text-uppercase">
							<?php foreach ($list_items as $key => $value): ?>
								<li class="list-group-item">
									<a href="#" class="nav-link" id="<?= $key ?>"><?= $value ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>	
			<div class="col-9 pt-4" >
				<div id="select_data" class="mb-3">
					<div class="card">
						<h5 class="card-header ">SELECT DATA</h5>
						<div class="card-body col-md-3">
							<select id="select_dropdown" class="form-select" aria-label="Default select example">
								<option></option>
							</select>
						</div>
					</div>
				</div>
				<div id="enter_data" class="mb-3">
					<div class="card">
						<h5 class="card-header ">ENTER DATA</h5>
						<div class="card-body">
							<form id="myform">
								<div class="btn-toolbar mb-3">
									<div class="btn-group me-2 col-md-2" role="group" aria-label="First group">
										<button type="button" id="textbox" class="btn btn-success btn-sm btn-search">Search</button>
									</div>
									<div class=" col-md-3">
										<input type="number" class="form-control" name="r_id" placeholder="Input your id" id="r_id">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div id="display_data">
					<div class="card" >
						<h5 class="card-header">LAST EXECUTING QUERY</h5>
						<div class="card-body h5 text-danger" id="query">
							
						</div>
					</div>
					<div class="card mt-4">
						<h5 class="card-header">TABLE DATA</h5>
						<div class="card-body">
							<div id="msg"></div>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Firstname</th>
										<th scope="col">Lastname</th>
										<th scope="col">contact</th>
										<th scope="col">email</th>
										<th scope="col">gender</th>
										<th scope="col">country</th>
									</tr>
								</thead>
								<tbody class="text-primary" id="tbody"></tbody>
							</table>	
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- FOR INSERT ROW FUNCTION -->
		<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="text-center" id="exampleModalLabel">register</h3>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body pt-4">
						<div class="container">
							<div class="col-12">
								<form action="#" method="POST" class="row g-3" id="registerform"  novalidate>

									<div class="row">
										<div class="col-12 col-md-6 mb-3 ">
											<label class="form-lable">Firstname</label>
											<input type="text" name="firstname" id="firstname" class="form-control" autocomplete="off"  >
										</div>
										<div class="col-12 col-md-6 mb-3">
											<label class="form-lable">Lastname</label>
											<input type="text" name="lastname" id="lastname" class="form-control "   autocomplete="off" >
										</div>
										<div class="col-12 col-md-6 mb-3">
											<label class="form-lable">Password</label>
											<input type="Password" name="password" id="password" class="form-control" id="password"  autocomplete="off"  >
										</div>
										<div class="col-12 col-md-6 mb-3">
											<label class="form-lable">Confirm Password</label>
											<input type="Password" name="cnfpassword" id="cnfpassword" class="form-control" id="cnfpassword" autocomplete="off">
										</div>
										<div class="col-12 col-md-6 mb-3">
											<label class="form-lable ">Contact</label>
											<input type="text" name="contact" id="contact" class="form-control"   autocomplete="off" >
										</div>
										<div class="col-12 col-md-6 mb-3">
											<label class="form-lable">Email Id</label>
											<input type="text" name="email" id="email" class="form-control"   autocomplete="off">
										</div>
										<div class="col-12 col-md-6 mb-3">
											<label class="form-lable" for="gender">Gender</label><br>
											<input class="form-check-input" type="radio" name="gender" id="female" value="Female" >
											<label class="form-label form-check-inline" for="female">
												Female
											</label><br>
											<input class="form-check-input" type="radio" name="gender" id="male" value="Male" >
											<label class="form-label form-check-inline" for="male">
												Male
											</label>
										</div>
										<div class="col-12 col-md-6 mb-3">
											<label class="form-lable">Country</label>
											<select class="form-select" id="country" name="country" >
												<option></option>
												<option value="India">India</option>
												<option value="US">Us</option>
												<option value="Londan">Londan</option>
												<option value="Australia">Australia</option>
											</select>
										</div>
										<div class="row  mb-3">
											<button type="submit" id="btnsubmit" class="btn btn-primary btn-block  mb-4">Submit</button>
										</div>
									</div>
								</form>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#select_data').hide();
			$('#enter_data').hide();
			$('#display_data').hide();

			// GET ROWS FUNCTION REQUEST
			$('#get_rows').on('click', function(event) {
				$('#select_data').show();
				$('#enter_data').hide();
				$('#display_data').hide();
				rows_request("<?php echo site_url('custom_model_controller/get_rows')?>", "post", "");
			});

			// GET ROR SORTED FUNCTION REQUEST
			$('#get_rows_sorted').on('click', function(event) {
				$('#enter_data').show();
				$('#select_data').hide();
				$('#display_data').hide();
				search_data('<?= site_url('custom_model_controller/get_rows_sorted') ?>');
			});

			// GET ROW WHERE IN LIKE FUNCTION REQUEST
			$('#get_rows_where_in_like').on('click', function (e) {
				e.preventDefault();
				$('#enter_data').show();
				$('#select_data').hide();
				$('#display_data').hide();
				search_data('<?= site_url('custom_model_controller/get_rows_where_in_like')?>');
			});

			// GET DISTINCT ROW FUNCTION REQUEST
			$('#get_distinct_rows').on('click', function (e) {
				e.preventDefault();
				$('#select_data').show();
				$('#enter_data').hide();
				$('#display_data').hide();
				rows_request("<?php echo site_url('custom_model_controller/get_rows')?>","post", "");
			});

			// GET SINGLE ROWS FUNCTION REQUEST
			$('#get_single_rows').on('click', function (e) {
				e.preventDefault();
				$('#enter_data').show();
				$('#select_data').hide();
				$('#display_data').hide();
				$('.btn-search').on('click', function (e) {
					e.preventDefault();
					var data = $('#r_id').val();
					$.ajax({
						url: '<?= site_url('custom_model_controller/get_single_rows'); ?>',
						type: 'post',
						data: { r_id : data},
						dataType : 'json'
					}).done(function(res){
						$('#display_data').show();
						$('#query').html(res.query);
						$('#tbody').empty();
						if(res.data != ''){
							data_cleanup();
							$('#tbody').append('<tr><td>'+res.data['r_id']+'</td><td>'+res.data['firstname']+'</td><td>'+res.data['lastname']+'</td><td>'+res.data['contact']+'</td><td>'+res.data['email']+'</td><td>'+res.data['gender']+'</td><td>'+res.data['country']+'</td></tr>');	
						}else{
							$('.table').hide();
							$('#msg').html('<h4 class="text-danger">Sorry,records not found.</h4>');
						}
						$('#myform').trigger('reset');
					});
				});
				
			});

			// GET TOTAL COUNT FUNCTION REQUEST
			$('#get_total_count').on('click', function (e) {
				e.preventDefault();
				$('#select_data').hide();
				$('#enter_data').hide();
				$('#display_data').hide();
				$.ajax({
					url: '<?= site_url('custom_model_controller/get_total_count'); ?>',
					type: 'post',
					data: "",
					dataType : 'json'
				}).done(function(res){
					$('#display_data').show();
					$('#query').html(res.query);
					$('.table').hide();
					$('#msg').html('<h4 class="text-danger">GET TOTAL REGISTER COUNT IS : ' +res.data+'</h4>');
				});
			});

			// GET COUNT FUNCTION REQUEST
			$('#get_count').on('click', function (e) {
				e.preventDefault();
				$('#enter_data').show();
				$('#select_data').hide();
				$('#display_data').hide();
				$('.btn-search').on('click', function (e) {
					e.preventDefault();
					var data = $('#r_id').val();
					$.ajax({
						url: '<?= site_url('custom_model_controller/get_count'); ?>',
						type: 'post',
						data: { r_id : data},
						dataType : 'json'
					}).done(function(res){
						$('#display_data').show();
						$('#query').html(res.query);
						$('.table').hide();
						$('#msg').html('<h4 class="text-danger"> GET TOTAL REGISTER COUNT IS : ' +res.data+'</h4>');
					});
				});
			});

			// SINGLE VALUE FUNCTION REQUEST
			$('#single_value').on('click', function (e) {
				e.preventDefault();
				$('#enter_data').show();
				$('#select_data').hide();
				$('#display_data').hide();
				$('.btn-search').on('click', function (e) {
					e.preventDefault();
					var data = $('#r_id').val();
					$.ajax({
						url: '<?= site_url('custom_model_controller/single_value'); ?>',
						type: 'post',
						data: { r_id : data},
						dataType : 'json'
					}).done(function(res){
						$('#display_data').show();
						$('#query').html(res.query);
						$('.table').hide();
						$('#msg').html('<h4 class="text-danger"> LASTNAME IS : ' +res.data+'</h4>');
					});
				});
			});

			// CHECK AVAIBILITY FUNCTION REQUEST
			$('#check_avaibility').on('click', function (e) {
				e.preventDefault();
				$('#enter_data').show();
				$('#select_data').hide();
				$('#display_data').hide();
				$('.btn-search').on('click', function (e) {
					e.preventDefault();
					var data = $('#r_id').val();
					$.ajax({
						url: '<?= site_url('custom_model_controller/check_avaibility'); ?>',
						type: 'post',
						data: { r_id : data},
						dataType : 'json'
					}).done(function(res){
						$('#display_data').show();
						$('#query').html(res.query);
						$('.table').hide();
						$('#msg').html('<h4 class="text-danger"> YOUR RECORD : ' +res.data+'</h4>');
					});
				});
			});

			// FIND IN SET FUNCTION REQUEST
			$('#find_in_set').on('click', function(event) {
				$('#enter_data').hide();
				$('#select_data').hide();
				$('#display_data').hide();
				$.ajax({
					url: '<?= site_url('custom_model_controller/find_in_set'); ?>',
					type: 'post',
					data: "",
					dataType : 'json'
				}).done(function(res){
					$('#display_data').show();
					$('#query').html(res.query);
					$('#tbody').empty();
					if(res.data != ''){
						data_cleanup();
						$.each(res.data, function(index, val) {
							$('#tbody').append('<tr><td>'+val.r_id+'</td><td>'+val.firstname+'</td><td>'+val.lastname+'</td><td>'+val.contact+'</td><td>'+val.email+'</td><td>'+val.gender+'</td><td>'+val.country+'</td></tr>');
						});
					}else{
						$('.table').hide();
						$('#msg').html('<h4 class="text-danger">Sorry,records not found.</h4>');
					}
					$('#myform').trigger('reset');
				});
			});

			// INSERT ROW FUNCTION REQUEST
			$('#insert_row').on('click', function (e) {
				e.preventDefault();
				$('#modal').modal('show');
				$('#enter_data').hide();
				$('#select_data').hide();
				$('#display_data').hide();
				$('#btnsubmit').on('click', function (e) {
					e.preventDefault();
					$('#modal').modal('hide');
					var data ={
						firstname: $('#firstname').val(),
						lastname: $('#lastname').val(),
						password: $('#password').val(),
						contact: $('#contact').val(),
						email: $('#email').val(),
						gender : $('#male:checked').val() ? 'male' : 'female',
						country: $('#country').val()
					};
					$.ajax({
						url: '<?= site_url('custom_model_controller/insert_row'); ?>',
						type: 'post',
						data:  data,
						dataType : 'json'
					}).done(function(res){
						$('#display_data').show();
						$('#query').html(res.query);
						$('.table').show();
						$.each(res.data, function(index, val) {
							$('#tbody').append('<tr><td>'+val.r_id+'</td><td>'+val.firstname+'</td><td>'+val.lastname+'</td><td>'+val.contact+'</td><td>'+val.email+'</td><td>'+val.gender+'</td><td>'+val.country+'</td></tr>');
						});
						$('#registerform').trigger('reset');
					});
				});
			});

			// UPDATE ROW FUNCTION REQUEST
			$('#update_row').on('click', function (e) {
				e.preventDefault();
				$('#enter_data').show();
				$('#select_data').hide();
				$('#display_data').hide();
				$('.btn-search').on('click', function (e) {
					e.preventDefault();
					var data = $('#r_id').val();
					$.ajax({
						url: '<?= site_url('custom_model_controller/update_row') ?>',
						type: 'post',
						data: { r_id : data},
						dataType : 'json'
					}).done(function(res){
						$('#display_data').show();
						$('#query').html(res.query);
						data_cleanup();
						console.log(res.data);
						return;
						if(res.data == updated){
						$('#msg').html('<h4 class="text-danger"> UPDATE RECORD SUCCESSFULLY </h4>');	
						}else{
							$('#msg').html('<h4 class="text-danger"> RECORD NOT FOUND ! </h4>');
						}
					});
				});
			});

			// DELETE ROW FUNCTION REQUEST
			$('#delete_row').on('click', function (e) {
				e.preventDefault();
				$('#enter_data').show();
				$('#select_data').hide();
				$('#display_data').hide();
				$('.btn-search').on('click', function (e) {
					e.preventDefault();
					var data = $('#r_id').val();
					$.ajax({
						url: '<?= site_url('custom_model_controller/delete_row'); ?>',
						type: 'post',
						data: { r_id : data},
						dataType : 'json'
					}).done(function(res){
						$('#display_data').show();
						$('#query').html(res.query);
						data_cleanup();
						if(res.data == 1){
							$('#msg').html('<h4 class="text-danger"> DELETE RECORD SUCCESSFULLY </h4>');
						} else {
							$('#msg').html('<h4 class="text-danger"> RECORD NOT FOUND ! </h4>');
						}
					});
				});
			});

			// JOIN FUNCTION REQUEST
				$('#join').on('click', function(event) {
				$('#enter_data').hide();
				$('#select_data').hide();
				$('#display_data').hide();
				$.ajax({
					url: '<?= site_url('custom_model_controller/join'); ?>',
					type: 'post',
					dataType : 'json'
				}).done(function(res){
					$('#display_data').show();
					$('#query').html(res.query);
					data_cleanup();
					$.each(res.data, function(index, val) {
						$('#tbody').append('<tr><td>'+val.r_id+'</td><td>'+val.firstname+'</td><td>'+val.lastname+'</td><td>'+val.contact+'</td><td>'+val.email+'</td><td>'+val.gender+'</td><td>'+val.country+'</td></tr>');
					});
				});
			});

		});

// THIS FUNCTION FOR INPUT ID
function search_data(url){
	$('.btn-search').on('click', function (e) {
		e.preventDefault();
		var data = $('#r_id').val();
		$.ajax({
			url: url,
			type: 'post',
			data: { r_id : data},
			dataType : 'json'
		}).done(function(res){
			$('#display_data').show();
			$('#query').html(res.query);
			$('#tbody').empty();
			if(res.data != ''){
				$('#msg').empty();
				$('.table').show();
				$.each(res.data, function(index, val) {
					$('#tbody').append('<tr><td>'+val.r_id+'</td><td>'+val.firstname+'</td><td>'+val.lastname+'</td><td>'+val.contact+'</td><td>'+val.email+'</td><td>'+val.gender+'</td><td>'+val.country+'</td></tr>');
				});
			}else{
				$('.table').hide();
				$('#msg').html('<h4 class="text-danger">Sorry,records not found.</h4>');
			}
			$('#myform').trigger('reset');
		});
	});
}

// THIS FUNCTION FOR DROPDOWN DATA
function rows_request(url, type, data, dataType="json"){
	$.ajax({
		url: url,
		type: type,
		dataType: dataType,
		data:data,
	}).done(function (res){
		$('#select_dropdown').empty();
		$('#select_dropdown').append(`<option></option>`);
		$.each(res.data, function(index, val) {
			$('#select_dropdown').append(`<option id="option" value=${val.lastname}>${val.lastname}</option>`);
			$('#tbody').empty();
		});
	});
	
	$('#select_dropdown').on('change', function(event) {
		event.preventDefault();
		var lastname =$(this).val();
		$.ajax({
			url: '<?= site_url('custom_model_controller/get_values'); ?>',
			type: 'post',
			dataType: 'json',
			data: { lastname : lastname }
		}).done(function(res){
			$('#display_data').show();
			$('#query').html(res.query);
			$('#tbody').empty();
			$.each(res.data, function(index, val) {
				$('#tbody').append('<tr><td>'+val.r_id+'</td><td>'+val.firstname+'</td><td>'+val.lastname+'</td><td>'+val.contact+'</td><td>'+val.email+'</td><td>'+val.gender+'</td><td>'+val.country+'</td></tr>');
			});

		});
	});
}
function data_cleanup(){
	$('#msg').empty();
	$('.table').show();
}
function hide_me(control_name){
	$(control_name).hide();
}
</script>
</body>
</html>