<template>
    <div>
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                  <h3>PROSES PERHITUNGAN</h3>
               </div>
                <div class="col-lg-6 d-flex flex-row-reverse">
                   <router-link :to="{name:'dataproses.table',params:{id:this.$route.params.id}}" class="btn btn-warning btn-lg mb-2"><i class="feather icon-skip-back"></i>&nbsp;KEMBALI</router-link> &nbsp;
                </div>

           </div>
        <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">NO</th>
                        <th width="20%">NAMA</th>
                         <th width="26%" v-for="kriteria,index in kriterias" ::key="kriteria.id"><span class="d-inline-block text-truncate"  style="max-width: 15%x;">{{  kriteria.nama  }}</span></th>

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



            <div v-if="ddetail[data.nim+'-'+kriteria.id] != null">

                {{ ddetailnama[data.nim+'-'+kriteria.id] }}
            </div>
            <div v-else>
                 Belum diisi
            </div>





                            </td>


                    </tr>
                </tbody>
        </table>
       </div>

       <div class="container mt-4">
           <div class="row">
               <div class="col-lg-6">
                  <h3>LANGKAH 1 : data asli ubah ke bobot</h3>
               </div>

           </div>
        <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">NO</th>
                        <th width="20%">NAMA</th>
                         <th width="26%" v-for="kriteria,index in kriterias" ::key="kriteria.id"><span class="d-inline-block text-truncate"  style="max-width: 15%x;">{{  kriteria.nama  }}</span></th>

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



            <div v-if="ddetail[data.nim+'-'+kriteria.id] != null">

                {{ ddetail[data.nim+'-'+kriteria.id] }}
            </div>
            <div v-else>
                0
            </div>





                            </td>


                    </tr>
                </tbody>
        </table>
       </div>
    </div>
</template>

<script>
export default {

    components:{

    },

    data(){
        return{
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
            isModalVisible: false,
            isModalktVisible: false,
        }
    },

    mounted(){
        this.getDatas();
        this.getKriteria();
        this.getDatasDetail();

    },

    methods:{
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
        // showModal(dataId,KriteriaId) {
        //     this.getKriteriaDetail(KriteriaId);
        //     this.showModalisi[dataId+'-'+KriteriaId]=dataId+'-'+KriteriaId;
        //     // this.firstload=1;
        //     // this.showModalisi=dataId;
        //     this.getDatas();
        //     console.log(this.showModalisi[dataId+'-'+KriteriaId]);
        // },
        // showModalfalse(dataId,KriteriaId) {
        //     this.showModalisi[dataId+'-'+KriteriaId]=null;
        //     // this.getDatas();
        //     // this.showModalisi=dataId;
        //     this.getDatas();
        // this.getDatasDetail();
        //     console.log(this.showModalisi[dataId+'-'+KriteriaId]);
        // },
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
            var {data} = await axios.get(`/api/dataproses/${this.$route.params.id}`);
            this.datas = data.data
            var datas= this.datas;

            // console.log(this.datas);

        },
        async getKriteria(){
            var {data} = await axios.get(`/api/kriteria/`);
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

            // console.log(this.datas);
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
