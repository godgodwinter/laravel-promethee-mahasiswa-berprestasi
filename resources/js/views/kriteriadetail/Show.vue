<template>
    <div>
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                  <h3>DETAIL KRITERIA " {{ judulkriteria }} " </h3>
               </div>
               <div class="col-lg-6 d-flex flex-row-reverse">
                   <router-link :to="{name:'kriteriadetail.create',params:{kriteria_id:id}}" class="btn btn-primary btn-lg mb-2 "><i class="feather icon-plus-square"></i>&nbsp;Tambah</router-link>&nbsp;
                    <router-link :to="{name:'kriteria.table'}" class="btn btn-outline-dark btn-lg mb-2"><i class="feather icon-skip-back"></i>&nbsp;Kembali</router-link>&nbsp;

               </div>
           </div>
        <table class="table table-bordered table-striped text-center table-hover table-sm">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <td>{{ index+1 }}</td>

                        <!-- <td><router-link :to="{name:'mahasiswa.show',params:{dataId:data.id}}">{{data.nim}} - {{data.nama}}</router-link></td> -->
                        <!-- <td>{{note.subject}}</td> -->
                        <td> {{data.nama}}</td>
                        <td>{{data.bobot}}</td>
                        <td>
                            <!-- <i class="fa fa-pencil-square-o"></i> -->

                            <!-- <button class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></button> -->
                            <router-link :to="{name:'kriteriadetail.edit',params:{id:data.id}}" class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></router-link>

                            <delete-data class="btn btn-danger btn-sm" :endpoint_kriteriaId="data.kriteria_id" :endpoint_id="data.id "></delete-data>
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
            id:'',
            kriteria_id:'',
            judulkriteria:'',
            datas:[],
            parrentdata:[],
        }
    },

    mounted(){
        // console.log(id);
            // console.log(this.$route.params.id);
        this.getNotes();
    },

    methods:{

        async getNotes(){
            let {data} = await axios.get(`/api/kriteriadetail/${this.$route.params.id}/show`);
            this.datas = data.datas
            this.parrentdata = data.parrentdata
            for(let value of Object.values(this.parrentdata)){

            // console.log(value.nama);
            this.judulkriteria= value.nama;
            }
            // this.judulkriteria = obj(this.parrentdata.nama)
            // console.log(this.parrentdata.values(nama));

            // let response = await axios.get('/api/notes');
            // this.notes = response.data.dat
        }
            // console.log(this.notes);

    }

}
</script>

<style>
</style>
