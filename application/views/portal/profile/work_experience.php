<div class="row" id = "pageFormWorkExperience">
	<div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Work Experience</h4>
            </div>
            <div class="panel-body">
                <div id = "pageContent"></div>
            </div>
        </div>

	</div>
</div>
<script type="text/javascript" src="<?= base_url('js/App_working_experience.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/App_master_company.js')?>"></script>
<script type="text/javascript">
	let App_this = new App_working_experience();
	let App_company = new App_master_company();

	$(document).ready(function(e){
		App_this.LoadDefault();
	})

	$(document).off('click','#btnAddingExperience').on('click','#btnAddingExperience',function(e){
		App_this.loadCrudExperience();
	})

	$(document).off('keyup','#filterCompany').on('keyup','#filterCompany',function(e){
		let itsme = $(this);
		let filterValue = $(this).val();
		App_this.__autocomplete_company(itsme,filterValue);
	})


	$(document).off('click','.btnSelectCompany').on('click','.btnSelectCompany',function(e){
		let itsme = $(this);
		App_this.SelectCompany(itsme);
	})

	$(document).off('click','#Status').on('click','#Status',function(e){	
	    let Status = $('#Status').val();
	    if(Status=='1'){
	        $('#formEnd').addClass('hide');
	    } else {
	        $('#formEnd').removeClass('hide');
	    }

	});

	$(document).off('click','.btnEditExperience').on('click','.btnEditExperience',function(e){
	    let ID = $(this).attr('data-id');
	    let Token = $(this).attr('data-token');
	    $('#IDEx').val(ID);
	    $('#ExToken').val(Token);
	    App_this.loadCrudExperience();
	});

	$(document).off('click','#JobType').on('click','#JobType',function(e){
	    var JobType = $('#JobType').val();
	    App_this.loadSelectOptionJobLevel(JobType)
	});
	
	$(document).off('click','#btnSave').on('click','#btnSave',function(e){
	    let itsme = $(this);
	    App_this.submit_work_experience(itsme);
	});


	/* Company Scipt */

	$(document).off('click','.addCompany').on('click','.addCompany',function(e){
		App_company.Form_addCompany();
	})

	$(document).off('keyup keydown','#form-post-master .number').on('keyup keydown','#form-post-master .number',function(e){
	    this.value = this.value.replace(/[^0-9\.]/g,'');
	});

	$(document).off('change','#form-post-master #IndustryTypeID').on('change','#form-post-master #IndustryTypeID',function(e){
	    var value = $(this).val();
	    if($.isNumeric(value)){
	        if(value == 60){
	            $("#form-post-master .oth-industry").removeClass('hidden');
	            $("#form-post-master .oth-industry .com-Industry").addClass("required");
	        }else{
	            $("#form-post-master .oth-industry .com-Industry").val("").removeClass("required");
	            $("#form-post-master .oth-industry").addClass('hidden');
	        }
	    }
	});

	$(document).off('change','#form-post-master #CountryID').on('change','#form-post-master #CountryID',function(e){
	    var value = $(this).val();
	    if($.isNumeric(value)){
	        if(value == '001'){
	            $("#form-post-master .isrequire").addClass("required").prop("disabled",false);;
	            App_company.loadSelectOptionLoc_Province('#ProvinceID','');
	        }else{
	            $("#form-post-master .isrequire").val("").removeClass("required").prop("disabled",true);
	            $("#form-post-master .isrequire").next().text("");
	        }
	    }
	});

	$(document).off('change','#form-post-master #ProvinceID').on('change','#form-post-master #ProvinceID',function(e){
	    var ProvinceID = $('#ProvinceID').val();
	    $('#RegionID').html('<option value="" disabled selected>-- Select Region --</option>');
	    $('#DistrictID').html('<option value="" disabled selected>-- Select District --</option>');
	    if(ProvinceID!='' && ProvinceID!=null){
	        App_company.loadSelectOptionLoc_Regions(ProvinceID,'#RegionID','');
	    }
	});

	$(document).off('change','#form-post-master #RegionID').on('change','#form-post-master #RegionID',function(e){
	    var RegionID = $('#RegionID').val();
	    $('#DistrictID').html('<option value="" disabled selected>-- Select District --</option>');
	    if(RegionID!='' && RegionID!=null){
	        App_company.loadSelectOptionLoc_District(RegionID,'#DistrictID','');
	    }
	});

	$(document).off('click','#form-post-master #btnSave2').on('click','#form-post-master #btnSave2',function(e){
		let itsme = $(this);
		App_company.submit_save(itsme);
	});

	$(document).off('click','.btnCloseModalCompany').on('click','.btnCloseModalCompany',function(e){
		App_company.CloseModalCompany();
	});
	
</script>
