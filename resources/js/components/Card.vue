<script setup>
import {Link, router} from "@inertiajs/vue3";
import {computed} from "vue";
const emits = defineEmits(['remove-from-favorites', 'remove-from-compare']);


const props = defineProps({
    product: {
        type: Object,
        required: true
    },
    cartProductIds:{
        type: Array
    },
    favoriteProductIds:{
        type: Array
    },
    compareProductIds:{
        type: Array
    }
});



const isInCart = computed(() => props.cartProductIds.includes(props.product.id));
const isInFavorite = computed(() => props.favoriteProductIds.includes(props.product.id));
const isInCompare = computed(() => props.compareProductIds.includes(props.product.id));
const addToCart = () => {
    router.post(route('cart.add'), {
        product_id: props.product.id,
        quantity: 1
    }, {
        preserveScroll: true,
        onSuccess: () => {
        }
    });
};

const addToFavorite = () => {
    router.post(route('favorites.add'), {
        product_id: props.product.id,
    }, {
        preserveScroll: true,
        onSuccess: () => {
        }
    });
};

const addToCompare = () => {
    router.post(route('compare.add'), {
        product_id: props.product.id,
    }, {
        preserveScroll: true,
        onSuccess: () => {
        }
    });
};



const removeItem = (productId) => {
    router.delete(route('favorites.remove', productId), {
        data: {
            product_id: productId,
        },
        preserveScroll: true,
        onSuccess: () => {
            emits('remove-from-favorites', productId);
            console.log('Товар удалён из избранного');
        },
    });
};

const removeItemCompare = (productId) => {
    router.delete(route('compare.remove', productId), {
        data: {
            product_id: productId,
        },
        preserveScroll: true,
        onSuccess: () => {
            emits('remove-from-compare', productId);
            console.log('Товар удалён из избранного');
        },
    });
};




</script>

<template>
    <div  class="product-card-clean grid items-center bg-white rounded-lg text-[#13181e] grid-areas-template w-full h-[400px] p-4 relative text-center overflow-hidden hoverText">
        <div class="labels mb-3 flex justify-start gap-1">
        </div>
        <div class=" image w-[180px] h-[180px] justify-self-center ">
            <Link :href="$route('product', product.slug)" class="image w-[180px] h-full">
<!--                <img :src="product.imageUrl || 'https://via.placeholder.com/180'" alt="image">-->
                <img :src="'/'+ product.mainImage" :alt="product.title">
            </Link>
        </div>
        <div class="category text-gray-400">{{props.product.category.title}}</div>
        <Link :href="$route('product', props.product.slug)" class="name ">{{props.product.title}}</Link>
        <div class="status flex justify-center gap-4 text-black">
            <div class="flex justify-center items-center ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
              {{props.product.rating}}
            </div>
            <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                </svg>
                {{props.product.reviewsCount}}
            </div>
        </div>
        <div class="prices-buttons flex justify-between items-center text-black">
            <div class="text-lg">
                {{props.product.price}} ₽

            </div>
            <div class="flex items-center gap-3">
                <div v-if="isInFavorite" @click="removeItem(product.id)">
                    <div >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill " viewBox="0 0 16 16">
                            <path class=" duration-200  transition-colors hover:fill-secondary-purple cursor-pointer" fill="#9701FE" fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                        </svg>
                    </div>
                </div>
                <div v-else  @click="addToFavorite">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-heart  duration-200 ease-in transition-colors hover:fill-primary-purple cursor-pointer" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                    </svg>
                </div>
                <div v-if="isInCompare" @click="removeItemCompare(product.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                        <path fill="#9701FE" class=" duration-200  transition-colors hover:fill-secondary-purple cursor-pointer" d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                    </svg>

                </div>
                <div v-else @click="addToCompare">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-bar-chart duration-200 ease-in transition-colors hover:fill-primary-purple cursor-pointer" viewBox="0 0 16 16">
                        <path d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z"/>
                    </svg>
                </div>

                <div v-if="isInCart" class="p-3 rounded-[10px] bg-dark-purple hover:bg-secondary-purple duration-200 cursor-pointer text-white ">
                   <Link :href="$route('basket')">
                       <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                           <path fill="white" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
                       </svg>
                   </Link>
                </div>
                <div v-else @click="addToCart" class="p-3 rounded-[10px] bg-primary-purple text-white hover:bg-dark-purple cursor-pointer duration-200">
                    <svg width="22" height="22" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="white"  fill-rule="evenodd" clip-rule="evenodd" d="M0 0.810711C0 0.595697 0.0842863 0.38949 0.234317 0.237452C0.384347 0.0854141 0.587832 0 0.800007 0H3.20003C3.37848 4.99584e-05 3.55179 0.0605612 3.6924 0.171911C3.83301 0.283261 3.93285 0.439055 3.97604 0.614519L4.62404 3.24284H23.2002C23.3217 3.24288 23.4416 3.27097 23.5509 3.32497C23.6601 3.37898 23.7557 3.45749 23.8305 3.55455C23.9053 3.6516 23.9573 3.76465 23.9825 3.8851C24.0078 4.00556 24.0056 4.13026 23.9762 4.24975L21.5762 13.9783C21.533 14.1537 21.4332 14.3095 21.2926 14.4209C21.152 14.5322 20.9786 14.5928 20.8002 14.5928H6.40006C6.22161 14.5928 6.0483 14.5322 5.90768 14.4209C5.76707 14.3095 5.66724 14.1537 5.62405 13.9783L2.57602 1.62142H0.800007C0.587832 1.62142 0.384347 1.53601 0.234317 1.38397C0.0842863 1.23193 0 1.02573 0 0.810711ZM8.00007 17.8356C7.57572 17.8356 7.16875 18.0065 6.86869 18.3105C6.56863 18.6146 6.40006 19.027 6.40006 19.4571C6.40006 19.8871 6.56863 20.2995 6.86869 20.6036C7.16875 20.9077 7.57572 21.0785 8.00007 21.0785C8.42442 21.0785 8.83139 20.9077 9.13145 20.6036C9.43152 20.2995 9.60009 19.8871 9.60009 19.4571C9.60009 19.027 9.43152 18.6146 9.13145 18.3105C8.83139 18.0065 8.42442 17.8356 8.00007 17.8356ZM4.80004 19.4571C4.80004 18.597 5.13719 17.7722 5.73731 17.164C6.33743 16.5559 7.15137 16.2142 8.00007 16.2142C8.84877 16.2142 9.66271 16.5559 10.2628 17.164C10.863 17.7722 11.2001 18.597 11.2001 19.4571C11.2001 20.3171 10.863 21.142 10.2628 21.7501C9.66271 22.3583 8.84877 22.6999 8.00007 22.6999C7.15137 22.6999 6.33743 22.3583 5.73731 21.7501C5.13719 21.142 4.80004 20.3171 4.80004 19.4571ZM19.2002 17.8356C18.7758 17.8356 18.3689 18.0065 18.0688 18.3105C17.7687 18.6146 17.6002 19.027 17.6002 19.4571C17.6002 19.8871 17.7687 20.2995 18.0688 20.6036C18.3689 20.9077 18.7758 21.0785 19.2002 21.0785C19.6245 21.0785 20.0315 20.9077 20.3316 20.6036C20.6316 20.2995 20.8002 19.8871 20.8002 19.4571C20.8002 19.027 20.6316 18.6146 20.3316 18.3105C20.0315 18.0065 19.6245 17.8356 19.2002 17.8356ZM16.0001 19.4571C16.0001 18.597 16.3373 17.7722 16.9374 17.164C17.5375 16.5559 18.3515 16.2142 19.2002 16.2142C20.0489 16.2142 20.8628 16.5559 21.4629 17.164C22.0631 17.7722 22.4002 18.597 22.4002 19.4571C22.4002 20.3171 22.0631 21.142 21.4629 21.7501C20.8628 22.3583 20.0489 22.6999 19.2002 22.6999C18.3515 22.6999 17.5375 22.3583 16.9374 21.7501C16.3373 21.142 16.0001 20.3171 16.0001 19.4571Z" />
                    </svg>
                </div>
            </div>

        </div>
    </div>
</template>

<style scoped>

</style>
