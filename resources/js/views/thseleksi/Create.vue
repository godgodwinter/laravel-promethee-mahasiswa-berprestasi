<template>
    <div class="container">
            <div class="row">
                <div class="col-md-6 container-fluid">
                    <!-- <div v-if="successMessage" class="alert alert-success">{{successMessage}}</div> -->
                    <h2 class="text-center mb-3">TAMBAH DATA</h2>
                    <!-- <hr>{{ moment().format('MMMM Do YYYY, h:mm:ss a') }} -->


                            <!-- //submit.prevent == onclick.prevent d+i js  -->
                        <form action="#" method="POST" @submit.prevent="store">

                            <!-- <vue-monthly-picker
                                v-model="year" type="year" dateFormat="YYYY"  default-year="2020" alignment="center" lang="en"
       year-only="true" variant="dark">
                            </vue-monthly-picker> -->

                            <!-- <date-picker v-model="time1" valueType="format"></date-picker>
                            <date-picker v-model="time2" type="datetime"></date-picker>
                            <date-picker v-model="time3" range></date-picker> -->

                            <div class="form-group">
                                <h6 for="Input-tahun" >PILIH TAHUN</h6>
                                <!-- <input type="year" v-model="form.tahun" id="Input-tahun" class="form-control"> -->

                                 <date-picker v-model="form.tahun" lang="id" type="year" format="YYYY" placeholder="Tahun"></date-picker>
                                <div v-if="theErrors.tahun" class="mt-2 text-danger">{{ theErrors.tahun[0]}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Input-kuota" >KUOTA</label>
                                <input type="number" v-model="form.kuota" id="Input-kuota" class="form-control">
                                <div v-if="theErrors.kuota" class="mt-2 text-danger">{{ theErrors.kuota[0]}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Input-status" >STATUS</label>
                                <select type="text" v-model="form.status" id="Input-status" class="form-control">
                                    <option selected>Proses</option>
                                </select>
                                <div v-if="theErrors.status" class="mt-2 text-danger">{{ theErrors.status[0]}}</div>
                            </div>

                        <div class="row">

                         <div class="col-lg-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-outline-primary d-flex align-items-center mt-2"> Simpan

                                 <template v-if="loading">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="20px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <g>
                                <circle cx="60" cy="50" r="4" fill="#e76a24">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="-0.67s"></animate>
                                    <animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="-0.67s"></animate>
                                </circle>
                                <circle cx="60" cy="50" r="4" fill="#e76a24">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="-0.33s"></animate>
                                    <animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="-0.33s"></animate>
                                </circle>
                                <circle cx="60" cy="50" r="4" fill="#e76a24">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="0s"></animate>
                                    <animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="0s"></animate>
                                </circle>
                                </g><g transform="translate(-15 0)">
                                <path d="M50 50L20 50A30 30 0 0 0 80 50Z" fill="#1c4595" transform="rotate(90 50 50)"></path>
                                <path d="M50 50L20 50A30 30 0 0 0 80 50Z" fill="#1c4595">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;45 50 50;0 50 50" keyTimes="0;0.5;1"></animateTransform>
                                </path>
                                <path d="M50 50L20 50A30 30 0 0 1 80 50Z" fill="#1c4595">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;-45 50 50;0 50 50" keyTimes="0;0.5;1"></animateTransform>
                                </path>
                                </g>
                                <!-- [ldio] generated by https://loading.io/ --></svg>
                                 </template>
                            </button>
                                </div>
                            </div>



                        </form>

                </div>
            </div>
    </div>
</template>


<script>
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';
    import 'vue2-datepicker/locale/id';

//   import VueMonthlyPicker from 'vue-monthly-picker'

export default {
 components: { DatePicker
     },
    // components: { DatePicker,
    // VueMonthlyPicker
    //  },
    data(){
        return{
          yearonly: true,
            time1: null,
            time2: null,
            time3: null,
            year:'',
            //form data yang akan dikirim
            form:{
                year:'',
                tahun:'',
                kuota:'',
                status:'',
            },
            // successMessage:'',
            loading:false,
            subjects:[],
            theErrors:[]
        };
    },
    mounted(){
        // this.form.tahun='1982-12-31T17:00:00.000Z';
        // this.form.tahun=new Date('2020');
        this.form.tahun=new Date();
        this.form.status='proses';
        this.getdatas();
    },
    methods:{
        async getdatas(){
            let response = await axios.get('/api/thseleksi')
            // console.log(response.data);
            if(response.status === 200){
                this.subjects=response.data
            }
        },
        async store(){

            this.loading=true;
            this.form.tahun=this.form.tahun.getFullYear();
        try{
            let response = await axios.post('/api/thseleksi/store', this.form)
            if(response.status==200){
                // console.log(response.data);
                this.form.tahun=""
                this.form.kuota=""
                this.form.status=""
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

            this.$router.push('/thseleksi/table')
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
    }


}
</script>

<style>

</style>
