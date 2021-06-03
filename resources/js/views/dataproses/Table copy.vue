<template>
    <div>
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                  <h3>DATA PROSES</h3>
               </div>
               <div class="col-lg-6 d-flex flex-row-reverse">
                  <!-- <router-link :to="{name:'mahasiswa.create'}" class="btn btn-primary btn-lg mb-2"><i class="feather icon-plus-square"></i>&nbsp;Tambah Peserta</router-link> -->

                <template>

                    <button type="submit" class="btn btn-primary mb-2" @click="openModal">Tambah Peserta</button>

                    <modal v-show="isModalVisible" @close-modal="closeModal" />

                </template>

               </div>
           </div>
        <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th width="5%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <td  class="text-center">{{ index+1 }}</td>

                        <!-- <td><router-link :to="{name:'mahasiswa.show',params:{dataId:data.id}}">{{data.nim}} - {{data.nama}}</router-link></td> -->
                        <!-- <td>{{note.subject}}</td> -->
                        <td class="text-left">&nbsp;{{data.nim}} - {{data.nama}} </td>
                        <td  class="text-center">
                            <!-- <i class="fa fa-pencil-square-o"></i> -->

                            <!-- <button class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></button> -->
                            <!-- <router-link :to="{name:'mahasiswa.edit',params:{id:data.id}}" class="btn btn-warning btn-sm"><i class="feather icon-edit"></i></router-link> -->

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
import modal from './Modaltambah'
export default {

    components:{
            DeleteData,modal
    },

    data(){
        return{
            datas:[],
            isModalVisible: false,
        }
    },

    mounted(){
        this.getNotes();
    },

    methods:{
        openModal() {
            this.isModalVisible = true;
        },
        closeModal() {

        this.getNotes();
            this.isModalVisible = false;
        },
        async getNotes(){
            let {data} = await axios.get('/api/dataproses/');
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
