<template>
  <div class="modalkt">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-body">
            <div class="container-fluid">
                  <div class="row justify-content-md-center">
                    <div class="col-md-10 ml-auto">{{endpoint2}}</div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-4">.col-md-4</div>
                    <div class="col-md-4 ml-auto">.col-md-4 .ml-auto</div>
                    <div class="col-md-4 ml-auto">.col-md-4 .ml-auto</div>
                </div>
                <div class="row">
                    <div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
                    <div class="col-md-2 ml-auto">.col-md-2 .ml-auto</div>
                </div>
                <div class="row">
                     <div class="col-md-6 ml-auto">.col-md-6 .ml-auto</div>
                </div> -->
          <button type="button" class="btn btn-sm" v-on:click="closeModal">
          <span aria-hidden="true">&times;</span>
          </button>
            </div>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props:['endpoint2'],
    name: 'modalkt',
   data(){
      return {

        //
      }
    },
    mounted(){

    },
    methods: {
      closeModal() {
        this.$emit('close-modal');
      },
    },
  };
</script>
<style scoped>
  .modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: block;
  overflow: hidden;
  outline: 0;
  background-color: rgba(0, 0, 0, 0.6);
  }
</style>
