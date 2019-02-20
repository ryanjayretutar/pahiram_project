<template>
	<div class="row">
		<div class="col-md-8 offset-md-1 my-5">
			<div class="input-group">
				<input v-model="search" name="search"  type="text" class="form-control form-control-lg ">
				<div class="input-group-prepend">
					<button @click.prevent="searchItems()" class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</div>
		<div class="col-md-3 my-5">
			<div class="input-group">
				<div class="input-group-prepend">
					<button @click.prevent="showAll()" class="btn btn-primary">Show All Items<i class="fas fa-ellipsis"></i></button>
				</div>
			</div>
		</div>
		<div v-if="showsearch==true">
			<div class="card-columns">
				<div class="card text-center" v-for="item in items" :key="item.id">
				  <div class="card-header">
				    {{ item.category.category_name }}
				  </div>
				  <img  :src="'/images/' + item.item_detail.image_path " class="card-img-top" style="width: 100px; height: 100px">
				  <div class="card-body">
				    <h5 class="card-title">{{item.product_name}}</h5>
				    <p class="card-text">{{item.item_detail.description}}</p>
				    <router-link :to="{name: 'edit', params: { id: item.id }}" class="btn btn-primary">View</router-link>
				    <router-link :to="{name: 'reserve', params: { id: item.id }}" class="btn btn-primary">Reserve</router-link>
				  </div>
				  <div class="card-footer text-muted">
				    2 days ago
				  </div>
				</div>
			</div>
		</div>
		<div v-if="showsearch==false">
			
		
			<div class="card-columns">
				<div class="card text-center" v-for="item in items" :key="item.id">
				  <div class="card-header">
				    {{ item.category.category_name }}
				  </div>
				  <img  :src="'/images/' + item.item_detail.image_path " class="card-img-top" style="width: 100px; height: 100px">
				  <div class="card-body">
				    <h5 class="card-title">{{item.product_name}}</h5>
				    <p class="card-text">{{item.item_detail.description}}</p>
				    <router-link :to="{name: 'edit', params: { id: item.id }}" class="btn btn-primary">View</router-link>
				    <router-link :to="{name: 'reserve', params: { id: item.id }}" class="btn btn-primary">Reserve</router-link>
				  </div>
				  <div class="card-footer text-muted">
				    2 days ago
				  </div>
				</div>
			</div>
			</div>
		</div>
</template>

<script>
    export default {
      data() {
        return {
          items: [],
          search: '',
          showsearch: false,
          searches: []
        }
      },
      created() {
      let uri = 'http://127.0.0.1:8000/items';
      this.axios.get(uri).then(response => {
        this.items = response.data.data;
      });
    },
    methods: {
    	searchItems(){
 			 let uri = 'http://127.0.0.1:8000/items/search/' + this.search;
			      this.axios.get(uri).then(response => {
			        this.items = response.data.data;
			        this.search = '';
			        this.showsearch = true;
			      });
    	},
    	showAll(){
    		let uri = 'http://127.0.0.1:8000/items';
		      this.axios.get(uri).then(response => {
		        this.items = response.data.data;
		        this.showsearch = false;
		      });
    	}
    }
  }

</script>



