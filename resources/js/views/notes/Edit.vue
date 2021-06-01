<template>
    <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- <div v-if="successMessage" class="alert alert-success">{{successMessage}}</div> -->
                    <div class="card card-header">Edit Note</div>
                    <div class="card-body">
                            <!-- //submit.prevent == onclick.prevent d+i js  -->
                        <form action="#" method="POST" @submit.prevent="update">
                            <div class="form-group">
                                <label for="Input-title" >Title</label>
                                <input type="text" v-model="form.title" id="Input-title" class="form-control">
                                <div v-if="theErrors.title" class="mt-2 text-danger">{{ theErrors.title[0]}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Input-subject" >Subject</label>
                                <select @change="selectedSubject" type="text" id="Input-subject" class="form-control">
                                    <option value="form.subjectId" v-text="form.subject"></option>
                                    <template  v-for="subject in subjects" >

                                    <option v-if="form.subjectId!==subject.id" :key="subject.id" :value="subject.id">{{ subject.name }}</option>

                                    </template>
                                </select>
                                <div v-if="theErrors.subject" class="mt-2 text-danger">{{ theErrors.subject[0]}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Input-describtion" >Describtion</label>
                                <textarea v-model="form.description" id="Input-describtion" cols="30" rows="10" class="form-control"></textarea>
                                <div v-if="theErrors.description" class="mt-2 text-danger">{{ theErrors.description[0]}}</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>

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
            selected:'',
        };
    },
    mounted(){
        this.getsubjects();
        this.getNotes();

    },
    methods:{
        async getsubjects(){
            let response = await axios.get('/api/subjects')
            // console.log(response.data);
            if(response.status === 200){
                this.subjects=response.data
            }
        },

    async getNotes(){
        let response = await axios.get(`/api/notes/${this.$route.params.noteSlug}`);
        this.form = response.data.data
        console.log(this.form);
    },

    selectedSubject(e){
            // console.log(e.target.value);
            this.selected=e.target.value

                    //tampilkan yang oncgane selekted
            // console.log(e);
    },
    async update(){
        this.form['subject']=this.selected || this.form.subjectId

        let response = await axios.patch(`/api/notes/${this.$route.params.noteSlug}/edit`,this.form)
        if (response.status==200){
            //   console.log(response.data)
              let toast = this.$toasted.show(response.data.message, {
                    type:'success',
                    theme: "bubble",
                    position: "top-right",
                    duration : 5000
                });

            this.$router.push('/notes/table')
        }
        // console.log(this.form);
        // console.log('something');

    }

    }


}
</script>

<style>

</style>
