class App_working_experience {
	
	constructor(){

	}

	LoadDefault = () => {
		App_template.LoadingModalStart();
		let cls = this;
		let selector = $('#pageContent');
		let htmlFirst = '<div class = "row">'+
							'<div class = "col-xs-12">'+
								' <input class="hide" value="'+sessionNPM+'" id="dataNPMStd">'+
						        '<input class="hide" value="" id="IDEx">'+
						        '<input class="hide" value="" id="ExToken">'+
						        '<input class="hide" value="'+sessionNPM+' - '+sessionName+'" id="dataName">'+
						        '<div id="loadViewAlumni"></div>'+
						    '</div>'+
						'</div>'; 
		selector.html(htmlFirst);   
		cls.loadViewAlumni();
	}

	loadViewAlumni = () => {
		let selector = $('#loadViewAlumni');
		App_global.__Load_ajax_page_work_experience(selector);
	}

	loadCrudExperience = () => {
		let cls = this;
		let viewName = $('#viewName').text();
		let NPM = $('#dataNPMStd').val();
		let IDEx = $('#IDEx').val();

		$('#GlobalModal .modal-header').html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
		    '<h4 class="modal-title">'+viewName+'</h4>');
		$('#GlobalModal .modal-body').html('<div class="row">' +
		    '    <div class="col-md-12">' +
		    '        <div class="well">' +
		    '           <div style="text-align: right;margin-bottom: 5px;"><a href="javascript:void(0)" class = "addCompany">Add new master company</a></div>' +
		    '            <input class="form-control" placeholder="Search company" id="filterCompany">' +
		    '            <table class="table table-centre">' +
		    '               <thead>' +
		    '                   <tr>' +
		    '                       <th style="width: 1%;">No</th>' +
		    '                       <th>Company</th>' +
		    '                       <th style="width: 5%;"><i class="fa fa-cog"></i></th>' +
		    '                   </tr>' +
		    '               </thead>' +
		    '               <tbody id="showFilterCompany"></tbody>' +
		    '            </table>' +
		    '        </div>' +
		    '    </div>' +
		    '</div>' +
		    '<div class="row">' +
		    '<input class="hide" id="ID" value="'+IDEx+'">' +
		    '    <div class="col-md-12" id="formAdd">' +
		    '        <div class="form-group">' +
		    '            <input class="form-control hide" id="CompanyID">' +
		    '            <h3 id="viewCompany" style="text-align: center;color: royalblue;">-</h3>' +
		    '        </div>' +
		    '        <div class="form-group">' +
		    '            <label>Title</label>' +
		    '            <input class="form-control hide" id="NPM" value="'+NPM+'">' +
		    '            <input class="form-control" id="Title">' +
		    '        </div>' +
		    '        <div class="form-group">' +
		    '            <label>Job Level</label>' +
		    '            <div class="row">' +
		    '               <div class="col-xs-5">' +
		    '                   <select class="form-control" id="JobType">' +
		    '                       <option value="1">Bekerja</option>' +
		    '                       <option value="2">Berwirausaha</option>' +
		    '                   </select>' +
		    '               </div>' +
		    '               <div class="col-xs-7">' +
		    '                   <select class="form-control" id="JobLevelID">' +
		    '                   </select>' +
		    '               </div>' +
		    '           </div>' +
		    '        </div>' +
		    '        <div class="form-group">' +
		    '            <label>Position Level</label>' +
		    '            <select class="form-control" id="PositionLevelID"></select>' +
		    '        </div>' +
		    '        <div class="form-group">' +
		    '           <div class="row">' +
		    '               <div class="col-xs-4">' +
		    '                   <label>Start Month</label>' +
		    '                   <select class="form-control" id="StartMonth"></select>' +
		    '               </div>' +
		    '               <div class="col-xs-4">' +
		    '                   <label>Star Year</label>' +
		    '                   <input class="form-control" type="number" id="StartYear">' +
		    '               </div>' +
		    '               <div class="col-xs-4">' +
		    '                   <label>Current position ?</label>'+
		    '                   <select class="form-control" id="Status">' +
		    '                     <option value="1">Yes</option>' +
		    '                     <option value="0">No</option>' +
		    '                   </select>' +
		    '               </div>' +
		    '           </div>' +
		    '        </div>' +
		    '        <div class="form-group hide" id="formEnd">' +
		    '           <div class="row">' +
		    '               <div class="col-xs-4">' +
		    '                   <label>End Month</label>' +
		    '                   <select class="form-control" id="EndMonth"></select>' +
		    '               </div>' +
		    '               <div class="col-xs-4">' +
		    '                   <label>End Year</label>' +
		    '                   <input class="form-control" type="number" id="EndYear">' +
		    '               </div>' +
		    '           </div>' +
		    '        </div>' +
		    '        <div class="form-group">' +
		    '           <label>Work Suitability</label>' +
		    '           <select class="form-control" style="width: 150px;" id="WorkSuitability">' +
		    '               <option value="0">Low</option>' +
		    '               <option value="1">Medium</option>' +
		    '               <option value="2">High</option>' +
		    '           </select>' +
		    '        </div>' +
		    '        <div class="form-group">' +
		    '            <label>Job Description</label>' +
		    '            <textarea class="form-control" rows="3" id="JobDescription"></textarea>' +
		    '        </div>' +
		    '    </div>' +
		    '</div>');

		var Token = $('#ExToken').val();
		var dataToken = (Token!='') ? jwt_decode(Token,'UAP)(*') : [];

		var PositionLevelID = (Token!='') ? dataToken.PositionLevelID : '';
		cls.loadSelectOptionExperiencePosistionLevel('#PositionLevelID',PositionLevelID);
		cls.loadSelectOptionMonth('#StartMonth','');
		cls.loadSelectOptionMonth('#EndMonth','');


		
		if(Token!=''){

		    // console.log(dataToken);

		    $('#Title').val(dataToken.Title);
		    $('#viewCompany').html(dataToken.Company);
		    $('#CompanyID').val(dataToken.CompanyID);

		    $('#StartMonth').val(dataToken.StartMonth);
		    $('#StartYear').val(dataToken.StartYear);
		    $('#Status').val(dataToken.Status);
		    $('#EndMonth').val(dataToken.EndMonth);
		    $('#EndYear').val(dataToken.EndYear);
		    $('#WorkSuitability').val(dataToken.WorkSuitability);
		    $('#JobDescription').val(dataToken.JobDescription);

		    if(dataToken.Status=='0'){
		        $('#formEnd').removeClass('hide');
		    } else {
		        $('#formEnd').addClass('hide');
		    }

		    var JobType = (dataToken.JobType!='' && dataToken.JobType!=null) ? dataToken.JobType : '1';
		    var JobLevelID = (dataToken.JobLevelID!='' && dataToken.JobLevelID!=null && parseInt(dataToken.JobLevelID)!=0)
		        ? dataToken.JobLevelID : '';
		    cls.loadSelectOptionJobLevel(JobType,JobLevelID);

		} else {
		    cls.loadSelectOptionJobLevel('1','');
		}

		$('#GlobalModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
		    '<button type="button" class="btn btn-success" id="btnSave">Save</button>');
		$('#GlobalModal').modal({
		    'show' : true,
		    'backdrop' : 'static'
		});

	}

	loadSelectOptionExperiencePosistionLevel = (element,selected) => {
	    var token = jwt_encode({action : 'loadPositionLevel'},'UAP)(*');
	    var url = base_url_js_pcam+'api3/__crudTracerAlumni';

	    $.post(url,{token:token},function (jsonResult) {

	        if(jsonResult.length>0){
	            $.each(jsonResult,function (i,v) {

	                var sc = (selected!='' && selected!=null
	                    && selected !== 'undefined' && selected==v.ID) ? 'selected' : '';
	                $(element).append('<option value="'+v.ID+'" '+sc+'>'+v.Description+'</option>');

	            });
	        }

	    });

	}

	loadSelectOptionMonth = (element,selected) => {

	    var m = moment();
	    for (var i = 0; i < 12; i++) {
	        var sc = (selected!='' && selected!=null
	            && selected!=='undefined' && selected==(i+1)) ? 'selected' : '';
	        $(element).append('<option value="'+(i+1)+'" '+sc+'>'+m.months(i).format('MMMM')+'</option>');
	    }

	}

	loadSelectOptionJobLevel = (JobType,Selected) => {

	    var data = {
	        action : 'getJobLevel',
	        JobType : JobType
	    };
	    var token = jwt_encode(data,'UAP)(*');

	    var url = base_url_js_pcam+'api3/__crudTracerAlumni';

	    $.post(url,{token:token},function (jsonResult) {
	        $('#JobLevelID').empty();
	        if(jsonResult.length>0){
	            $.each(jsonResult,function (i,v) {

	                var sc = (Selected!='' && v.ID==Selected) ? 'selected' : '';

	                $('#JobLevelID').append('<option value="'+v.ID+'" '+sc+'>'+v.Description+'</option>');
	            });
	        }

	    });

	}

	__autocomplete_company =(selector,filterValue) => {
		let filterCompany = filterValue;
		if(filterCompany!='' && filterCompany!=null){
		    var data = {
		        action : 'searchMasterCompany',
		        Key : filterCompany
		    };
		    var token = jwt_encode(data,'UAP)(*');

		    var url = base_url_js_pcam+'api3/__crudTracerAlumni';

		    $.post(url,{token:token},function (jsonResult) {

		        $('#showFilterCompany').empty();

		        if(jsonResult.length>0){
		            $.each(jsonResult,function (i,v) {
		                $('#showFilterCompany').append('<tr>' +
		                    '<td>'+(i+1)+'</td>' +
		                    '<td style="text-align: left;" id="NameC_'+v.ID+'">'+v.Name+'</td>' +
		                    '<td><button class="btn btn-sm btn-default btnSelectCompany" data-id="'+v.ID+'"><i class="fa fa-download"></i></button></td>' +
		                    '</tr>');
		            });
		        }
		    });

		}
	}

	SelectCompany = (selector) => {
		let ID = selector.attr('data-id');
		let Name = $('#NameC_'+ID).text();

		$('#CompanyID').val(ID);
		$('#viewCompany').html(Name);
	}


	submit_work_experience = async (selector) => {
		let htmlBtn = selector.html();
		let formTrue = true;
		let dataForm = '{';
		let lg = $('#formAdd .form-control').length;
		$('#formAdd .form-control').each(function (i,v) {

		    let ID = $(this).attr('id');
		    v = $(this).val();
		    let vr = (v!='') ? v : "";

		    let Status = $('#Status').val();
		    if(Status=='0'){
		        if(v==''){
		            formTrue = false;
		            $('#'+ID).css('border','1px solid red');
		        } else {
		            $('#'+ID).css('border','1px solid green');
		        }
		    } else {
		        if(ID!='EndYear' && v==''){
		            formTrue = false;
		            $('#'+ID).css('border','1px solid red');
		        } else {
		            $('#'+ID).css('border','1px solid green');
		        }

		        if(ID=='EndMonth'){
		            vr = "";
		        }
		    }


		    let koma = ((i+1) == lg) ? '' : ',';

		    dataForm = dataForm+'"'+ID+'" : "'+vr+'"'+koma;


		    if((i+1) == lg){
		        dataForm = dataForm+'}';
		    }

		});

		dataForm = JSON.parse(dataForm);
		let ID = $('#ID').val();

		if(formTrue){

		     App_template.Loading_button(selector);

		    let data = {
		        action : 'updateDataExperience',
		        ID : (ID!='') ? ID : '',
		        dataForm : dataForm
		    };
		
		    let token = jwt_encode(data,'UAP)(*');
		    let url = base_url_js+'action1/submit_work_experience';
		   	const ajaxGetResponse = await AjaxSubmitFormPromises(url,token);
		   	if (ajaxGetResponse == 1) {
		   		toastr.success('Data saved');
		   		App_this.LoadDefault();
		   		$('#IDEx').val('');
		   		$('#ExToken').val('');
		   		setTimeout(function () {
		   		    $('#GlobalModal').modal('hide');
		   		},500);
		   	}

		} else {
		    toastr.warning('All form are required');
		}
	}

}