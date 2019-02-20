<template>

		<form @submit.prevent="updatePost" enctype="multipart/form-data">

		<div class="row">
			<div class="col-6">
				<div class="col-md-4 offset-md-3" v-if="image">
	                  <img :src="'/images/' + image" class="img-responsive" height="250" width="200">
	            </div>
				<h1 class="text-center">{{ item.item.product_name}}</h1>
				<div class="row mt-3">
					<h5 class="col-md-3">Owned By:</h5>
					<p class="col-md-3">{{ item.item.user.user_details.first_name}} {{ item.item.user.user_details.last_name}}</p>
				</div>
				<div class="row mt-3">
					<h5 class="col-md-3">Brand</h5>
					<p class="col-md-3">{{ item.item.brand.brand_name}}</p>
				</div>
				<div class="row mt-3">
					<h5 class="col-md-3">Category</h5>
					<p class="col-md-3">{{ item.item.category.category_name}}</p>
				</div>
				<div class="row mt-3">
					<h5 class="col-md-3">Description</h5>
					<p class="col-md-9">{{ item.item.item_detail.description}}</p>
				</div>
				<div class="row mt-3">
					<h5 class="col-md-3">Available as early as</h5>
					<p class="col-md-9">March 2, 2019</p>
				</div>
				<div class="row mt-3">
					<h5 class="col-md-3">Model</h5>
					<p class="col-md-9">{{ item.item.item_detail.model}}</p>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group row">
				  <label for="example-datetime-local-input" class="col-2 col-form-label">Reserve On</label>
				  <div class="col-10">
				    <input class="form-control" type="datetime-local" id="example-datetime-local-input" >
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-datetime-local-input" class="col-2 col-form-label">Rent Until</label>
				  <div class="col-10">
				    <input class="form-control" type="datetime-local"  id="example-datetime-local-input">
				  </div>
				</div>
				<div class="form-group">
					<input type="submit" value="Reserve Item" class="btn btn-primary" >
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
	      image: ''
	    }
    },
    created() {
       let uri = "http://127.0.0.1:8000/items/" + this.$route.params.id +  "/edit";
      this.axios.get(uri).then((response) => {
            this.item = response.data.data;
            this.image = this.item.item.item_detail.image_path;
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
      updatePost(){
	     let uri = 'http://127.0.0.1:8000/items/' + this.$route.params.id;
	    this.item.item.image_path = this.image;
	    this.item.item.description = this.item.item.item_detail.description;
	    this.item.item.item_value = this.item.item.item_detail.item_value;
	    this.item.item.model = this.item.item.item_detail.model;
	    this.axios.put(uri, this.item.item).then((response) => {
	       this.$router.push({name: 'product'});
	    });
	}
    }
  }
</script>