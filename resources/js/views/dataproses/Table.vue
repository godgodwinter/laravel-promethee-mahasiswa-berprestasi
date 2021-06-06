<template>
    <div>
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                  <h3>DATA PROSES</h3>
               </div>
               <div class="col-lg-6 d-flex flex-row-reverse">
                   <router-link :to="{name:'proseshitung.table',params:{id:this.$route.params.id}}" class="btn btn-warning btn-lg mb-2"><i class="feather icon-loader"></i>&nbsp;PROSES HITUNG {{this.$route.params.id}}</router-link> &nbsp;

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
                        <th width="5%">NO</th>
                        <th width="20%">NAMA</th>
                         <th width="26%" v-for="kriteria,index in kriterias" ::key="kriteria.id"><span class="d-inline-block text-truncate"  style="max-width: 15%x;">{{  kriteria.nama  }}</span></th>
                        <th width="5%">AKSI</th>
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


  <div v-if="showModalisi[data.id+'-'+kriteria.id]==null">
      {{showModalisi[data.id+'-'+kriteria.id]=null}}
  </div>

  <div v-if="showModalisi[data.id+'-'+kriteria.id]!==null">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-body">
                <form action="#" method="POST" @submit.prevent="kirimdata(data.nim,data.id,kriteria.id)">
                    <div class="form-group">
                     <!-- {{ data.id }} - {{ kriteria.id }} = -->
                      {{ ddetailnama[data.nim+'-'+kriteria.id] }}
                        <div class="form-group">
                             <!-- <input type="text" v-model="form.nim" id="Input-nama" class="form-control"> -->
                             <input type="hidden" v-model="form.thseleksi_id" id="Input-nama" class="form-control">
                                <!-- <label for="Input-jurusan" >JURUSAN</label> -->
                                <select type="text" v-model="ddetail[data.nim+'-'+kriteria.id]" id="Input-kriteria_id" class="form-control" required>
                                    <option v-if="ddetail[data.nim+'-'+kriteria.id]!=null">{{ ddetailnama[data.nim+'-'+kriteria.id] }}</option>
                                    <!-- <option v-if="ddetail[data.nim+'-'+kriteria.id]==null" disabled >--</option> -->



                                    <option v-for="ks,index in kriteriasShow" ::key="ks.id" v-bind:value="ks.id"> {{ ks.nama }}</option>


                                </select>
                                <!-- <div v-if="theErrors.kriteria_id" class="mt-2 text-danger">{{ theErrors.kriteria_id[0]}}</div> -->
                            </div>

                    </div>
                     <button type="submit" class="btn btn-outline-primary d-flex align-items-center mt-2"> Update</button>
                </form>

                <button type="button" class="btn btn-secondary" @click="showModalfalse(data.id,kriteria.id)" ><i class="feather icon-x"></i> </button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>

<button @click="showModal(data.id,kriteria.id)" class="btn btn-outer-primary btn-sm btn-block col-12"><i class="feather icon-edit"></i>

            <div v-if="ddetail[data.nim+'-'+kriteria.id] != null">

                {{ ddetailnama[data.nim+'-'+kriteria.id] }}
            </div>
            <div v-else>
                 Belum diisi
            </div>

  </button>



                            </td>

                        <td  class="text-center">
                           <delete-data class="btn btn-danger btn-sm" :endpoint="data.id"></delete-data>
                        </td>
                    </tr>
                </tbody>
        </table>
       </div>

       <div class="container">

           <div class="row mt-5" v-if="arrHasilhitung.length>0">
                <div class="col">
                    <h2>Data Hasil</h2>
                    <line-chart :chartData="arrHasilhitung" :options="chartOptions" label="Hasil"></line-chart>
                </div>
           </div>
       </div>
    </div>
</template>

<script>
// https://api.covidtracking.com/v1/us/daily.json
// import LineChart from './../../components/LineChart.vue'
import LineChart from './../../components/LineChart.vue'
import DeleteData from './Delete'
import modal from './Modaltambah'
import modalkt from './Modalkriteria'
import moment from 'moment'
export default {

    components:{
            DeleteData,modal,modalkt,LineChart
    },

    data(){
        return{
                arrNim:[],
                arrJurusan:[],
                arrNama:[],
                arrHasilhitung:[],
                arrCreatedat:[],
                chartOptions:{
                    responsive:true,
                    maintainAspectRatio:false,
                    borderWidth:200,
                },


            // firstload:null,
             form:{
                id:'',
                nim:'',
                kriteria_id:'',
                thseleksi_id:this.$route.params.id,
            },
            dataInputModal:'',
            // form.kriteria_id:'',
            showModalisi:[],
            datas:[],
            datasdetail:[],
            ddetail:[],
            kriterias:[],
            kriteriasShow:[],
            datashasil:[],
            isModalVisible: false,
            isModalktVisible: false,
        }
    },

    mounted(){
        this.created();
        this.getDatas();
        this.getKriteria();
        this.getDatasDetail();

    },

    methods:{
        async created() {
            // const { data } = await axios.get("https://covidtracking.com/api/us/daily");
            const { data } =  await axios.get(`/api/dataproses/${this.$route.params.id}`);
// data = JSON.parse(data);
            this.datashasil = data.data
            var datashasil= this.datashasil;
  // this.datas.forEach(function(e){
            //      var showModalisi=[];
            this.datashasil.forEach(d=>{
                const date = d.nama;
                const namas = d.nama;
                const {

                    nim,
                    jurusan,
                    nama,
                    hasilhitung,
                    created_at
                } = d;
                // const namas = d.nama;

                this.arrNim.push({date,total:nim});
                this.arrJurusan.push({date,total:jurusan});
                this.arrNama.push({date,total:nama});
                this.arrHasilhitung.push({date,total:hasilhitung});
                this.arrCreatedat.push({date,total:created_at});

                // console.log(d.nama);
                // console.log(namas);
            })

        },
    async kirimdata(dataNim,dataId,KriteriaId){
        this.form.id=dataId;
        this.form.nim=dataNim;
        this.form.thseleksi_id=this.form.thseleksi_id;
        this.form.kriteria_id=KriteriaId;
        this.form.kriteriadetail_id=this.ddetail[dataNim+'-'+KriteriaId];
        console.log(this.form.id);

            try{
                let response = await axios.post(`/api/dataprosesdetail/store`, this.form)
                if(response.status==200){
                    // console.log(response.data);
                    // this.form.nama=""
                    // this.form.bobot=""
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

                this.getDatasDetail();
                this.showModalisi[dataId+'-'+KriteriaId]=null;
                console.log('berhasil');
                // this.$router.push(`/kriteriadetail/${this.$route.params.id}/show`)
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
            },
        showModal(dataId,KriteriaId) {
            this.getKriteriaDetail(KriteriaId);
            this.showModalisi[dataId+'-'+KriteriaId]=dataId+'-'+KriteriaId;
            // this.firstload=1;
            // this.showModalisi=dataId;
            this.getDatas();
            console.log(this.showModalisi[dataId+'-'+KriteriaId]);
        },
        showModalfalse(dataId,KriteriaId) {
            this.showModalisi[dataId+'-'+KriteriaId]=null;
            // this.getDatas();
            // this.showModalisi=dataId;
            this.getDatas();
        this.getDatasDetail();
            console.log(this.showModalisi[dataId+'-'+KriteriaId]);
        },
        openModal() {
            this.isModalVisible = true;
        },
        openModalkt() {
            // this.modalData = this.data;
            // this.modalVisible = true
            this.isModalktVisible = true;
        },
        closeModal() {
            this.isModalVisible = false;
             this.getDatas();
        },
        closeModalkt() {
            this.isModalktVisible = false;
        },
        async getDatas(){
            var {data} = await axios.get(`/api/dataproses/${this.$route.params.id}`);
            this.datas = data.data
            var datas= this.datas;

            // console.log(this.datas);

        },
        async getKriteria(){
            var {data} = await axios.get(`/api/kriteria`);
            this.kriterias = data.data
            var kriterias= this.kriterias;
        },
        async getKriteriaDetail(id){
            console.log(`/api/kriteriadetail/${id}/show`);
            var {data} = await axios.get(`/api/dataproses/getkriteria/${id}`);
            this.kriteriasShow = data.data
            var kriteriasShow= this.kriteriasShow;
            // console.log(kriteriasShow);
        },
        async getDatasDetail(){
            var jmldatakriteria=[];
            var ddetail=[];
            var ddetailnama=[];
            var form=[];
            var {data} = await axios.get(`/api/dataprosesdetail/${this.$route.params.id}`);
            this.datasdetail = data.data
            var datasdetail= this.datasdetail;

            var kriterias = this.kriterias;

            // dataModels[0] = {
            //     childNodes: []
            // };

            // dataModels[0].childNodes[0] = {
            //     appId: "foo"
            // };

            this.datas.forEach(function(e){
                 var showModalisi=[];
                 var datae=e;
                //  console.log(e['id']);
                kriterias.forEach(function(x) { // was missing a )

                //  console.log(e['id']);
                    var dataeId=e['id'];
                    var dataxId=x['id'];
                    // let KriteriaId=x['id'];
                 showModalisi[dataeId+'-'+dataxId]=null;
                //    console.log([dataeId+'-'+dataxId]);
                // console.log(showModalisi);
                });
            });

             kriterias.forEach(function(x) { // was missing a )

                    var dataxId=x['id'];
                    // let KriteriaId=x['id'];
                 jmldatakriteria[dataxId]=x['jmldata'];
                //    console.log([dataeId+'-'+dataxId]);
                // console.log(showModalisi);
            // console.log(jmldatakriteria);
                });

            // console.log(this.kriterias);
            // console.log(this.datasdetail);

        // this.datas.forEach(function(e,i){
        //     // console.log(e['nama']);
        //         this.kriterias.forEach(function(x,y){
        //         console.log(x);
        //     });

        // });


        this.datasdetail.forEach(function(e,i){
               let nim=e['nim'];
               let kriteria_id=e['kriteria_id'];
            //    ddetail='aaa';
               ddetail[nim+'-'+kriteria_id]=e['bobot_kd'];
               ddetailnama[nim+'-'+kriteria_id]=e['nama'];
            //    formkriteria_id[nim+'-'+kriteria_id]=e['bobot_kd'];
                // console.log(ddetail[nim+'-'+kriteria_id]);


            });
            this.ddetail=ddetail;
            this.ddetailnama=ddetailnama;
            // this.form=form;
            // console.log(this.form);


            // this.datasdetail.forEach(function(e,i){
            //         console.log(e['nim']);

            // });
        },


    }

}
</script>

<style>
.modal-mask {
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
}


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
