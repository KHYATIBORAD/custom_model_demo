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
			<div class="col-3 bg-light ">
				<div class="p-3 text-dark">
					<ul>
						<li>
							<a href="#" id="getrows">GET ROWS</a>
						</li>
						<li>
							<a href="#" id="get_rows_sorted">GET ROWS SORTED</a>
						</li>
						<li>
							<a href="#" id="get_rows_where_in_like">GET ROWS WHERE IN LIKE</a>
						</li>
						<li>
							<a href="#" id="get_distinct_rows">GET DISTINCT ROWS</a>
						</li>
						<li>
							<a href="#" id="get_single_rows">GET SINGLE ROWS</a>
						</li>
						<li>
							<a href="#" id="get_total_count">GET TOTAL COUNT</a>
						</li>
						<li>
							<a href="#" id="get_count">GET COUNT</a>
						</li>
						<li>
							<a href="#" id="insert_row">INSERT ROW</a>
						</li>
						<li>
							<a href="#" id="update_row">UPDATE ROW</a>
						</li>
						<li>
							<a href="#" id="delete_row">DELETE ROW</a>
						</li>
						<li>
							<a href="#" id="single_value">SINGLE VALUE</a>
						</li>
						<li>
							<a href="#" id="check_avaibility">CHECK AVAIBILITY</a>
						</li>
						<li>
							<a href="#" id="find_in_set">FIND IN SET</a>
						</li>
						<li>
							<a href="#" id="join">JOIN</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-9 pt-4" id="display_data">
				<div class="text-center pt-4 p-5 bg-light"><h5>LAST EXECUTING QUERY</h5>
					<div class="text-center" id="query"> 

					</div>
				</div>
				<div class="bg-light pt-4 p-5 ">
					<h5 class="text-center">TABLE DATA</h5>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>COMMENT</th>
							</tr>
						</thead>
						<tbody id="tbody"></tbody>
					</table>
				</div>
				<div class="text-center pt-4 p-5 bg-light" id="array">
					<h5>ARRAY FORMAT</h5>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$('#getrows').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/get_rows');?>', 'post', '' );
			});

			$('#get_rows_sorted').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/get_rows_sorted');?>', 'post', '' );
			});

			$('#get_rows_where_in_like').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/get_rows_where_in_like');?>', 'post', '' );
			});

			$('#get_distinct_rows').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/get_distinct_rows');?>', 'post', '' );
			});

			$('#get_single_rows').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/get_single_rows');?>', 'post', '' );
			});

			$('#get_total_count').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/get_total_count');?>', 'post', '' );
			});

			$('#get_count').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/get_count');?>', 'post', '' );
			});

			$('#insert_row').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/insert_row');?>', 'post', '' );
			});

			$('#update_row').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/update_row');?>', 'post', '' );
			});

			$('#delete_row').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/delete_row');?>', 'post', '' );
			});

			$('#single_value').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/single_value');?>', 'post', '' );
			});

			$('#check_avaibility').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/check_avaibility');?>', 'post', '' );
			});

			$('#find_in_set').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/find_in_set');?>', 'post', '' );
			});

			$('#join').on('click', function () {
				send_request('<?php echo site_url('custom_model_controller/join');?>', 'post', '' );
			});
		});

		function send_request(url, type, data, dataType="json"){
			$.ajax({
				url: url,
				type: type,
				dataType: dataType,
				data:data,
			}).done(function (res){
				$('#query').html(res.query);
				$('#array').html(res.data);
				$('#tbody').empty();
				$.each(res.data, function(index, val) {
					$('#tbody').append('<tr><td>'+val.f_id+'</td><td>'+val.user_comment+'</td></tr>');
				});
			});
		}
	</script>
</body>
</html>