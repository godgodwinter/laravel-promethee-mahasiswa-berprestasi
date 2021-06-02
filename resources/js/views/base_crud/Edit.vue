<template>
    <div class="container">
            <div class="row">
                <div class="col-md-6 container-fluid">
                    <!-- <div v-if="successMessage" class="alert alert-success">{{successMessage}}</div> -->
                    <h2 class="text-center mb-3">EDIT DATA</h2>
                    <hr>
                            <!-- //submit.prevent == onclick.prevent d+i js  -->
                        <form action="#" method="POST" @submit.prevent="update">
                            <div class="form-group">
                                <label for="Input-nim" >NIM</label>
                                <input type="text" v-model="form.nim" id="Input-nim" class="form-control">
                                <div v-if="theErrors.nim" class="mt-2 text-danger">{{ theErrors.nim[0]}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Input-nama" >NAMA</label>
                                <input type="text" v-model="form.nama" id="Input-nama" class="form-control">
                                <div v-if="theErrors.nama" class="mt-2 text-danger">{{ theErrors.nama[0]}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Input-jk" >JENIS KELAMIN</label>
                                <select type="text" v-model="form.jk" id="Input-jk" class="form-control">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <div v-if="theErrors.jk" class="mt-2 text-danger">{{ theErrors.jk[0]}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Input-jurusan" >JURUSAN</label>
                                <select type="text" v-model="form.jurusan" id="Input-jurusan" class="form-control">
                                    <option>SISTEM INFORMASI</option>
                                    <option>TEKNIK INFORMATIKA</option>
                                    <option>PGSD</option>
                                    <option>PENDIDIKAN MATEMATIKA</option>
                                </select>
                                <div v-if="theErrors.jurusan" class="mt-2 text-danger">{{ theErrors.jurusan[0]}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Input-hp" >HP</label>
                                <input type="text" v-model="form.hp" id="Input-hp" class="form-control">
                                <div v-if="theErrors.hp" class="mt-2 text-danger">{{ theErrors.hp[0]}}</div>
                            </div>


                        <div class="row">

                         <div class="col-lg-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-outline-primary d-flex align-items-center mt-2"> Update

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
    </div>
</template>

<script>
export default {
    data(){
        return{
            //form data yang akan dikirim
            form:[],
            // successMessage:'',
            subjects:[],
            theErrors:[],
            loading:false,
            selected:'',
        };
    },
    mounted(){
        this.getsubjects();
        this.getDatas();

    },
    methods:{
        async getsubjects(){
            let response = await axios.get('/api/subjects')
            // console.log(response.data);
            if(response.status === 200){
                this.subjects=response.data
            }
        },

    async getDatas(){
        let response = await axios.get(`/api/mahasiswa/${this.$route.params.id}`);
        this.form = response.data.data
        console.log(this.form);
    },

    selectedDatas(e){
            // console.log(e.target.value);
            this.selected=e.target.value

                    //tampilkan yang oncgane selekted
            // console.log(e);
    },
    async update(){
        this.form['id']=this.selected || this.form.subjectId

        let response = await axios.patch(`/api/mahasiswa/${this.$route.params.id}/edit`,this.form)
        if (response.status==200){
                this.loading=false
            //   console.log(response.data)
              let toast = this.$toasted.show(response.data.message, {
                    type:'success',
                    theme: "bubble",
                    position: "top-right",
                    duration : 5000
                });

            this.$router.push('/mahasiswa/table')
        }
        // console.log(this.form);
        // console.log('something');

    }

    }


}
</script>

<style>

</style>
