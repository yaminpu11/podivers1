<div class="row">
	<div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Skills</h4>
                <a href="javascript:void(0);" class="btn btn-sm btn-default panel-heading-button-right btneditSkills">Edit my skills</a>
            </div>
            <div class="panel-body">
<!--                <div class="row">-->
<!--                    <div class="col-xs-7">-->
<!--                        <label style="font-size:20px;">Skills</label>-->
<!--                    </div>-->
<!--                    <div class="col-xs-5" style="text-align: right">-->
<!--                        <span class="fa fa-pencil-square-o btn btn-sm btn-primary btneditSkills"></span>-->
<!--                    </div>-->
<!--                </div>-->
                <div id = "pageContent"></div>
            </div>
        </div>

	</div>
</div>

<script type="text/javascript" src="<?= base_url('js/App_skills.js')?>"></script>
<script type="text/javascript">
	let App_this = new App_skills();

	$(document).ready(function(e){
		App_this.LoadDefault();
	})

	$(document).off('click','.btneditSkills').on('click','.btneditSkills',function(e){
		let tokenDecode = jwt_decode($(this).attr('token'));
		App_this.makeFormInput(tokenDecode);
	})

	$(document).off('click','.btncancelSkills').on('click','.btncancelSkills',function(e){
		App_this.LoadDefault();
	})	

	$(document).off('click','.btnAddSkill').on('click','.btnAddSkill',function(e){
		App_this.makebtnAddSkill();
	})

	$(document).off('click','.btnremoveSkills').on('click','.btnremoveSkills',function(e){
		let itsme = $(this);
		App_this.makebtnremoveSkills(itsme);
	})

	$(document).off('click','.btnCancelSkill').on('click','.btnCancelSkill',function(e){
		App_this.makebtnCancelSkill();
	})

	$(document).off('click','.btnSaveSkill').on('click','.btnSaveSkill',function(e){
		let selector = $(this);
		App_this.makebtnSaveSkill(selector);
	})
	
	$(document).off('keypress','.frmInput[name="SkillName"]').on('keypress','.frmInput[name="SkillName"]',function(e){
		if(e.which == 13) {
		    App_this.makebtnAddSkill();
		}
	})
</script>