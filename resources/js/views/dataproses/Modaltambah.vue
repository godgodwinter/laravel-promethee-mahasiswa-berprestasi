<template>
  <div class="modal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Peserta</h4>
          <button type="button" class="btn btn-sm" v-on:click="closeModal">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 ml-auto">

                     <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <!-- {{ form.nim[data.nim]=data.nim }} -->
                        <td class="text-center">{{ index+1 }}</td>

                        <!-- <td><router-link :to="{name:'mahasiswa.show',params:{dataId:data.id}}">{{data.nim}} - {{data.nama}}</router-link></td> -->
                        <!-- <td>{{note.subject}}</td> -->
                        <td ><span class="d-inline-block text-truncate"  style="max-width: 350px;"> &nbsp;{{data.nim}} - {{data.nama}}</span></td>
                        <td><span class="d-inline-block text-truncate"  style="max-width: 150px;">&nbsp;{{data.jurusan}}</span></td>
                        <td class="text-center">

            <div class="container-fluid">
                                <form action="#" method="POST" @submit.prevent="storedata">

                                    <!-- <input type="hidden" v-model="form.nim[data.nim]=data.nim" id="Input-nama" class="form-control"> -->
                                    <button  ref="refDestroy" @click="setNim(data.nim,data.id)"  :endpoint="data.nim" type="submit" class="btn btn-outline-success d-flex align-items-center mt-2 text-center"><i class="feather icon-plus-circle"></i></button>
                                </form>
            </div>

                        </td>
                    </tr>

                </tbody>
        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" v-on:click="closeModal">Close</button>
          <button type="button" class="btn btn-success" @click="refresh">Refresh Data</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import TableData from './Table'
  export default {
    name: 'modal',
   data(){
      return {
           datas:[],
            form:{
                // nama:this.$route.params.id,
                nim:'',
                thseleksi_id:this.$route.params.id,
                // nama:'',
                // nilai:'',
            },
            loading:false,
            subjects:[],
            theErrors:[]
        //
      }
    },

    mounted(){
        this.getDatas();
    },

    methods: {

        refresh() {
            // console.log('aaa');
            this.getDatas();
        },
      closeModal() {
        this.$emit('close-modal');
      },

        async getDatas(){
            let {data} = await axios.get(`/api/dataproses/getmhs/${this.$route.params.id}`);
            this.datas = data.data


            // let response = await axios.get('/api/notes');
            // this.notes = response.data.data
        },

       async setNim(nimklik,dataId){
           this.form.nim=nimklik;

            // this.$refs.refDestroy.parentNode.parentNode.remove()
        //     this.datas.splice(nimklik,1);
        //      console.log(this.datas.splice(dataId,1))
        //    this.form.thseleksi_id=this.$route.params.id;
        //    console.log(nimklik);
       },
        async storedata(){
            this.loading=true;

    // console.log(this.form);
        try{
// console.log(this.form);
            this.$router.push(`/dataproses/table/${this.$route.params.id}`)
            let response = await axios.post('/api/dataproses/store', this.form)
            if(response.status==200){

// this.$router.push(`/dataproses/table/${this.$route.params.id}`).catch(()=>{});
        this.getDatas();
                // console.log(response.data);
                this.loading=false
                this.theErrors=[]
                // this.successMessage=response.data.message
                // this.$toasted.show(response.data.message)
                let toast = this.$toasted.show(response.data.message, {
                    type:'success',
                    theme: "bubble",
                    position: "top-right",
                    duration : 5000
                });

            // this.$router.push(`/dataproses/table/${this.$route.params.id}`)
            }
            // console.log(response.data.message);
        }catch(e){

            this.loading=false
            this.theErrors=e.response.data.errors;
               let toast = this.$toasted.show("Terjadi kesalahan!", {
                    type:'error',
                    theme: "bubble",
                    position: "top-right",
                    duration : 5000
                });
        }
        }
    },
  };
</script>
<style scoped>
  .modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: block;
  overflow: hidden;
  outline: 0;
  background-color: rgba(0, 0, 0, 0.6);
  }
</style>
