<template>


  <!-- <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark"> <i data-feather="circle"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Customers
        </a>
      </li>
    </ul>
    <hr>

  </div> -->



    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <router-link class="navbar-brand" href="/" to="/">
             <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      PROMETHEE</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link" exact>Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'kriteria.table'}">Kriteria</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'mahasiswa.table'}">Mahasiswa</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'thseleksi.table'}">Proses</router-link>
                    </li>
                    <!-- <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'pages.about'}">Kriteria</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'pages.about'}">About</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'pages.contact'} ">Contact Us</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'notes.create'} ">New Notes</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'notes.table'}">Table Notes</router-link>
                    </li> -->
                    <!-- <li class="nav-item d-flex">
                        <a class="btn btn-light" @click="logout">Logout</a>
                    </li> -->
                </ul>
                    <form class="d-flex">
                          <a class="btn btn-dark btn-lg" @click="logout"><i class="feather icon-log-out"></i>&nbsp; Logout</a>
                    </form>

            </div>
        </div>
    </nav>


</template>

<script>
    export default {
         methods: {
            logout() {
                axios.post('/logout')
                    .then(() => location.href = '/home')
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        // data: () => ({
        //      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        //      }),
        // methods:{
        //     logout:function(){
        //        axios.post('/logout').then(response => {
        //           if (response.status === 302 || 401) {
        //             console.log('logout')

        //              window.location.href = '/';
        //           }
        //           else {
        //             // throw error and go to catch block
        //           }
        //         }).catch(error => {

        //       });
        //     },
        // },
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
