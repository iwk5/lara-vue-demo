<template>
    <div class="container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <!-- Start form -->
                <form class="register-form">
                    <div class="form-group">
                        <label>Name</label>
                        <input v-model="name" type="text" class="form-control" id="name" aria-describedby="namehelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input v-model="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input v-model="password" type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>

                </form>
                <!-- End form -->
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        data (){
            return {
                name:'',
                email:'',
                password:''
            }
        }
    }
</script>
<style>
    .register-form{
        margin-top: 30px;
    }

</style>