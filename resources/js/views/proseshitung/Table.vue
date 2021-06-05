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

       <div class="container mt-7">
           <div class="row">
               <div class="col-lg-6">
                  <h3>LANGKAH 1 : Bobot Kriteria Tiap Alternatif</h3>
                  <p>Ubah data inputan menjadi nilai untuk di hitung, jika data belum diisi otomatis akan di nilai nol (0)</p>
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
                        <td ><span class="d-inline-block text-truncate"  style="max-width: 200px;"> &nbsp;{{data.nim}} - {{data.nama}}</span></td>


                        <td class="text-center" v-for="kriteria,index in kriterias" ::key="kriteria.id">

                            <div v-if="ddetail[data.nim+'-'+kriteria.id] != null">

                                {{ ddetail[data.nim+'-'+kriteria.id] }}
                            </div>
                            <div v-else>
                                0
                            </div>
                        </td>


                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"> <b>Jumlah</b></td>
                          <td class="text-center" v-for="kriteria,index in kriterias" ::key="kriteria.id"> {{ kriteria.jmldata }}
                          </td>

                    </tr>
                </tbody>
        </table>
       </div>


<div class="container">
           <div class="row mt-4">
               <div class="col-lg-12">
                  <h3>LANGKAH 2 : Preferensi Kriteria Usual , bandingkan tiap kriteria per alternatif</h3>
                  <p>Jika hasilnya lebih dari 0 maka disimpan jadi 1, jika kurang dari nol maka 0</p>
               </div>

           </div>
        <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">NO</th>
                        <th width="20%">NAMA</th>
                         <th width="26%" v-for="datadua,indexdua in datasdua" ::key="datadua.id"><span class="d-inline-block text-truncate"  style="max-width: 15%x;">
                              A {{ indexdua+1 }} = {{  datadua.nama  }}</span></th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <td  class="text-center">

                             A{{ index+1 }}
                            <!-- A {{ indexdatasatu=data.nim }} -->

                        </td>
                        <td ><span class="d-inline-block text-truncate"  style="max-width: 200px;"> &nbsp;{{data.nim}} - {{data.nama}}</span></td>


                        <td class="text-center" v-for="datadua,indexdua in datasdua" ::key="datadua.id">

                            <!-- <i>A {{ indexdatasatu }} -  A {{ indexdatadua=datadua.nim }}</i>
                            <hr> -->
                            <div v-if="data.nim==datadua.nim">
                                    0
                                            <!-- {{ checknull(1) }} -->
                            </div>
                            <div v-if="data.nim!=datadua.nim">

                                    <div class="text-center" v-for="kriteria,indexkit in kriterias" ::key="kriteria.id">

                                        <div>

                                            <!-- {{ checknull(1) }} -->

                                            <!-- (A{{ data.nim }}) -->
                                                <b> {{ a_satu=checknull(ddetail[data.nim+'-'+kriteria.id]) }}</b>
                                                -
                                            <!-- (A{{ datadua.nim }})  -->
                                            <b>{{ a_dua=checknull(ddetail[datadua.nim+'-'+kriteria.id]) }} </b>
                                            = <b>{{ hasilpenjumlahan=a_satu-a_dua }}</b> <i>diubah jadi </i>
                                             {{ hasilf[data.nim+'-'+datadua.nim+'-'+kriteria.id]=hasilsatuornol(hasilpenjumlahan) }}


                                        </div>

                                    </div>
                            </div>

                        </td>

                    </tr>

                </tbody>
        </table>
       </div>



<div class="container">
           <div class="row mt-4">
               <div class="col-lg-12">
                  <h3>LANGKAH 3 : Menghitung index preferensi Multikriteria</h3>
                  <p>Dengan cara jumlahkan hasil sebelumnya per alternatif perkriteria kemudia dibagi jumlah kriteria yang ada.</p>
               </div>

           </div>
        <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">NO</th>
                        <th width="20%">NAMA</th>
                         <th width="26%" v-for="datadua,indexdua in datasdua" ::key="datadua.id"><span class="d-inline-block text-truncate"  style="max-width: 15%x;">
                              A {{ indexdua+1 }} = {{  datadua.nama  }}</span></th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <td  class="text-center">

                             A{{ index+1 }}
                            <!-- A {{ indexdatasatu=data.nim }} -->

                        </td>
                        <td ><span class="d-inline-block text-truncate"  style="max-width: 200px;"> &nbsp;{{data.nim}} - {{data.nama}}</span></td>


                        <td class="text-center" v-for="datadua,indexdua in datasdua" ::key="datadua.id">

                            <input type="hidden" v-text="hasiljml_untukentring[datadua.nim]=0">
                            <!-- <div v-text="hasiljml_k[indexdatasatu+'-'+indexdua]=0"></div> -->
                            <input type="hidden" v-text="hasiljml_k[data.nim+'-'+datadua.nim]=0">
                            <!-- <hr> -->
                            <div v-if="data.nim==datadua.nim">
                                    0
                                            <!-- {{ checknull(1) }} -->
                            </div>
                            <div v-if="data.nim!=datadua.nim">

                                <div class="text-center" v-for="kriteria,index in kriterias" ::key="kriteria.id">
                                        <div>
                                            <!-- {{  data.nim }} --  {{  datadua.nim }} == -->
                                            k1({{ index }}) = {{ hasilf[data.nim+'-'+datadua.nim+'-'+kriteria.id] }}
                                            <input type="hidden" v-text="hasiljml_k[data.nim+'-'+datadua.nim]+=hasilf[data.nim+'-'+datadua.nim+'-'+kriteria.id]">
                                        </div>
                                </div>

                                Jumlah k : <b>{{ hasiljml_k[data.nim+'-'+datadua.nim] }}</b>
                                <br>

                                Dibagi kriteri (k/jmlh kriteria) : {{ hasiljml_k[data.nim+'-'+datadua.nim] }} / {{ kriterias.length }} =

                            <div v-if="hasiljml_k[data.nim+'-'+datadua.nim]==0">
                                {{ hasil_k_per_jmlh_k[data.nim+'-'+datadua.nim]=0 }}
                            </div>
                            <div v-if="hasiljml_k[data.nim+'-'+datadua.nim]!=0">
                               <b> {{ hasil_k_per_jmlh_k[data.nim+'-'+datadua.nim]=(hasiljml_k[data.nim+'-'+datadua.nim]/kriterias.length)}}</b>
                            </div>
                                <!-- <b>{{ hasil_k_per_jmlh_k[data.nim+'-'+datadua.nim]=check_k_null(hasiljml_k[data.nim+'-'+datadua.nim],kriterias.length)}}</b> -->
                            </div>

                        </td>

                    </tr>

                </tbody>
        </table>
       </div>



<div class="container">
           <div class="row mt-4">
               <div class="col-lg-12">
                   <h3>LANGKAH 4 : Menghitung Leaving Flow dan Entring Flow</h3>
                  <p>*)Leaving Flow = Jumlahkan hasil proses sebelumnya per data pertama. Kemudia gunakan rumus 1/jumlah kriteria-1 kemudian di kali hasil penjumlahan per data pertama</p>
                   <p>*)Entring Flow = Jumlahkan hasil proses sebelumnya per data kedua. Kemudia gunakan rumus 1/jumlah kriteria-1 kemudian di kali hasil penjumlahan per data kedua</p>
 </div>

           </div>
        <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">NO</th>
                        <th width="10%">NAMA</th>
                         <th width="5%" v-for="datadua,indexdua in datasdua" ::key="datadua.id"><span class="d-inline-block text-truncate"  style="max-width: 15%x;">
                              A {{ indexdua+1 }} = {{  datadua.nama  }}</span></th>
                        <th width="5%">JUMLAH</th>
                        <th width="15%">LEAVING FLOW<br>
                        1/({{ kriterias.length }}-1) * jumlah


                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data,index in datas" ::key="data.id">
                        <td  class="text-center">

                            <input type="hidden" v-text="hasiljml_untukleaving[data.nim]=0">
                             A{{ index+1 }}
                            <!-- A {{ indexdatasatu=data.nim }} -->

                        </td>
                        <td ><span class="d-inline-block text-truncate"  style="max-width: 200px;"> &nbsp;{{data.nim}} - {{data.nama}}</span></td>


                        <td class="text-center" v-for="datadua,indexdua in datasdua" ::key="datadua.id">

                            <!-- <div v-text="hasiljml_k[indexdatasatu+'-'+indexdua]=0"></div> -->
                            <input type="hidden" v-text="hasiljml_k[data.nim+'-'+datadua.nim]=0">
                            <!-- <hr> -->
                            <div v-if="data.nim==datadua.nim">
                                    0
                                            <!-- {{ checknull(1) }} -->
                            </div>
                            <div v-if="data.nim!=datadua.nim">



                            <input type="hidden" v-text="hasiljml_untukleaving[data.nim]+=hasil_k_per_jmlh_k[data.nim+'-'+datadua.nim]">
                            <input type="hidden" v-text="hasiljml_untukentring[datadua.nim]+=hasil_k_per_jmlh_k[data.nim+'-'+datadua.nim]">

                                <b>{{ hasil_k_per_jmlh_k[data.nim+'-'+datadua.nim]}}</b>

                            </div>

                        </td>

                        <td class="text-center">
                            {{ hasiljml_untukleaving[data.nim].toFixed(2) }}
                        </td>
                        <td class="text-center">
                            1/{{ kriterias.length-1 }} * {{ hasiljml_untukleaving[data.nim].toFixed(2) }}=
                            <br>
                            <b> {{ leavingflow[data.nim]=((1/(kriterias.length-1))*hasiljml_untukleaving[data.nim].toFixed(2)) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>JUMLAH</b>
                          <td class="text-center" v-for="datadua,indexdua in datasdua" ::key="datadua.id">
                                {{ hasiljml_untukentring[datadua.nim].toFixed(2)  }}
                          </td>
                        </td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                    </tr>
                     <tr>
                        <td colspan="2"><b>ENTRING FLOW <br>
                        1/({{ kriterias.length }}-1) * jumlah</b></td>
                          <td class="text-center" v-for="datadua,indexdua in datasdua" ::key="datadua.id">
                               1/{{ kriterias.length-1 }} * {{ hasiljml_untukentring[datadua.nim].toFixed(2) }}=

                               <b> {{ entringflow[datadua.nim]=((1/(kriterias.length-1))*hasiljml_untukentring[datadua.nim].toFixed(2)) }}</b>


                          </td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                    </tr>

                </tbody>
        </table>
       </div>


<div class="container">
           <div class="row mt-4">
               <div class="col-lg-12">
                  <h3>LANGKAH 5 : Menghitung Netflow</h3>
                  <p>Leaving Flow dikurangi Entring Flow</p>

               </div>

           </div>
        <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">NO</th>
                        <th width="20%">NAMA</th>
                        <th width="20%">LEAVING FLOW</th>
                        <th width="20%">ENTERING FLOW</th>
                        <th width="20%">NET FLOW</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="dataakhir,index in datas" ::key="dataakhir.id">
                        <td  class="text-center"> A {{ indexdatasatu=index+1 }} </td>
                            <input type="hidden" v-text="hasiljml_untukleaving[indexdatasatu]=0">
                        <td ><span class="d-inline-block text-truncate"  style="max-width: 200px;"> &nbsp;{{dataakhir.nim}} - {{dataakhir.nama}}</span></td>
                        <td class="text-center">
                            {{ leavingflow[dataakhir.nim] }}
                        </td>
                        <td class="text-center">
                            {{ entringflow[dataakhir.nim] }}
                        </td>
                        <td class="text-center">
                            {{ netflow[dataakhir.nim]=(leavingflow[dataakhir.nim]-entringflow[dataakhir.nim]).toFixed(4) }}

                            {{ do_pushto(dataakhir.nim,netflow[dataakhir.nim]) }}
                              <!-- {{ do_update(dataakhir.id,dataakhir.nim,netflow[dataakhir.nim]) }} -->

                            <input type="hidden" v-text="">

                            <!-- proses masukkan ke arrHasilakhir -->
                             <!-- {{ do_arr_untuk_sorting(dataakhir.nim,dataakhir.nim) }} -->

                             <!-- {{ arrHasilakhirtemp }}
                             <input type="hidden" v-text="arrHasilakhir=hasil_k_per_jmlh_k[indexdatasatu+'-'+indexdua]"> -->

                        </td>



                    </tr>

                </tbody>
        </table>
       </div>


<div class="container">
           <div class="row mt-4">
               <div class="col-lg-12">
                  <h3>LANGKAH 6 : Urutkan berdasarkan Netflow</h3>
                  <p>Refresh halaman jika data belum terproses! Kuota : {{ datasSeleksi.kuota }} Orang</p>


               </div>

           </div>
        <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th width="5%">NO</th>
                        <th width="10%">NAMA</th>
                        <th width="10%">NET FLOW</th>
                        <th width="10%">PERINGKAT</th>
                        <th width="10%">STATUS</th>

                    </tr>
                </thead>
                <tbody>

                    <tr v-for="dp,index in datasperingkat" ::key="dp.id">
                        <td  class="text-center"> A {{ indexdatasatu=index+1 }} </td>
                        <td ><span class="d-inline-block text-truncate"  style="max-width: 200px;"> &nbsp;{{dp.nim}} - {{dp.nama}}</span></td>

                        <td class="text-center"> {{ dp.hasilhitung }} </td>
                        <td class="text-center"> {{ indexdatasatu }} </td>
                        <td class="text-center" v-if="index+1<=datasSeleksi.kuota"> LOLOS </td>
                        <td class="text-center" v-if="index+1>datasSeleksi.kuota"> TIDAK LOLOS </td>




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
              form:{
                id:'',
                nim:'',
                hasilhitung:'',
                thseleksi_id:this.$route.params.id,
            },
            formdoupdate:{
                id:'',
                nim:'',
                hasilhitung:'',
                thseleksi_id:this.$route.params.id,
            },
            datas:[],
            datasperingkat:[],
            datasdua:[],
            datasdetail:[],
            datasSeleksi:[],
            ddetail:[],
            kriterias:[],
            kriteriasShow:[],
            hasilf:[],
            hasilchecknull:'',
            hasiljml_k:[],
            hasil_check_k_null:'',
            hasil_k_per_jmlh_k:[],
            hasiljml_untukleaving:[],
            hasiljml_untukentring:[],
            leavingflow:[],
            entringflow:[],
            netflow:[],
            netflowisnan:'',
            looppushto:0,
            arrHasilakhirtemp:[],
            arrHasilakhir:[],
            isModalVisible: false,
            isModalktVisible: false,
        }
    },

    mounted(){
        this.getThSeleksi();
        this.getDatas();
        this.getKriteria();
        this.getDatasDetail();
        this.getDatasPeringkat();

    },

    methods:{
        do_pushto(nim,hasilhitung){

        // let response = await axios.patch(`/api/dataprosesdetailhitung/edit`,this.form)
            if(this.looppushto<this.datas.length){

                if (isNaN(hasilhitung)){

                }else{
                // this.form.id=`${id}`;
                this.form.nim=`${nim}`;
                this.form.hasilhitung=`${hasilhitung}`;
                this.form.thseleksi_id=`${this.$route.params.id}`;

                console.log(this.form);


        // let response = await axios.patch(`/api/dataprosesdetailhitung/edit`,this.form)
            //   if (response.status==200){
            //     this.loading=false;
            // //   console.log(response.data)
            //   let toast = this.$toasted.show(response.data.message, {
            //         type:'success',
            //         theme: "bubble",
            //         position: "top-right",
            //         duration : 5000
            //     });
            //   }

            this.goupdate();
            this.formclear();
                    console.log(this.form);
                    // console.log(response);
                    // console.log(nim);
                    // console.log(hasilhitung);
                            this.looppushto++;


                }

            }
        },
        async goupdate(){
            let response = await axios.patch(`/api/dataprosesdetailhitung/edit`,this.form)
              if (response.status==200){
                this.loading=false;
            //   console.log(response.data)
              let toast = this.$toasted.show(response.data.message, {
                    type:'success',
                    theme: "bubble",
                    position: "top-right",
                    duration : 5000
                });
              }

        },
        do_update(satugo){
            if(this.netflowisnan==''){
                this.arrHasilakhirtemp[1]='aaa';
                this.arrHasilakhirtemp[2]='bbb';
                this.arrHasilakhirtemp=['bbb'];

                    console.log(this.arrHasilakhirtemp);
                    console.log(this.arrHasilakhirtemp.length);

            this.arrHasilakhirtemp.forEach(function myFunction(item, index) {
                    console.log(item);
            });


                    console.log(this.netflow);

            // this.netflow.forEach(function myFunction(item, index) {
            //         console.log(item);
            // });


                    // console.log(this.form);
                //    this.netflow.forEach((value,index)=>{
                //         // var showModalisi=[];
                //         var datae=value;
                //         console.log(value);
                //    });




                    this.netflowisnan=1;
                }
                // this.netflowisnan=netflow;
                // if (isNaN(this.netflowisnan)){

                // }else{
                // this.formclear();
                //     console.log(this.netflowisnan);
                // this.form.id=`${id}`;
                // this.form.nim=`${nim}`;
                // this.form.hasilhitung=`${netflow}`;
                // this.form.thseleksi_id=`${this.$route.params.id}`;



                //     console.log(this.form);

            //   let response = await axios.patch(`/api/dataprosesdetailhitung/edit`,this.form)
        //     this.formclear();
        // if (response.status==200){
        //         this.loading=false;
        //     //   console.log(response.data)
        //       let toast = this.$toasted.show(response.data.message, {
        //             type:'success',
        //             theme: "bubble",
        //             position: "top-right",
        //             duration : 5000
        //         });
        //     console.log(response.data);
        //     // this.$router.push('/mahasiswa/table')
        // }
        //         // return netflow;
                // }
        },
        // check_k_null(isi_k,jml_kriteria){
        //     // console.log(jml_kriteria);
        //     if(isi_k!=0){
        //         this.hasil_check_k_null=isi_k/jml_kriteria;
        //         return this.hasil_check_k_null;
        //     }else{
        //         return 0;
        //     }
        // },
                //
        formclear(){
               this.form.id=``;
                this.form.nim=``;
                this.form.hasilhitung=``;
                this.form.hasilhitung2=``;
        },

        hasilsatuornol(isi){
            if(isi>0){
                this.hasilceksatuornol=1;
            }else{
                this.hasilceksatuornol=0;
            }
            return this.hasilceksatuornol;
        },
        checknull(isi){
            // console.log(isi);
            if(isi!=null){
                return this.hasilchecknull=isi;
            }else{
                return this.hasilchecknull=0;
            }
                // this.hasilchecknull;
        },
    async kirimdata(dataNim,dataId,KriteriaId){
        this.form.id=dataId;
        this.form.nim=dataNim;
        this.form.thseleksi_id=this.form.thseleksi_id;
        this.form.kriteria_id=KriteriaId;
        this.form.kriteriadetail_id=this.ddetail[dataNim+'-'+KriteriaId];
        // console.log(this.form.id);

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
                // console.log('berhasil');
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

            var {data} = await axios.get(`/api/dataproses/${this.$route.params.id}`);
            this.datasdua = data.data
            var datasdua= this.datasdua;

            // console.log(this.datas);

        },
        async getDatasPeringkat(){
            var {data} = await axios.get(`/api/dataprosesperingkat/${this.$route.params.id}`);
            this.datasperingkat = data.data
            var datasperingkat= this.datasperingkat;


        },
        async getKriteria(){


            try{
            var {data} = await axios.get(`/api/dataprosesdetailhitung/${this.$route.params.id}`);
                this.kriterias = data.data
                var kriterias= this.kriterias;

                // console.log(response.data.message);
            }catch(e){
                    var {data} = await axios.get(`/api/kriteria`);
                    this.kriterias = data.data
                    var kriterias= this.kriterias;

            }




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
            var jmllangkahsatu=[];
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

            //    jmllangkahsatu['kriteria_id']+=jmllangkahsatu['kriteria_id'];
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
        async getThSeleksi(){
            // let {data} = await axios.get(`/api/thseleksi/${this.$route.params.id}`);
              let response = await axios.get(`/api/thseleksi/${this.$route.params.id}`);
            this.datasSeleksi = response.data.data
            console.log(this.datasSeleksi.kuota);
            // this.datasSeleksi = data.data

            // let response = await axios.get('/api/notes');
            // this.notes = response.data.dat
        }


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
