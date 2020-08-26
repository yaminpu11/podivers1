<input type="hidden" name="id" id="id" value="<?= $this->uri->segment(2) ?>">

<div class="card card-cascade wider reverse mb-5" >

  <!-- Card image -->
  <div class="view  overlay" style="background-image: url(<?= base_url()?>/assets/images/event.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    <!-- <img class="card-img-top" src="<?= base_url()?>/assets/images/event.png"
      alt="Card image cap"> -->
   
      <div class="mask rgba-white-slight"></div>
      <div class="container my-5">
        <div class="col pb-4 py-5 text-white">
          <h1 class="font-weight-bold my-2 text-center" style="color: #fff"><lang>Event</lang></h1>
          <hr class="w-header bg-blue-hr">      
          <p class="text-center text-white mb-4"><small><a href="<?= base_url()?>">Home</a> / <a href="<?= base_url('event')?>"><lang>Event</lang></a></small></p>
        </div>
        
      </div>
   
  </div>
  <content class="text-center">
    <div class="card-body card-body-cascade text-center shadow-none">
        <!-- Grid row -->
        <div class="row row-cols-1 row-cols-md-3 justify-content-md-center" > 
        	<div class="col-md-8 " id="detailEvent">     
        	</div>

        </div>
        <!-- Grid row -->
    </div>
  </content>
</div>


<script type="text/javascript">
$(document).ready(function () { 
    getDataContentEventDetail('event','<?= $this->uri->segment(2) ?>','#detailEvent');
  }); 

</script>


