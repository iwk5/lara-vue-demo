<template>
    <div class="container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <!-- Start form -->
                <div class="login-form">
                    <div class="form-group">
                        <label>Email address</label>
                        <input v-model="email" type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input v-model="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <button @click="login" class="btn btn-primary">Login</button>
                    </div>

                </div>
                <!-- End form -->
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        data (){
            return {
                email:'',
                password:''
            }
        },
        methods:{
            login(){
                var data= {
                    client_id:2,
                    client_secret:'WD8pLWtHcnYtal4usb3Ht29D8uKfFnxHQbUgxi5s',
                    grant_type:'password',
                    username:this.email,
                    password:this.password
                }
                this.$http.post('oauth/token',data).then(
                    response => {
                        this.$auth.setToken(response.body.access_token,response.body.expires_in+Date.now())
                        this.$router.push('/feed')
                        //console.log(response)
                    }
                    /*function (res) {
                    console.log(res)
                }*/

                )
            }
        }
    }
</script>
<style>
    .login-form{
        margin-top: 30px;
    }

</style>