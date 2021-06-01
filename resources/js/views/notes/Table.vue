<template>
    <div>
       <div class="container">
           <h3>Table Of Notes</h3>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Publised</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="note,index in notes" ::key="note.slug">
                        <td>{{ index+1 }}</td>

                        <td><router-link :to="{name:'notes.show',params:{noteSlug:note.slug}}">{{note.title}}</router-link></td>
                        <!-- <td>{{note.subject}}</td> -->
                        <td>{{note.slug}}</td>
                        <td>{{note.publish}}</td>
                        <td><router-link :to="{name:'notes.edit',params:{noteSlug:note.slug}}">Edit   </router-link> || <delete-note :endpoint="note.slug" /> </td>
                    </tr>
                </tbody>
        </table>
       </div>
    </div>
</template>

<script>
import DeleteNote from './Delete'
export default {

    components:{
            DeleteNote
    },

    data(){
        return{
            notes:[],
        }
    },

    mounted(){
        this.getNotes();
    },

    methods:{

        async getNotes(){
            let {data} = await axios.get('/api/notes');
            this.notes = data.data

            // let response = await axios.get('/api/notes');
            // this.notes = response.data.dat
        }
            // console.log(this.notes);

    }

}
</script>

<style>

</style>
