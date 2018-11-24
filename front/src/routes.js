import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
const  router= new VueRouter({
    routes: [
            {
            path: '/login',
            component: require('./components/authentication/Login.vue').default,
            meta: {
                forVistors: true
            }
        },
        {
            path: '/register',
            component: require('./components/authentication/Register.vue').default,
            meta: {
                forVistors:true
            }
        },
        {
            path: '/feed',
            component: require('./components/Feed.vue').default,
            meta: {
                forAuth:true
            }
        },
        {
            path: '/products/create',
            component: require('./components/product/Create.vue').default,
            meta: {
                forAuth:true
            }
        },
        {
            path: '/products/:product/edit',
            component: require('./components/product/Edit.vue').default,
            meta: {
                forAuth:true
            }
        }
    ],
    mode:'history'
})
export default router
