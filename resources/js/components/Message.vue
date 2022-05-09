<template>
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Send Message
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send message {{sellerName}}{{userId}}{{receiverId}}{{adId}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" placeholder="write your message"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send Message</button>
      </div>
    </div>
  </div>
</div>

    </div>
</template>

<script>

export default{
  props:['sellerName','userId','receiverId','adId'],
 data() {
        return {
            body: "",
            successMessage:false,
            showViewConversationOnSuccess:true
        };
    },
    methods: {
        sendMessage()
        {
            if(this.body==''){
                //alert('please write your message')
                this.$toaster.warning('please write your message.', {timeout: 8000})

                return;

            }
            axios.post('/send/message',{
                body:this.body,
                receiverId:this.receiverId,
                userId:this.userId,
                adId:this.adId
            }).then((response)=>{
                this.body=''
                this.successMessage=true,
                this.showViewConversationOnSuccess=false
            })
        }
    }
};
</script>
