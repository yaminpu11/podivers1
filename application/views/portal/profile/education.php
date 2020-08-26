<div class="row" id = "pageFormEducation">
	<div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Education</h4>
                <a href="javascript:void(0);" class="btn btn-sm btn-default panel-heading-button-right btnAddEducation">Add new data education</a>
            </div>
            <div class="panel-body">
<!--                <div class="row">-->
<!--                    <div class="col-xs-7">-->
<!--                    </div>-->
<!--                    <div class="col-md-5" style="text-align: right">-->
<!--                        <span class="fa fa-plus btn btn-sm btn-default btnAddEducation"> Add</span>-->
<!--                    </div>-->
<!--                </div>-->
                <div id = "pageContent"></div>
            </div>
        </div>

	</div>
</div>

<script type="text/javascript" src="<?= base_url('js/App_education.js')?>"></script>
<script type="text/javascript">
	let App_this = new App_education();

	$(document).ready(function(e){
		App_this.LoadDefault();
	})

	$(document).off('click','.btnAddEducation').on('click','.btnAddEducation',function(e){
		App_this.makeFormInput();
	})

	$(document).off('click','.btnCanceEducation').on('click','.btnCanceEducation',function(e){
		App_this.LoadDefault();
	})

	$(document).off('click','.btneditEducation').on('click','.btneditEducation',function(e){
		let getTokenData = $(this).closest('.DataRow').attr('data-token');
		let data = jwt_decode(getTokenData);
		// disable data input by PU
		if (data['ID_university'] == 52) {
			toastr.info('Education of Universitas Agung Podomoro is fixed by system');
		}
		else
		{
			App_this.makeFormInput(data);
		}
	})

	$(document).off('click','.btnremoveEducation').on('click','.btnremoveEducation',function(e){
		let itsme = $(this);
		let getTokenData = itsme.closest('.DataRow').attr('data-token');
		let data = jwt_decode(getTokenData);
		// disable data input by PU
		if (data['ID_university'] == 52) {
			toastr.info('Education of Universitas Agung Podomoro is fixed by system');
		}
		else
		{
			let action = 'delete';
			let ID = itsme.closest('.DataRow').attr('data-id');
			App_this.SubmitSaveEducation(itsme,action,ID);
		}
	})

	$(document).off('click','.btnSaveEducation').on('click','.btnSaveEducation',function(e){
		let selector = $(this);
		let action = selector.attr('action');
		let ID = selector.attr('data-id');
		App_this.SubmitSaveEducation(selector,action,ID);
	})
</script>