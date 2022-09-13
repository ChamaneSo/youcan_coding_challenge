<template>
    <div class="d-flex justify-content-center" v-if="error">
        <p class="text-danger">{{ error }}</p>
    </div>
    <form @submit="addProduct" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" v-model="product.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small v-if="productValidator.name" class="text-center text-danger">{{ productValidator.name }}</small>
            </div>
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleInputPassword1" v-model="product.price">
                <small class="text-center text-danger" v-if="productValidator.price">{{ productValidator.price}}</small>
            </div>
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea class="form-control" v-model="product.description"/>
                <small v-if="productValidator.description" class="text-center text-danger">{{ productValidator.description}}</small>
            </div>
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input type="file" class="form-control" @change="changeImage">
                <small class="text-danger" v-if="productValidator.image">{{ productValidator.image }}</small>
            </div>
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Categories</label>
                <select multiple class="form-control" v-model="selectedCategories">
                    <option selected disabled>Chooses categories</option>
                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
                <small class="text-danger" v-if="productValidator.categories">{{ productValidator.categories }}</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add The product</button>
    </form>
</template>

<script>
    export default {
       data(){
           return{
               product : { },
               productValidator: {},
               error : null,
               categories : [],
               selectedCategories : []
           }
       },
        mounted() {
            axios.get('/products').then(data => {
                this.categories = data.data.categories
            })
        },
        methods : {
           addProduct(e) {
               e.preventDefault()
               this.productValidator = {}
                axios.post('/products' ,
                    {
                        name : this.product.name,
                        price : this.product.price,
                        image : this.product.image,
                        description : this.product.description,
                        categories : [...this.selectedCategories].toString()
                    },
                    {headers: { 'content-type': 'multipart/form-data' }}
                    ).then((e) => {
                        this.$router.push('/')
                }).catch(err => {
                    if (err.response.status === 422)
                    {
                        this.productValidator.name = err.response.data.errors.name ? err.response.data.errors.name[0] : null
                        this.productValidator.description = err.response.data.errors.description ? err.response.data.errors.description[0] : null
                        this.productValidator.price = err.response.data.errors.price ? err.response.data.errors.price[0] : null
                        this.productValidator.image = err.response.data.errors.image ? err.response.data.errors.image[0] : null
                        this.productValidator.categories = err.response.data.errors.categories ? err.response.data.errors.categories[0] : null
                    }
                    else
                    {
                        this.error = err.message
                    }
                })
           },
            changeImage(e){
                this.product.image = e.target.files[0]
            }
        }
    }
</script>

<style scoped>

</style>
