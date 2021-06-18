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


// KRITERIATH
import kriteriathRead from '../views/kriteriath/Table'
import kriteriathCreate from '../views/kriteriath/Create'
import kriteriathEdit from '../views/kriteriath/Edit'

// THSELEKSI
import thseleksiRead from '../views/thseleksi/Table'
import thseleksiCreate from '../views/thseleksi/Create'
import thseleksiEdit from '../views/thseleksi/Edit'


// KRITERIADETAIL
import kriteriadetailRead from '../views/kriteriadetail/Table'
import kriteriadetailCreate from '../views/kriteriadetail/Create'
import kriteriadetailEdit from '../views/kriteriadetail/Edit'
import kriteriaShow from '../views/kriteriadetail/Show'

// DATAPROSES
import dataprosesRead from '../views/dataproses/Table'


// PROSESHITUNG
import proseshitungRead from '../views/proseshitung/Table'



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


            // KRITERIATHROUTER
        {
          path:'/kriteriath/table/:id',
          name:'kriteriath.table',
          meta: {
              auth: true
            },
          component:kriteriathRead
      },
      {
          path:'/kriteriath/create/:id',
          name:'kriteriath.create',
          meta: {
              auth: true
            },
          component: kriteriathCreate
      },
      {
          path:'/kriteriath/:id/edit',
          name:'kriteriath.edit',
          meta: {
              auth: true
            },
          component:kriteriathEdit
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


            // KRITERIADETAILROUTER
        {
            path:'/kriteriadetail/table',
            name:'kriteriadetail.table',
            meta: {
                auth: true
              },
            component:kriteriadetailRead
        },
        {
            path:'/kriteriadetail/:id/create',
            name:'kriteriadetail.create',
            meta: {
                auth: true
              },
            component: kriteriadetailCreate
        },
        {
            path:'/kriteriadetail/:id/edit',
            name:'kriteriadetail.edit',
            meta: {
                auth: true
              },
            component:kriteriadetailEdit
        },
        {
            path:'/kriteriadetail/:id/show',
            name:'kriteriadetail.show',
            meta: {
                auth: true
              },
            component:kriteriaShow
        },

            //END KRITERIADETAILROUTER

            {
                path:'/dataproses/table/:id',
                name:'dataproses.table',
                meta: {
                    auth: true
                  },
                component:dataprosesRead
            },
            {
                path:'/proseshitung/table/:id',
                name:'proseshitung.table',
                meta: {
                    auth: true
                  },
                component:proseshitungRead
            },



            // DATAPROSESROUTER

            //END DATAPROSESROUTER

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
