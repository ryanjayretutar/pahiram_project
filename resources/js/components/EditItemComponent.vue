<template>

		<form @submit.prevent="updatePost" enctype="multipart/form-data">
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
						<label for="" class="form-control-label">Categories</label>
						<select v-model="item.item.category_id" name="category_id" class="form-control" >
							<option :value="item.item.category.id" :selected="true">{{item.item.category.category_name}}</option>
							<option v-if="category.id !== item.item.category.id" v-for="category in item.categories" :value="category.id" >{{ category.category_name}}</option>
							
						</select>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Brands</label>
						
						<select name="brand_id" v-model="item.item.brand_id" class="form-control" >
							<option :value="item.item.brand.id" :selected="true">{{item.item.brand.brand_name}}</option>
							<option v-if="brand.id !== item.item.brand.id" v-for="brand in item.brands" :value="brand.id" >{{ brand.brand_name}}</option>

					</select>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Name</label>
						<input v-model="item.item.product_name"  name="product_name" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Price</label>
						<input v-model="item.item.product_price" name="product_price"  type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Product Stock</label>
						<input v-model="item.item.product_stock" name="product_stock" type="number" class="form-control form-control-lg ">
					</div>

				</div>
					

				
				<div class="col-6">
				<div class="col-md-3" v-if="imgsrc">
                  <img :src="'/images/' + imgsrc" class="img-responsive" height="70" width="90">
               </div>
               <div class="col-md-3" v-else-if="image">
                  <img :src="image" class="img-responsive" height="70" width="90">
               </div>

					<div class="form-group">

						<label for="" class="form-control-label">Upload Image</label>
						<input type="file" name="image_path" v-on:change="onImageChange" class="form-control">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Description</label>
						<textarea v-model="item.item.item_detail.description" name="description" class="form-control form-control-lg " rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Item Value</label>
						<input v-model="item.item.item_detail.item_value" name="item_value" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Model</label>
						<input v-model="item.item.item_detail.model" name="model" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<input type="submit" value="Save Product" class="btn btn-primary" >
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
      item:{},
      image: '',
      imgsrc: ''
    }
    },
    created() {
       let uri = "http://127.0.0.1:8000/items/" + this.$route.params.id +  "/edit";
      this.axios.get(uri).then((response) => {
            this.item = response.data.data;
            this.imgsrc = this.item.item.item_detail.image_path;
        });
    },
    methods: {
     onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                this.imgsrc = '';

                reader.onload = (e) => {
                    vm.image = e.target.result;

                };
                reader.readAsDataURL(file);
            },
      updatePost(){
	     let uri = 'http://127.0.0.1:8000/items/' + this.$route.params.id;
	     if(this.image) 
	     {
	     	this.item.item.image_path = this.image;
          }else {
          	this.item.item.image_path = this.imgsrc;
          }
                    
	    
	    this.item.item.description = this.item.item.item_detail.description;
	    this.item.item.item_value = this.item.item.item_detail.item_value;
	    this.item.item.model = this.item.item.item_detail.model;
	    alert(this.item.item.product_name);
	    this.axios.put(uri, this.item.item).then((response) => {
	       this.$router.push({name: 'product'});
	    });
	}
    }
  }
</script>