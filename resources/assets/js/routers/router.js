import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);
import BlogList from  '../components/Blogs/BlogList.vue'
import  BlogEdit from '../components/Blogs/BlogEdit.vue'
import  BlogCreate from '../components/Blogs/BlogCreate.vue'
import BlogDetail from '../components/Blogs/BlogDetail.vue'


let router  = new Router({
    routes: [
        // {path: '*', redirect: "/"},
        {
            path: "/",
            name: 'bloglist',
            component: BlogList
        },
        {
            path: "/blogedit",
            name: 'blogedit',
            component: BlogEdit,
        },

        {
            path: "/blogcreate",
            name: 'blogcreate',
            component: BlogCreate,
        },
        {
            path: "/blogdetail/:id",
            name: 'blogdetail',
            component: BlogDetail,
        }
    ],
    mode: 'history',
    hashbang:false,
    history:true,
    linkActiveClass:'active'

})
export default router