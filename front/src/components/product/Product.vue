<template>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                <img src="">
                <div class="caption">
                    <h3>{{product.name}}</h3>
                    <p>{{ product.price }}</p>
                    <hr>
                    <p>
                        <a href="#" class="btn btn-default">
                            Wish list
                        </a>
                        <a href="#" class="btn btn-success">
                            Buy
                        </a>
                    </p>
                    <hr>
                    <p v-if="product.user_id==authenticatedUser.id">
                        <a href="javascript:(void)" class="btn btn-danger" @click="$emit('delete-product')">
                            Delete
                        </a>
                        <router-link class="btn btn-danger" :to="'/products/'+product.id+'/edit'">
                            Edit
                        </router-link>
                    </p>
                </div>
            </div>
            </div>
        </div>

</template>
<script>
    export default {
                props : ['product','authenticatedUser']
        }
</script>
<style>
    .card{
        margin-bottom: 15px;
    }
</style>