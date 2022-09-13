import './bootstrap';
import { createApp } from 'vue'
import { createRouter , createMemoryHistory } from 'vue-router'
import ProductsList from './ProductsPage/List.vue'
import CreateProduct from './ProductsPage/Create.vue'
import App from './App.vue'

const routes = [
    { path: '/', component: ProductsList },
    { path: '/create', component: CreateProduct },
]

const router = createRouter({history : createMemoryHistory() , routes})

const app = createApp(App).use(router)
app.mount('#app')
