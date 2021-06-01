import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Contact from '../views/Contact.vue'
import NewNote from '../views/notes/Create'
import TableofNote from '../views/notes/Table'
import ShowTheNote from '../views/notes/Show'
import EditNote from '../views/notes/Edit'
// MAHASISWA
import TableofMahasiswa from '../views/mahasiswa/Table'
import MahasiswaCreate from '../views/mahasiswa/Create'
// import MahasiswaShow from '../views/mahasiswa/Show'
import MahasiswaEdit from '../views/mahasiswa/Edit'


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
            // MAHASISWA
        {
            path:'/mahasiswa/table',
            name:'mahasiswa.table',
            meta: {
                auth: true
              },
            component:TableofMahasiswa
        },
        {
            path:'/mahasiswa/create',
            name:'mahasiswa.create',
            meta: {
                auth: true
              },
            component: MahasiswaCreate
        },
        {
            path:'/mahasiswa/:id/edit',
            name:'mahasiswa.edit',
            meta: {
                auth: true
              },
            component:MahasiswaEdit
        },

            //END MAHASISWA

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
