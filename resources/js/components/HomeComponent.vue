<template>

	<div class="row">
			<div class="col-lg-6">
				
				<table class="table-info">
					<tr class="py-3">
						<th>Product Name</th>
						<th>Price</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Quantity</th>
						<th>Action</th>

					</tr>
					
					<tr v-for="item in items" :key="item.id">
	                    <!-- <td>{{ item.id }}</td> -->
	                    <td>{{ item.product_name }}</td>
	                    <td>{{ item.product_name }}</td>
	                    <td>{{ item.category.category_name }}</td>
	                    <td>{{ item.brand.brand_name }}</td>
	                    <td>{{ item.product_stock }}</td>
	                
	                    <td><router-link :to="{name: 'edit', params: { id: item.id }}" class="btn btn-primary">Edit</router-link></td>
	                    <td><button class="btn btn-danger">Delete</button></td>
                	</tr>
					
				</table>
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