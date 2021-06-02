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
import MahasiswaEdit from '../views/mahasiswa/Edit'
// import MahasiswaShow from '../views/mahasiswa/Show'

// KRITERIA
import kriteriaRead from '../views/kriteria/Table'
import kriteriaCreate from '../views/kriteria/Create'
import kriteriaEdit from '../views/kriteria/Edit'

// THSELEKSI
import thseleksiRead from '../views/thseleksi/Table'
import thseleksiCreate from '../views/thseleksi/Create'
import thseleksiEdit from '../views/thseleksi/Edit'




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
            // MAHASISWAROUTER
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

            //END MAHASISWAROUTER


            // KRITERIAROUTER
        {
            path:'/kriteria/table',
            name:'kriteria.table',
            meta: {
                auth: true
              },
            component:kriteriaRead
        },
        {
            path:'/kriteria/create',
            name:'kriteria.create',
            meta: {
                auth: true
              },
            component: kriteriaCreate
        },
        {
            path:'/kriteria/:id/edit',
            name:'kriteria.edit',
            meta: {
                auth: true
              },
            component:kriteriaEdit
        },

            //END KRITERIAROUTER


            // THSELEKSIROUTER
        {
            path:'/thseleksi/table',
            name:'thseleksi.table',
            meta: {
                auth: true
              },
            component:thseleksiRead
        },
        {
            path:'/thseleksi/create',
            name:'thseleksi.create',
            meta: {
                auth: true
              },
            component: thseleksiCreate
        },
        {
            path:'/thseleksi/:id/edit',
            name:'thseleksi.edit',
            meta: {
                auth: true
              },
            component:thseleksiEdit
        },

            //END THSELEKSIROUTER

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
