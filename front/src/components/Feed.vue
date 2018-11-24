<template>
    <div class="container">
        <h1 class="text-center">Product Feeds</h1>
        <my-products></my-products>
    </div>
</template>
<script>
    import Products from './product/Products.vue'
export default {
    components:{
        'my-products': Products
    }
}
</script>
<style>

</style>