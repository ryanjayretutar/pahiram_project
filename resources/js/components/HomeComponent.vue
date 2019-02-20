<template>

	
		<div class="row">
			<div class="card-columns">
				<div class="card text-center" v-for="item in items" :key="item.id">
				  <div class="card-header">
				    {{ item.category.category_name }}
				  </div>
				  <img  :src="'/images/' + item.item_detail.image_path " class="img-responsive card-img-top" >
				  <div class="card-body">
				    <h5 class="card-title">{{item.product_name}}</h5>
				    <p class="card-text">{{item.item_detail.description}}</p>
				    <router-link :to="{name: 'edit', params: { id: item.id }}" class="btn btn-primary">View</router-link>
				    <router-link :to="{name: 'reserve', params: { id: item.id }}" class="btn btn-primary">View</router-link>
				  </div>
				  <div class="card-footer text-muted">
				    2 days ago
				  </div>
				</div>
			</div>
		</div>

</template>

<script>
    export default {
      data() {
        return {
          items: []
        }
      },
      created() {
      let uri = 'http://127.0.0.1:8000/items';
      this.axios.get(uri).then(response => {
        this.items = response.data.data;
      });
    }
  }
</script>



