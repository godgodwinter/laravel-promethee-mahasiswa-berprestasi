<template>
    <button ref="refDestroy" @click="destroyData"><i class="feather icon-delete"></i></button>
</template>

<script>
export default {
    props:['endpoint_id','endpoint_kriteriaId'],
    mounted(){
            //    console.log(this.endpoint);

    },
    methods:{
       async destroyData(){
            let q = window.confirm("Apakah anda yakin menghapus data ini?");

            if (q ==true){
               console.log(`/api/kriteriadetail/${this.endpoint}/delete`);

            let response = await axios.delete(`/api/kriteriadetail/${this.endpoint_kriteriaId}/${this.endpoint_id}`);

            if(response.status==200){
                 let toast = this.$toasted.show(response.data.message, {
                    type:'success',
                    theme: "bubble",
                    position: "top-right",
                    duration : 5000
                });
                //hapus tr
            this.$refs.refDestroy.parentNode.parentNode.remove()
                    //ambil element tr
                // console.log(this.$refs.refDestroy.parentNode.parentNode.remove())

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
