<template>

		<form @submit.prevent="addPost" enctype="multipart/form-data">
		<div class="row">
			<div class="col-6">
				<div class="form-group">					
					<label for="" class="form-control-label">Categories</label>
					<select v-model="item.category_id" name="category_id" class="form-control" >
						<option value="">Select a Category</option>
						<option  v-for="category in collection.categories" :value="category.id">{{ category.category_name}}</option>
						
					</select>
				</div>
				<div class="form-group">
					<label for="" class="form-control-label">Brands</label>
					
					<select v-model="item.brand_id" name="brand_id" class="form-control" >
						<option value="">Select a Brand</option>
						<option v-for="brand in collection.brands" :value="brand.id" >{{ brand.brand_name}}</option>

				</select>
				</div>
				<div class="form-group">
					<label for="" class="form-control-label">Product Name</label>
					<input v-model="item.product_name" name="product_name" ype="text" class="form-control form-control-lg ">
				</div>
				<div class="form-group">
					<label for="" class="form-control-label">Product Price</label>
					<input v-model="item.product_price" name="product_price"  type="text" class="form-control form-control-lg ">
				</div>
				<div class="form-group">
					<label for="" class="form-control-label">Product Stock</label>
					<input v-model="item.product_stock" name="product_stock" type="number" class="form-control form-control-lg ">
				</div>

			</div>

			<div class="col-6">
				<div class="col-md-3" v-if="image">
                              <img :src="image" class="img-responsive" height="70" width="90">
                           </div>
					<div class="form-group">

						<label for="" class="form-control-label">Upload Image</label>
						<input type="file" name="image_path" v-on:change="onImageChange" class="form-control">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Description</label>
						<textarea v-model="item.description" name="description" class="form-control form-control-lg " rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Item Value</label>
						<input v-model="item.item_value" name="item_value" type="text" class="form-control form-control-lg ">
					</div>
					<div class="form-group">
						<label for="" class="form-control-label">Model</label>
						<input v-model="item.model" name="model" type="text" class="form-control form-control-lg ">
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
	      collection:[],
	      image: ''
    	}
    },
    created() {
      let uri = 'http://127.0.0.1:8000/items/create';
      this.axios.get(uri).then(response => {
        this.collection = response.data.data;
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
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
		      addPost(){
			    let uri = 'http://127.0.0.1:8000/items';
			    this.item.image_path = this.image;
			    this.axios.post(uri, this.item).then((response) => {
			       this.$router.push({name: 'product'});
			    });
		}
    }
  }
</script>