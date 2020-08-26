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
          <h1 class="font-weight-bold my-2 text-center" style="color: #fff"><lang>About Us</lang></h1>
          <hr class="w-header bg-blue-hr">      
          <p class="text-center text-white mb-4"><small><a href="<?= base_url()?>">Home</a> / <a href="#"><lang>About Us</lang></a></small></p>
        </div>
        
      </div>
   
  </div>
  <content class="text-center">
    <div class="card-body card-body-cascade text-center shadow-none">
        <!-- Grid row -->
        <div class="row row-cols-1 row-cols-md-3 justify-content-md-center" >      
          <!-- Card content -->
          <div class="card-body card-body-cascade text-center mt-1" >

            <div id="viewAboutAll"></div>

            <div class="social-links" style="margin-bottom: 30px;" id="Viewsosmed">
              <ul class="list-unstyled list-inline">
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/universitasagungpodomoro?fref=ts" class="facebook btn-floating btn-fb mx-1 waves-effect waves-light">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://twitter.com/PodomoroUniv" class="twitter btn-floating btn-tw mx-1 waves-effect waves-light">
                    <i class="fab fa-twitter"> </i>
                  </a>
                </li>
               
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.instagram.com/podomorouniversity/" class="instagram btn-floating btn-li mx-1 waves-effect waves-light">
                    <i class="fab fa-instagram"> </i>
                  </a>
                </li>
                <!-- <li class="list-inline-item">
                  <a class="btn-floating btn-dribbble mx-1">
                    <i class="fa fa-dribbble"> </i>
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
        <!-- Grid row -->
    </div>
  </content>
</div>
<script type="text/javascript">
$(document).ready(function () { 
    getDataContentAll('about','#viewAboutAll');

  }); 

</script>

