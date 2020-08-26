<style type="text/css">
  .map-container-3{
    overflow:hidden;
    padding-bottom:26.25%;
    position:relative;
    height:0;
  }
  .map-container-3 iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
  }
</style>

<div class="card card-cascade wider reverse mb-5" >

  <!-- Card image -->
  <div class="view  overlay" style="background-image: url(assets/images/event.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    <!-- <img class="card-img-top" src="<?= base_url()?>/assets/images/event.png"
      alt="Card image cap"> -->
   
      <div class="mask rgba-white-slight"></div>
      <div class="container my-5">
        <div class="col pb-4 py-5 text-white">
          <h1 class="font-weight-bold my-2 text-center" style="color: #fff"><lang>Contact Us</lang></h1>
          <hr class="w-header bg-blue-hr">      
          <p class="text-center text-white mb-4"><small><a href="<?= base_url()?>">Home</a> / <a href="#"><lang>Contact Us</lang></a></small></p>
        </div>
        
      </div>
   
  </div>
  <content class="text-center">
    <div class="card-body card-body-cascade text-center shadow-none">
        <!-- Grid row -->
        <div class="row row-cols-1 row-cols-md-3 justify-content-md-center" >      
          <!-- Card content -->
          <div class="card-body card-body-cascade text-center mt-1" >
            <!-- Buttons-->
            <div class="row text-center mb-4">
              <div class="col-md-4">
                <a class="btn-floating btn-red accent-1 mb-4">
                  <i class="fas fa-map-marker-alt"></i>
                </a>
                <p>Central Park Mall 3rd Floor - Unit 112 Podomoro City, </p>
                <p class="mb-md-0">Jl. Let. Jend. S. Parman Kav. 28
                  West Jakarta, 11470, Indonesia</p>
              </div>
              <div class="col-md-4">
                <a class="btn-floating btn-red accent-1 mb-4">
                  <i class="fas fa-phone"></i>
                </a>
                <p>021-29200456</p>
                <p class="mb-md-0">Monday - Friday 10 AM - 5 PM</p>
                <p>Saturday 10 AM - 4 PM</p>
                <p>Sunday & Public Holiday CLOSED</p>
              </div>
              <div class="col-md-4">
                <a class="btn-floating btn-red accent-1 mb-4">
                  <i class="fas fa-envelope"></i>
                </a>
                <p class="mb-0"> info@podomorouniversity.ac.id</p>
              </div>
            </div>
            <div id="viewAboutAll" class="mb-4">
              <!--Google map-->
                <div id="map-container-google-3" class=" map-container-3">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3584.4481092537444!2d106.7884959144663!3d-6.177367895527752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f65f1c966b81%3A0x80e01463bb72c6e9!2sPodomoro%20University!5e1!3m2!1sen!2sus!4v1596802367598!5m2!1sen!2sus" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
              

            </div>

            

          </div>
        </div>
        <!-- Grid row -->
    </div>
  </content>
</div>
<!-- <script type="text/javascript">
$(document).ready(function () { 
    getDataContentAll('contact','#viewAboutAll');

  }); 

</script> -->

