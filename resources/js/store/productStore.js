import { createStore } from "vuex";

export const productStore = createStore({
    state: {
        products: {
            current_page: 1,
            last_page: 1,
            per_page: 8,
            data: [],
        },
        isLoading: false,
    },
    mutations: {
        setProducts(state, response) {
            const { data, meta, mergeWithOldProducts } = response;
            state.products.data = mergeWithOldProducts ? state.products.data.concat(data) : data;
            state.products.current_page = meta.current_page;
            state.products.last_page = meta.last_page;
            state.isLoading = false;
        },
    },
});
