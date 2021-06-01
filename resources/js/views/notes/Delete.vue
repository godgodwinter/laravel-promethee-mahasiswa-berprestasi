<template>
    <button ref="refdestroyNote" @click="destroyNote">Delete</button>
</template>

<script>
export default {
    props:['endpoint'],
    mounted(){
            //    console.log(this.endpoint);

    },
    methods:{
       async destroyNote(){
            let q = window.confirm("Apakah anda yakin menghapus data ini?");

            if (q ==true){
            //    console.log(this.endpoint);
            let response = await axios.delete(`/api/notes/${this.endpoint}/delete`);

            if(response.status==200){
                 let toast = this.$toasted.show(response.data.message, {
                    type:'success',
                    theme: "bubble",
                    position: "top-right",
                    duration : 5000
                });
                //hapus tr
            this.$refs.refdestroyNote.parentNode.parentNode.remove()
                    //ambil element tr
                // console.log(this.$refs.refdestroyNote.parentNode.parentNode.remove())

            }
            }else{

            console.log('not deleted');
            }
        }
    }
}
</script>

<style>

</style>
