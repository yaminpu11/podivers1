
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Testimony</h4>
                </div>
                <div class="panel-body">
                    <div id = "pageContent">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div class="row" style="margin-top: 30px;">-->
<!--    <div class="col-md-8 col-md-offset-2">-->
<!--    	<div class="thumbnail">-->
<!--    		<div class="row">-->
<!--    			<div class="col-xs-12">-->
<!--    				<div style="text-align: left;">-->
<!--			            <h3 class="heading-small"></h3>-->
<!--			            <hr>-->
<!--			        </div>-->
<!---->
<!--    			</div>-->
<!--    		</div>-->
<!--    	</div>-->
<!--    </div>-->
<!--</div>-->
<script type="text/javascript" src="<?= base_url('js/App_testimony.js')?>"></script>
<script type="text/javascript">
	let App_this = new App_testimony();

	$(document).ready(function(e){
		App_this.LoadDefault();
	})

	$(document).off('click','#btnSaveTestimony').on('click','#btnSaveTestimony',function(e){
		let itsme = $(this);
		App_this.Submit_testimony(itsme);
	})

	$(document).off('click','.btnInfo').on('click','.btnInfo',function(e){
		let itsme = $(this);
		App_this.__getInfo(itsme);
	})

</script>

