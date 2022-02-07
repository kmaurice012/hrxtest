import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/Login.vue'

Vue.use(VueRouter)

const routes = [{
    path: '/',
    name: 'Home',
    component: Login
  },
  // {
  //   path: '/about',
  //   name: 'About',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  // }
  {
    path: '/user/dashboard',
    // name: 'Dashboard',
    component: () => import('../views/UserDashboard.vue'),
    children: [{
        path: '',
        name: 'User Dashboard',
        component: () => import('../components/user/Default.vue'),
      },
      {
        path: 'compliances',
        name: 'User Compliances',
        component: () => import('../components/user/CompliancesList.vue'),
      },
      {
        path: 'comply/:id',
        name: 'User Comply',
        component: () => import('../components/user/ComplyForm.vue'),
      },
      {
        path: 'user-report',
        name: 'User Reports',
        component: () => import('../components/user/UserReports.vue'),
      },
    ]
  },
  {
    path: '/admin/dashboard',
    // name: 'Dashboard',
    component: () => import('../views/AdminDashboard.vue'),
    children: [{
        path: '',
        name: 'Dashboard',
        component: () => import('../components/admin/Default.vue'),
      },
      {
        path: 'list-codes',
        name: 'Codes',
        component: () => import('../components/admin//Codes.vue'),
      },
      {
        path: 'list-companies',
        name: 'Companies',
        component: () => import('../components/admin/Companies.vue'),
      },
      {
        path: 'company_codes/:id',
        name: 'Comliances',
        component: () => import('../components/admin/Compliances.vue'),
      },
      {
        path: 'compliance_period',
        name: 'Compliances Period',
        component: () => import('../components/admin/CompliancePeriods.vue'),
      },

      {
        path: 'verify-compliance/:id',
        name: 'Admin Verify Compliance',
        component: () => import('../components/admin/VerifyForm.vue'),
      },
      {
        path: 'user-report',
        name: 'Company Reports',
        component: () => import('../components/admin/UserReports.vue'),
      },
      {
        path: 'admin-reports',
        name: 'Admin Compliances Report',
        component: () => import('../components/admin/ReportCompliances.vue'),
      },
      {
        path: 'view-compliance-reports',
        name: 'Admin Compliances Report',
        component: () => import('../components/admin/AdminReports.vue'),
      },
    ]
  },
  // {
  //   path: '/compliances',
  //   name: 'Compliances',
  //   component:  () => import('../views/Dashboard.vue')
  // },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router