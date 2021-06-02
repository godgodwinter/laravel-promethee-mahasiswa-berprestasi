<template>
    <div>
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                  <h3>DATA KRITERIA AAA</h3>
               </div>
               <div class="col-lg-6 d-flex flex-row-reverse">
                  <router-link :to="{name:'mahasiswa.create'}" class="btn btn-primary btn-lg mb-2"><i class="feather icon-plus-square"></i>&nbsp;Tambah</router-link>

               </div>
           </div>
        <table class="table table-bordered table-striped text-center table-hover table-sm">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <td>{{ index+1 }}</td>

                        <!-- <td><router-link :to="{name:'mahasiswa.show',params:{dataId:data.id}}">{{data.nim}} - {{data.nama}}</router-link></td> -->
                        <!-- <td>{{note.subject}}</td> -->
                        <td>{{data.nim}} - {{data.nama}}</td>
                        <td>{{data.jurusan}}</td>
                        <td>{{data.jk}}</td>
                        <td>{{data.hp}}</td>
                        <td>
                            <!-- <i class="fa fa-pencil-square-o"></i> -->

                            <!-- <button class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></button> -->
                            <router-link :to="{name:'mahasiswa.edit',params:{id:data.id}}" class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></router-link>

                            <delete-data class="btn btn-danger btn-sm" :endpoint="data.id"></delete-data>
                            <!-- <button class="btn btn-danger btn-sm"><i class="feather icon-delete"></i></button> -->
                            <!-- <delete-note :endpoint="data.id" /> -->
                        </td>
                        <!-- <td><router-link :to="{name:'notes.edit',params:{noteSlug:note.slug}}">Edit   </router-link> || <delete-note :endpoint="note.slug" /> </td> -->
                    </tr>
                </tbody>
        </table>
       </div>
    </div>
</template>

<script>
import DeleteData from './Delete'
export default {

    components:{
            DeleteData
    },

    data(){
        return{
            datas:[],
        }
    },

    mounted(){
        this.getNotes();
    },

    methods:{

        async getNotes(){
            let {data} = await axios.get('/api/mahasiswa');
            this.datas = data.data

            // let response = await axios.get('/api/notes');
            // this.notes = response.data.dat
        }
            // console.log(this.notes);

    }

}
</script>

<style>
</style>
