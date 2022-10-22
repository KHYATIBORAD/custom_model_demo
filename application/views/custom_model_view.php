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
	</div>
<script>
	$(document).ready(function(){
		$('#select_data').hide();
		$('#enter_data').hide();
		$('#display_data').hide();
		$('#get_rows').on('click', function(event) {
			$('#select_data').show();
			$('#enter_data').hide();
			$('#display_data').hide();
			rows_request("<?php echo site_url('custom_model_controller/get_rows')?>", "post", "");
		});
		$('#get_rows_sorted').on('click', function(event) {
			$('#enter_data').show();
			$('#select_data').hide();
			$('#display_data').hide();
			search_data('<?= site_url('custom_model_controller/get_rows_sorted') ?>');
		});
		$('#get_rows_where_in_like').on('click', function (e) {
			e.preventDefault();
			$('#enter_data').show();
			$('#select_data').hide();
			$('#display_data').hide();
			search_data('<?= site_url('custom_model_controller/get_rows_where_in_like') ?>');
		});

		$('#get_distinct_rows').on('click', function (e) {
			e.preventDefault();
			$('#select_data').show();
			$('#enter_data').hide();
			$('#display_data').hide();
			rows_request("<?php echo site_url('custom_model_controller/get_rows')?>", "post", "");
		});
	});

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
				// $('#tbody').append('<tr><td>'+val.r_id+'</td><td>'+val.firstname+'</td><td>'+val.lastname+'</td><td>'+val.contact+'</td><td>'+val.email+'</td><td>'+val.gender+'</td><td>'+val.country+'</td></tr>');
			});
		});
	

	$('#select_dropdown').on('change', function(event) {
		event.preventDefault();
		// $('#select_data').hide();
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
</script>
</body>
</html>