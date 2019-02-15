<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Products</h1>
		<div class="row">
			<div class="col-lg-6">
				@if(Session::has('success'))
					<div class="alert alert-success" role="alert">
					  {{Session::get('success')}}
					</div>
				@endif
				<table class="table-info">
					<tr class="py-3">
						<th>Product Name</th>
						<th>Price</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Quantity</th>
						<th>Action</th>

					</tr>
					@foreach($items as $product)
					<tr class="py-3">
						<td>{{ $product->product_name }}</td>
						<td>{{ $product->product_price }}</td>
						<td>{{ $product->category->category_name }}</td>
						<td>{{ $product->brand->brand_name }}</td>
						<td>{{ $product->product_stock }}</td>
						<form action="{{route('items.destroy', ['id' => $product->id])}}" method="post">		
							@csrf
							@method('DELETE')			
							<td><a class="btn btn-primary" href="{{ route('items.edit' , ['id' => $product->id]) }}" >Edit</a></td>
							<td><button type="submit" class="btn btn-danger">Delete</button></td>
						</form>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</body>
</html>