<template>
    <nav class="container navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <router-link tag="li" to="/login" class="nav-item" v-if="!isAuth">
                    <a>Login</a>
                </router-link>
                <router-link tag="li" to="/register" class="nav-item" v-if="!isAuth">
                    <a>Register</a>
                </router-link>
                <router-link tag="li" to="/feed" class="nav-item" v-if="isAuth">
                    <a>Feed</a>
                </router-link>
                <router-link tag="li" to="/products/create" class="nav-item" v-if="isAuth">
                    <a>Create</a>
                </router-link>
                <router-link tag="li" to="/logout" class="nav-item" v-if="isAuth">
                    <a>Logout</a>
                </router-link>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</template>

<script>
    export default {
        data(){
            return {
                isAuth: false
            }
        },
        created(){
            this.isAuth= this.$auth.isAuthenticated();

            this.setAuthenticatedUser();
        },
        methods:{
            setAuthenticatedUser (){
                this.$http.get('api/user').then(response => {
                    this.$auth.setAuthenticatedUser(response.body)

                    console.log(this.$auth.getAuthenticatedUser())
                })
            }
        }
    }
</script>

<style>
    .nav-item a{
        color: #fff;
        margin-right: 10px;
    }
    .router-link-active a{
        color:lawngreen;
    }
</style>