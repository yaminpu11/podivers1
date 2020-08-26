<style type="text/css">
	#tableTopic tr th {
	    text-align: center;
	    color: #FFFFFF;
	    background: #607d8b;
	}
</style>

<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12" style="min-height: 500px;">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">List Topic</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover" id="tableTopic">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Topic</th>
                            <th>Users</th>
                            <th>Comments</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

<!--        	<div class="thumbnail">-->
<!--        		<div class="row">-->
<!--        			<div class="col-xs-12">-->
<!--        				<div style="text-align: left;">-->
<!--				            <h3 class="heading-small">List Topic</h3>-->
<!--				            <hr>-->
<!--				        </div>-->
<!---->
<!--        			</div>-->
<!--        		</div>-->
<!--        	</div>-->
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('js/App_alumni_forum.js')?>"></script>
<script type="text/javascript">
	let AppThis = new App_alumni_forum();

	$(document).ready(function(e){
		let selectorTbl = $('#tableTopic');
		AppThis.LoadDefault(selectorTbl);
	})


	$(document).off('click','.btn-add-topic').on('click','.btn-add-topic',function(e){
		AppThis.makeForm_action();
	})

	$(document).off('click','.btnSaveModalAlumni').on('click','.btnSaveModalAlumni',function(e){
		let itsme = $(this);
		let action = itsme.attr('action');
		let ID = itsme.attr('data-id');
		AppThis.submit_form_action(itsme,action,ID);
	})

	$(document).off('click','.btnG_user').on('click','.btnG_user',function(e){
		let token = $(this).attr('data');
		let de = jwt_decode(token);
		AppThis.showModalUser(de);
	})

</script>