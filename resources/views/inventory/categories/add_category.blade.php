<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Add New Category</h1>
		<div class="row">
			
				<div class="col-lg-6">
					@if(Session::has('success'))
						<div class="alert alert-success" role="alert">
						  {{Session::get('success')}}
						</div>
					@elseif(Session::has('error'))
						<div class="alert alert-danger" role="alert">
						  {{Session::get('error')}}
						</div>
					@endif
					<form action="{{ route('categories.store') }}" method="post">
						@csrf
					<div class="form-group">
						<label for="" class="form-control-label">Category Name</label>
						<input name="category_name" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<input type="submit" value="Save Product" class="btn btn-primary">
					</div>
					</form>

				</div>
					</div>
	</div>
</body>
</html>