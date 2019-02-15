<template>
	<div class="container">
		<h1>Add New Product</h1>
		<form @submit.prevent="addPost" enctype="multipart/form-data">
		<div class="row">
			
				<!-- {{ csrf_field()}} -->
				<div class="col-6">
				<!-- 	@if(Session::has('success'))
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
					@endif -->
					



					
					<div class="form-group">
						<!-- <input type="hidden" value="1" v-model="item.user"> -->
						<label for="" class="form-control-label">Categories</label>
						<select v-model="item.category" class="form-control" v-for="category in collection">
							<option value="">Select a category</option>
							<option :value="{{category.categories }}">{{ category.categories}}</option>
							
						</select>
					</div>
					<!-- <div class="form-group">
						<label for="" class="form-control-label">Brands</label>
						
						<select v-model="item.brand" class="form-control" v-for="brand in collection.brands">
							<option value="">Select a Brand</option>
								<option value="{{brand.id}}">{{ brand.brand_name}</option>

					</select>
					</div> -->
					<!-- <div class="form-group">
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
					
				</div> -->
			</div>
				</div>
			</form>	
			
					</div>
	</div>
</template>

<script>
 

  export default {
    data(){
    return {
      item:{},
      collection:[]
    }
    },
    created() {
      let uri = 'http://127.0.0.1:8000/items/create';
      this.axios.get(uri).then(response => {
        this.collection = response.data.data;
      });
    },
    methods: {
      addPost(){
	    let uri = 'http://127.0.0.1:8000/items/create';
	    this.axios.post(uri, this.item).then((response) => {
	       this.$router.push({name: 'items'});
	    });
	}
    }
  }
</script>