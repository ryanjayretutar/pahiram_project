<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
</head>
<body>
	<div class="container">
		<h1>Add New Product</h1>
		<form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
		<div class="row">
			
				{{ csrf_field()}}
				<div class="col-6">
					@if(Session::has('success'))
						<div class="alert alert-success" role="alert">
						  {{Session::get('success')}}
						</div>
					@elseif ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					



					
					<div class="form-group">
						<input type="hidden" value="1" name="user_id">
						<label for="" class="form-control-label">Categories</label>
						<select name="category_id" class="form-control">
							<option value="">Select a category</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Brands</label>
						
						<select name="brand_id" class="form-control">
							<option value="">Select a Brand</option>
							@foreach($brands as $brand)
								<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Name</label>
						<input name="product_name" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Price</label>
						<input name="product_price" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Stock</label>
						<input name="product_stock" type="number" class="form-control form-control-lg ">
					</div>

				</div>
					

				
				<div class="col-6">
					<div class="form-group">
						<label for="" class="form-control-label">Upload Image</label>
						<input type="file" name="image_path" class="form-control form-control-lg">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Description</label>
						<textarea name="description" class="form-control form-control-lg " rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Item Value</label>
						<input name="item_value" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Model</label>
						<input name="model" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<input type="submit" value="Save Product" class="btn btn-primary">
					</div>
					
				</div>
				</div>
			</form>	
			
					</div>
	</div>
	<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>