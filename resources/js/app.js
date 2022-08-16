import './bootstrap'
import '../css/app.css'
// import { createApp } from 'vue'
import { createApp } from 'vue/dist/vue.esm-bundler'
import { productStore } from './store/productStore'

import Shop from './pages/Shop.vue'

const app = createApp({})
app.use(productStore)
app.component('shop-component', Shop)
app.mount("#app")
