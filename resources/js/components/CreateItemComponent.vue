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
						<select v-model="item.category" class="form-control" >
							<option value="">Select a Category</option>
							<option  v-for="category in collection.categories" :value="category.id">{{ category.category_name}}</option>
							
						</select>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Brands</label>
						
						<select v-model="item.brand" class="form-control" >
							<option value="">Select a Brand</option>
							<option v-for="brand in collection.brands" :value="brand.id" >{{ brand.brand_name}}</option>

					</select>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Name</label>
						<input v-model="item.product_name" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Price</label>
						<input v-model="item.product_price" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Stock</label>
						<input v-model="item.product_stock" type="number" class="form-control form-control-lg ">
					</div>

				</div>
					

				
				<div class="col-6">
					<div class="form-group">
						<label for="" class="form-control-label">Upload Image</label>
						<input type="file"  id="file" ref="myFiles" class="form-control" @change="previewFiles" multiple>

					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Description</label>
						<textarea v-model="item.description" class="form-control form-control-lg " rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Item Value</label>
						<input v-model="item.item_value" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Model</label>
						<input v-model="item.model" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<input type="submit" value="Save Product" class="btn btn-primary">
					</div>
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
      files: [],
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
	    let uri = 'http://127.0.0.1:8000/items';
	    this.axios.post(uri, this.item).then((response) => {
	       this.$router.push({name: 'product'});
	    });
	},
	previewFiles() {
    this.files = this.$refs.myFiles.files
  	}
    }
  }
</script>