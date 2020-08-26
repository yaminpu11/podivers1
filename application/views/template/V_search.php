<section>
<div class="view bg-category">
  <div class="mask flex-center waves-light bg-title">
    <h1 class="flex-center text-uppercase text-white"><strong>Travel</strong></h1>
  </div>
</div>
<div class="row mx-xs-2 mx-sm-3 mx-md-3 mx-lg-5 py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="shadow">
				 	<div class="px-4 pt-4 list-group list-group-flush">
				 		<div class="list-group-item px-0 pb-4">
				 			<div class="row mx-0 mb-2" id = "ContentData">
							 	
							</div>
				 		</div>		
				 	</div>
			 	</div>
			</div>
			<div class="col-md-4">
	        	<div class="shadow">
			        <div class="px-4 py-4 list-group list-group-flush">
			        	<div class="card bg-title mb-4">

			            <div class="card-body text-center" style="line-height: 4">
			              <button type="button" class="btn btn-outline-primary btn-rounded waves-effect text-white" style="color: #fff !important" id="clock"><h1></h1></button><br>             
			              <a href="#!" class="card-link text-left text-white"><?= date('D')?></a>
			              <a href="#!" class="card-link text-center text-white"><?= date('M')?></a>
			              <a href="#!" class="card-link text-right text-white"><?= date('Y') ?></a>
			            </div>
			          </div>
			          <div class="mb-2">
			            <a class="weatherwidget-io" href="https://forecast7.com/en/n6d17106d76/west-jakarta/" data-label_1="JAKARTA BARAT" data-label_2="WEATHER" data-font="Roboto" data-icons="Climacons Animated" data-days="5" data-theme="mountains" >JAKARTA BARAT WEATHER</a>
			          </div>
			          <button class="btn facebook rem-1 text-white mx-0"><i class="fab fa-facebook "></i> Facebook</button>
			          <button class="btn twitter rem-1 mx-0"><i class="fab fa-twitter "></i> Twitter</button>
			          <button class="btn instagram rem-1 mx-0"><i class="fab fa-instagram "></i> Instagram</button>
			          
			          <div class="title pt-4 mx-1">
			            <h6 class="text-uppercase font-weight-bold">Category</h6>
			          </div>
			          <div class="list-group-item border-b-0">
			            <div class="row">
			            <ul class="list-group" id="show_category_detail">
			            </ul>
			            </div>
			          </div>
			        </div>
			    </div>
		    </div>
		</div>
	</div>
</div>

</section>

<script type="text/javascript">
	SocialShareKit.init();

</script>
<script type="text/javascript">
	$(document).ready(function(){
		show_details_search();
		show_category_detail();
	});

	function show_details_search(){
		var value= "<?php echo $search ?>";
		$.ajax({
			type : 'POST',
			url : base_url_js +'__details_search',
			dataType : 'json',
			data:{value:value},
			success : function(data){
				console.log(data);
				var html = '';
				if (data.length > 0) {
					for (var i = 0; i < data.length; i++) {
						html += '<div page="detail_content">'+
				            		'<img src="'+base_url_js_sw+'upload/'+data[i].Images+'" alt="'+data[i].Title+'" class="img-fluid d-block w-100">'+
									'<div class="card-body px-0">'+
									  	'<a href="'+base_url_js+'category/'+data[i].Category+'" class="pink-text">'+
											'<h6 class="font-weight-bold mb-3" id="category"><i class="fas fa-image pr-2"></i>'+data[i].Category+'</h6>'+
										'</a>'+
										'<h3 class="font-weight-bold mb-3"><strong id="title">'+data[i].Title+'</strong></h3>'+
										'<p>Written by <a><strong id="user">'+data[i].UpdateBY+' As '+data[i].GroupName+'</strong></a>, '+data[i].CreateAT+'</p>'+
										'<p class="card-text">'+data[i].Content+'</p>'+
									'</div>'+
								'</div>'+
								'<div page="share-sosmed">'+
			                		'<div class="col-md-12 my-3 px-0 ">'+
								  		'<h5><strong>Share:</strong></h5>'+
								  		
											'<a href="http://www.facebook.com/sharer.php?u='+base_url_js+'details/'+data[i].ID_title+'&amp;t='+data[i].Title+'" target="_blank" class="ssk ssk-facebook btn-floating btn-md btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>'+
											'<a href="http://twitter.com/home?status='+data[i].Title+'%20'+base_url_js+'details/'+data[i].ID_title+'" target="_blank" class="ssk ssk-twitter btn-floating btn-md btn-tw" type="button" role="button" data-url="http://url-for-twitter" data-text="Text for twitter" ><i class="fab fa-twitter"></i></a>'+
											'<a href="http://www.pinterest.com/pin/create/button/?url='+base_url_js+'details/'+data[i].ID_title+'&amp;media='+base_url_js_sw+'upload/'+data[i].Images+'&amp;description='+data[i].Title+'" target="_blank" class="ssk ssk-pinterest btn-floating btn-md btn-pin" type="button" role="button"><i class="fab fa-pinterest"></i></a>'+
									'</div>'+
								'</div>';
					}
				}
				else
				{
					html = '<label style="color:red;">No data Found</label>';
				}
				

				$('#ContentData').html(html);
			}

		})
	}
	function show_category_detail(){

    $.ajax({
          type  : 'ajax',
          url   : base_url_js +'__load_category',
          async : true,
          dataType : 'json',
          success : function(data){
        	  var html = '';
              var i;
              for(i=0; i<data.length; i++){
                html += '<li class="cat-li"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="'+base_url_js+'category?cat='+data[0].ID_category+'">'+data[i].Name+'</a></li>';
        	}
                $('#show_category_detail').html(html);
          }
    	});

  	}
</script>