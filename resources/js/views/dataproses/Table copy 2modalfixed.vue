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
                        <th width="20%">Nama</th>
                         <th width="26%" v-for="kriteria,index in kriterias" ::key="kriteria.id"><span class="d-inline-block text-truncate"  style="max-width: 15%x;">{{  kriteria.nama  }}</span></th>
                        <th width="5%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <td  class="text-center">{{ index+1 }} </td>

                        <!-- <td><router-link :to="{name:'mahasiswa.show',params:{dataId:data.id}}">{{data.nim}} - {{data.nama}}</router-link></td> -->
                        <!-- <td>{{note.subject}}</td> -->
                         <td ><span class="d-inline-block text-truncate"  style="max-width: 200px;"> &nbsp;{{data.nim}} - {{data.nama}}</span></td>


                        <td class="text-center" v-for="kriteria,index in kriterias" ::key="kriteria.id">



                            <!-- <template>
  <div>
    <modal v-if="modalVisible" @close="modalktVisible = false" :data="modalData"/>


      <button type="button" @click="openModalkt(data.id)">Open Modal</button>


  </div>
</template> -->

                            <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 <i class="feather icon-edit"></i> {{ kriteria.nilai }}
</button> -->


  <div v-if="firstload==null">
      {{showModalisi[data.id+'-'+kriteria.id]=null}}
  </div>

  <div v-if="showModalisi[data.id+'-'+kriteria.id]!==null">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-body">
                <form action="#" method="POST">
                    <div class="form-group">
                     {{ data.id }} - {{ kriteria.id }}

                    </div>
                </form>

                <button type="button" class="btn btn-secondary" @click="showModalfalse(data.id,kriteria.id)" ><i class="feather icon-x"></i> </button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>


  <button @click="showModal(data.id,kriteria.id)" class="btn btn-primary"><i class="feather icon-edit"></i> {{ kriteria.nilai }}</button>


                            </td>

                        <td  class="text-center">
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
import modal from './Modaltambah'
import modalkt from './Modalkriteria'
export default {

    components:{
            DeleteData,modal,modalkt
    },

    data(){
        return{
            firstload:null,
            dataInputModal:'',
            showModalisi:[],
            datas:[],
            kriterias:[],
            isModalVisible: false,
            isModalktVisible: false,
        }
    },

    mounted(){
        this.getDatas();
        this.getKriteria();

    },

    methods:{
        showModal(dataId,KriteriaId) {
            this.showModalisi[dataId+'-'+KriteriaId]=dataId+'-'+KriteriaId;
            this.firstload=1;
            // this.showModalisi=dataId;
            this.getDatas();
            console.log(this.showModalisi[dataId+'-'+KriteriaId]);
        },
        showModalfalse(dataId,KriteriaId) {
            this.showModalisi[dataId+'-'+KriteriaId]=null;
            this.getDatas();
            // this.showModalisi=dataId;
            console.log(this.showModalisi[dataId+'-'+KriteriaId]);
        },
        // openModal() {
        //     this.isModalVisible = true;
        // },
        // openModalkt() {
        //     // this.modalData = this.data;
        //     // this.modalVisible = true
        //     this.isModalktVisible = true;
        // },
        // closeModal() {
        //     this.isModalVisible = false;
        //      this.getDatas();
        // },
        // closeModalkt() {
        //     this.isModalktVisible = false;
        // },
        async getDatas(){
            let {data} = await axios.get('/api/dataproses/');
            this.datas = data.data
            Array.from(this.datas).forEach(data => {
                console.log(this.dataid);
}           );
            // console.log(this.datas);

        },
        async getKriteria(){
            let {data} = await axios.get('/api/kriteria/');
            this.kriterias = data.data
        }

    }

}
</script>

<style>
/* .modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .30s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: top;
} */


/* .modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
} */
</style>
