<template>
    <div>
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                  <h3>DATA KRITERIA</h3>
               </div>
               <div class="col-lg-6 d-flex flex-row-reverse">
                  <router-link :to="{name:'kriteria.create'}" class="btn btn-primary btn-lg mb-2"><i class="feather icon-plus-square"></i>&nbsp;Tambah</router-link>

               </div>
           </div>
        <table class="table table-bordered table-striped text-center table-hover table-sm">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <td>{{ index+1 }}</td>

                        <!-- <td><router-link :to="{name:'mahasiswa.show',params:{dataId:data.id}}">{{data.nim}} - {{data.nama}}</router-link></td> -->
                        <!-- <td>{{note.subject}}</td> -->
                        <td>{{data.nama}}</td>
                        <td>{{data.nilai}}</td>
                        <td>

                            <button class="btn btn-secondary btn-sm"><i class="feather icon-sunrise"></i> Detail</button>
                            <router-link :to="{name:'kriteria.edit',params:{id:data.id}}" class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></router-link>

                            <delete-data class="btn btn-danger btn-sm" :endpoint="data.id"></delete-data>
                             </td>
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
            let {data} = await axios.get('/api/kriteria');
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
