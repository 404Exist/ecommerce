<template>

    <div class="container grid lg:grid-cols-4 gap-6 pt-4 pb-16 items-start relative">
        <!-- <div role="status">
            <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div> -->
        <ShopSide></ShopSide>

        <div class="col-span-3">
            <div class="mb-4 flex items-center">
                <button
                    class="bg-primary border border-primary text-white px-10 py-3 font-medium rounded uppercase hover:bg-transparent hover:text-primary transition lg:hidden text-sm mr-3 focus:outline-none">
                    Filter
                </button>
                <select
                    class="w-44 text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                    <option>Default sorting</option>
                    <option>Price low-high</option>
                    <option>Price high-low</option>
                    <option>Latest product</option>
                </select>
                <div class="flex gap-2 ml-auto">
                    <div
                        class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                        <i class="fa fa-th"></i>
                    </div>
                    <div
                        class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa fa-list"></i>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-3 sm:grid-cols-2 gap-6">
                <template v-if="$store.state.isLoading">
                    <div class="animate-pulse" v-for="count in [1, 2, 3]" :key="count">
                        <div class="bg-slate-700 h-64"></div>
                        <div class="pt-4 pb-3 px-4">
                            <div class="flex-1 space-y-6 py-1">
                                <div class="h-2 bg-slate-700 rounded"></div>
                                <div class="space-y-3">
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-1"></div>
                                    </div>
                                    <div class="h-2 bg-slate-700 rounded"></div>
                                    <div class="h-2 bg-slate-700 rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <div v-for="product in this.$store.state.products.data" :key="product.id" class="group rounded bg-white shadow overflow-hidden">
                    <div class="relative">
                        <img :src="product.image" class="w-full">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a :href="product.url"
                                class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center">
                                <i class="fa fa-search"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center">
                                <i class="fa fa-heart"></i>
                            </a>
                        </div>
                    </div>

                    <div class="pt-4 pb-3 px-4">
                        <a :href="product.url">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                {{ product.title }}
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-roboto font-semibold">{{ product.price }}</p>
                            <p class="text-sm text-gray-400 font-roboto line-through">{{ product.old_price }}</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400" v-html="product.stars_view"></div>
                            <div class="text-xs text-gray-500 ml-3">({{ product.reviews_count }})</div>
                        </div>
                    </div>

                    <a href="#"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">
                        Add to Cart
                    </a>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
import ShopSide from '../components/ShopSide.vue'
export default {
    components: { ShopSide },
    mounted: function() {
        this.getProducts();
        this.moreProductsOnScroll();
    },
    methods: {
        getProducts: function() {
            let { per_page, current_page } = this.$store.state.products;
            this.$store.state.isLoading = true;
            axios.get(`${route('api.products.index')}?page=${current_page}&limit=${per_page}`)
                .then(response =>  this.$store.commit('setProducts', {...response.data, mergeWithOldProducts: true}))
                .catch(err => console.log(err));
        },
        moreProductsOnScroll: function() {
            window.onscroll = () => {
                let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight >= document.documentElement.offsetHeight - 200;
                if (bottomOfWindow) this.getMoreProducts();
            }
        },
        getMoreProducts: function() {
            let { current_page, last_page } = this.$store.state.products;
            if (current_page < last_page) {
                this.$store.state.products.current_page++;
                this.getProducts();
            }
        },
    },
}
</script>

