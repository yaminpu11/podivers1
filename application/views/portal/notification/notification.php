<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12" style="min-height: 500px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Notification</h4>
                </div>
                <div class="panel-body">
                    <div id = "pageNotif"></div>
                </div>
            </div>

<!--        	<div class="thumbnail">-->
<!--        		<div class="row">-->
<!--        			<div class="col-xs-12">-->
<!--        				<div style="padding: 10px;">-->
<!--        					 <h1>Notification</h1>-->
<!--        				</div>-->
<!--        				<div id = "pageNotif"></div>-->
<!--        			</div>-->
<!--        		</div>-->
<!--        	</div>-->

        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('js/App_notification.js')?>"></script>
<script type="text/javascript">
	let App_this = new App_notification();
	$(document).ready(function(e){
		App_this.LoadDefault();
	})

	$(document).off('click', '.btn-read-all').on('click', '.btn-read-all',function(e) {
		App_this.set_read_all();
	})
</script>