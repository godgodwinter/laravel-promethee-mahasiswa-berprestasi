import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Contact from '../views/Contact.vue'
import NewNote from '../views/notes/Create'
import TableofNote from '../views/notes/Table'
import ShowTheNote from '../views/notes/Show'
import EditNote from '../views/notes/Edit'


export default {
    mode:'history',
    linkActiveClass:'active',

    routes:[
        {
            path:'/',
            name:'home',
            meta: {
                auth: true
              },
            component:Home
        },
        {
            path:'/about',
            name:'pages.about',
            meta: {
                auth: true
              },
            component:About
        },
        {
            path:'/contact',
            name:'pages.contact',
            meta: {
                auth: true
              },
            component:Contact
        },
        {
            path:'/notes/create',
            name:'notes.create',
            meta: {
                auth: true
              },
            component: NewNote
            // component:require('../views/notes/Create.vue')
        },
        {
            path:'/notes/table',
            name:'notes.table',
            meta: {
                auth: true
              },
            component:TableofNote
        },
        {
            path:'/notes/:noteSlug',
            name:'notes.show',
            meta: {
                auth: true
              },
            component:ShowTheNote
        },
        {
            path:'/notes/:noteSlug/edit',
            name:'notes.edit',
            meta: {
                auth: true
              },
            component:EditNote
        },
        {
            path:'/logout',
            name:'logout.go',
            meta: {
                auth: true
              },
            component:EditNote
        },
    ]
    }
