<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Update Product</h1>
		<div class="row">
			
				<div class="col-lg-6">
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
					<form action="{{ route('items.update', $item->id) }}" method="post">
						@csrf
						@method('PUT')
					<div class="form-group">
						<input type="hidden" value="1" name="user_id">
						<label for="" class="form-control-label">Categories</label>
						<select name="category_id" class="form-control">
							<option value="{{$item->category_id}}">{{$item->category->category_name}}</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Brands</label>
						<select name="brand_id" class="form-control">
							<option value="{{$item->brand_id}}">{{$item->brand->brand_name}}</option>
							@foreach($brands as $brand)
								<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">item Name</label>
						<input name="product_name" value="{{$item->product_name}}" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">item Price</label>
						<input name="product_price" value="{{$item->product_price}}" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">item Stock</label>
						<input name="product_stock" type="number" value="{{$item->product_stock}}" class="form-control form-control-lg ">
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