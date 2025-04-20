
import { createRouter, createWebHistory } from "vue-router";
import FrontendLayout from '../layouts/FrontendLayout.vue'
import Home from "@/views/Home.vue";
import Login from "@/views/Login.vue";
import Memberregistration from "@/views/MemberRegistration.vue"; 
import AdminLayout from "@/layouts/AdminLayout.vue";
import Dashboard from "@/views/Admin/Dashboard.vue";
import Settings from "@/views/Admin/Settings.vue";


const routes = [
    
        {path: '/',
    
                component: FrontendLayout,
                children:[
                    { path: '', name: 'Home', component: Home },
                ]
        },
        {
            path: '/admin',
            component: AdminLayout,
            children: [
              { path: '', name: 'Dashboard', component: Dashboard },
              { path: 'settings', name: 'Settings', component: Settings }
            ]
          }

    // {path: '/',
    //     name: 'Home', 
    //     component: Home},


    // {path: '/login', component: Login},
    // {path: '/registration', component: Memberregistration},




    

]
const router = createRouter({
    history: createWebHistory(),
    routes,
})
export default router;
