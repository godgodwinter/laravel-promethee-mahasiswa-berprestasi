<template>
    <div>
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                  <h3>DATA KRITERIA </h3>
               </div>
               <div class="col-lg-6 d-flex flex-row-reverse">
                  <router-link :to="{name:'kriteriath.create',params:{id:this.$route.params.id}}" class="btn btn-primary btn-lg mb-2"><i class="feather icon-plus-square"></i>&nbsp;Tambah</router-link>
                  <router-link :to="{name:'dataproses.table',params:{id:this.$route.params.id}}" class="btn btn-outline-dark btn-lg mb-2"><i class="feather icon-skip-back"></i>&nbsp;Kembali</router-link> 

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
                            <router-link :to="{name:'kriteriadetail.show',params:{id:data.id}}" class="btn btn-secondary btn-sm"><i class="feather icon-sunrise"></i> Detail</router-link>
                            <router-link :to="{name:'kriteriath.edit',params:{id:data.id}}" class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></router-link>

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
            thseleksi_id:this.$route.params.id,
            datas:[],
        }
    },

    mounted(){
        this.getNotes();
    },

    methods:{

        async getNotes(){
            let {data} = await axios.get(`/api/kriteriath/${this.$route.params.id}`);
            this.datas = data.datas
console.log(`/api/kriteriath/${this.$route.params.id}`);
            // let response = await axios.get('/api/notes');
            // this.notes = response.data.dat
        }
        

    }

}
</script>

<style>
</style>
