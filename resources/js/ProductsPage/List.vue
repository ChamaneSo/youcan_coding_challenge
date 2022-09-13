<template>
    <div class="row mb-2">
        <div class="col-3">
            <select name="" class="form-control" id="" @change="filterProducts($event)">
                <option disabled selected>Choose a category</option>
                <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
            </select>
        </div>
        <div class="col-3">
            <button class="btn btn-primary" @click="sortProducts('name')">Sort By name</button>
        </div>
        <div class="col-3">
            <button class="btn btn-primary" @click="sortProducts('price')">Sort By price</button>
        </div>
        <div class="col-3">
            <router-link to="/create">Add a product</router-link>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Product</th>
            <th>Image</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="product in products.data">
                <td>{{ product.name}}</td>
                <td><img :src="product.image" class="img-fluid img-thumbnail" alt="" style="width: 50px"></td>
                <td>{{ product.description }}</td>
                <td>{{ product.price }}</td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-2">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a @click="getResults(products.current_page - 1 < 0 ? 1 : products.current_page - 1)" class="page-link" href="#">Previous</a></li>
                <li v-for="n in this.products.last_page" @click="getResults(n)" class="page-item"><a class="page-link" href="#">{{ n }}</a></li>
                <li class="page-item"><a class="page-link" @click="getResults(products.current_page + 1 > products.last_page  ? products.last_page : products.current_page + 1)" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                products : [],
                categories : [],
                category_id : null
            }
        },
        mounted() {
           /* axios.get('/products').then(data => {
                this.products = data.data.products.data
                this.categories = data.data.categories
            })*/
           this.getResults()
        },
        methods :{
            filterProducts(event) {
                axios.get('/products/filter/'+event.target.value).then(data => {
                    this.products = data.data
                })
            },
            sortProducts(sort){
                axios.get('/products/sort/'+sort).then(data => {
                    this.products = data.data
                })
            },
            getResults(page = 1) {
                axios.get('products?page=' + page)
                    .then(response => {
                        console.log(response.data.products)
                        this.products = response.data.products
                        this.categories = response.data.categories
                    });
            }
        },
    }
</script>

<style scoped>

</style>
