<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <br>
                <h2>Creat Product</h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" v-model="product.name"/>
                        </div>
                        <div class="form-group">
                            <label>Price:</label>
                            <input type="number" class="form-control" v-model="product.price"/>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea type="text" class="form-control" v-model="product.description"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success pull-xs-right" @click="update" v-show="product.name && product.price && product.description">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import swal from "sweetalert"
    export default {
        created(){
            this.getProduct();
        },
        data(){
            return {
                product: {}
            }
        },
        methods:{
            getProduct(){
                this.$http.get('api/products/'+this.$route.params.product).then( response =>
                    {
                        this.product=response.body;
                    }
                )
            },
            update(){
                this.$http.put('api/products/'+this.$route.params.product,this.product).then(
                    response => {
                       swal("Updated!","Product has been updated","success")
                    }
                )
            }
        }
    }
</script>