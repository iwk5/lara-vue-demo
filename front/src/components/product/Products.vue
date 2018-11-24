<template>
    <div class="row">
        <my-product v-for="product in products"
                    @delete-product="deleteProduct(product)"
                    :authenticatedUser="authenticatedUser"
                    :product="product">
        </my-product>
    </div>

</template>
<script>
    import Product from './Product.vue'
    import swal from 'sweetalert'
    export default {
        data (){
            return{
                products : []
            }
        },
        computed:{
            authenticatedUser (){
                return this.$auth.getAuthenticatedUser();
            }
        },
        components:{
            'my-product': Product
        },
        methods:{
            deleteProduct(product){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Product!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            this.$http.delete('api/products/'+product.id).then(response =>{
                                let index= this.products.indexOf(product);
                                this.products.splice(index,1)
                            })
                            swal("Poof! Your Product has been deleted!", {
                                icon: "success",
                            });
                        } else {
                            swal("Your Product is safe!");
                        }
                    });
            }
        }

        ,
        created(){
            this.$http.get('api/products').then(
                response => {
                    this.products=response.body
                }
            )
        }
    }
</script>
<style>

</style>