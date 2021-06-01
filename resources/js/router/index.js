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
            component:Home
        },
        {
            path:'/about',
            name:'pages.about',
            component:About
        },
        {
            path:'/contact',
            name:'pages.contact',
            component:Contact
        },
        {
            path:'/notes/create',
            name:'notes.create',
            component: NewNote
            // component:require('../views/notes/Create.vue')
        },
        {
            path:'/notes/table',
            name:'notes.table',
            component:TableofNote
        },
        {
            path:'/notes/:noteSlug',
            name:'notes.show',
            component:ShowTheNote
        },
        {
            path:'/notes/:noteSlug/edit',
            name:'notes.edit',
            component:EditNote
        },
    ]
    }
