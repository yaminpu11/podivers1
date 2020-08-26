class App_skills {

	constructor(){
		this.arr_level = ['Tingkat Lanjut','Menengah','Pemula'];
	}

	LoadDefault = () => {
		App_template.LoadingModalStart();
		let selector = $('#pageContent');
		App_global.__Load_ajax_page_skills(selector);
		$('.btneditSkills').removeClass('hide');
	}

	__OpLevel = (dataselected='Menengah') => {
		let cls = this;
		let html = '<select class = "form-control frmInput" name = "Level">';
		let arr_level = cls.arr_level;
		for (var i = 0; i < arr_level.length; i++) {
			let selected = (arr_level[i] == dataselected) ? 'selected' : '';
			html +='<option value = "'+arr_level[i]+'" '+selected+' >'+arr_level[i]+'</option>';
		}

		html += '</select>';

		return html;
	}

	__makeAddDomSkill = () => {
		let cls = this;
		let htmlOplevel = cls.__OpLevel();
		let html  = '<div class = "row">'+
					'<div class = "col-xs-9">'+
						'<div class = "row divInput" action = "add" data-id = "">'+
							'<div class = "col-xs-9">'+
								'<div class = "form-group">'+
									'<input type = "text" class = "form-control frmInput" name = "SkillName">'+
								'</div>'+
							'</div>'+
							'<div class = "col-xs-3">'+
								htmlOplevel+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class = "col-xs-3">'+
						'<span class="fa fa-times btn btn-sm btn-warning btnremoveSkills"></span>'+
					'</div>'+
				 '</div>'
				 ;
		return html;
	}

	makebtnAddSkill = () => {
		let pageSelector = $('#pageContent');
		let AddDomSkill = this.__makeAddDomSkill();
		pageSelector.find('#form_dom').append(AddDomSkill);
		pageSelector.find('#form_dom').find('.frmInput[name="SkillName"]:last').focus();
	}

	makebtnremoveSkills = (selector) => {
		selector.closest('.row').remove();
	}

	makebtnCancelSkill = () => {
		this.LoadDefault();
	}

	makeFormInput = (data=[]) => {
		let cls = this;
		$('.btneditSkills').addClass('hide');
		let pageSelector = $('#pageContent');
		let html  = 	'<div id ="form_dom"><div class = "row" style = "margin-top:15px;">'+
							'<div class = "col-xs-9">'+
								'<div class = "row">'+
									'<div class = "col-xs-9">'+
										'<label style = "color:blue;">Skill</label>'+
									'</div>'+
									'<div class = "col-xs-3">'+
										'<label style = "color : blue;">Level</label>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div class = "col-xs-3" style = "text-align:right;">'+
								'<span class="fa fa-plus btn btn-sm btn-default btnAddSkill"> Add</span>'+
							'</div>'+
				 		'</div>'
				 ;

		// check isi data
		let boolcheckdata = false;
		for (var i = 0; i < data.length; i++) {
			let dtdata = data[i].data;
			if (dtdata.length > 0) {
				boolcheckdata = true;
				break;
			}
		}

		if (!boolcheckdata) {
			let AddDomSkill = cls.__makeAddDomSkill();
			html += AddDomSkill;
		}
		else
		{
			for (var i = 0; i < data.length; i++) {
				let dtdata = data[i].data;
				if (dtdata.length > 0) {

					for (var j = 0; j < dtdata.length; j++) {
						let htmlOplevel = cls.__OpLevel(dtdata[j].Level);
						html  += '<div class = "row">'+
									'<div class = "col-xs-9">'+
										'<div class = "row divInput" action = "edit" data-id = "'+dtdata[j].ID+'">'+
											'<div class = "col-xs-9">'+
												'<div class = "form-group">'+
													'<input type = "text" class = "form-control frmInput" name = "SkillName" value = "'+dtdata[j].SkillName+'" >'+
												'</div>'+
											'</div>'+
											'<div class = "col-xs-3">'+
												htmlOplevel+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class = "col-xs-3">'+
										'<span class="fa fa-times btn btn-sm btn-warning btnremoveSkills"></span>'+
									'</div>'+
								 '</div>'
								 ;
					}

					
				}
				
			}
		}

		html  += '</div>';

		html += '<div class = "row">'+
					'<div class = "col-xs-12" style = "text-align:right;">'+
						'<span class = "btn btn-sm btn-danger btnCancelSkill">Cancel</span> '+
						'<span class = "btn btn-sm btn-success btnSaveSkill">Save</span> '+
					'</div>'+
				'</div>';	

		pageSelector.html(html);		 
		pageSelector.find('#form_dom').find('.frmInput[name="SkillName"]:last').focus();

	}

	makebtnSaveSkill = (selector) => {
		let cls = this;
		let data = [];
		let htmlBtn = selector.html();
		$('#form_dom').find('.divInput').each(function(e){
			let Objdata = {};
			Objdata = {
				SkillName : $(this).find('.frmInput[name="SkillName"]').val(),
				Level : $(this).find('.frmInput[name="Level"] option:selected').val(),
			}	

			data.push(Objdata);
		})

		let validation = cls.validation(data);
		if (validation) {

			if (confirm('Are you sure ?')) {
				let url = base_url_js+'action1/submit_skills';
				let dataForm = data;
				let token = jwt_encode(dataForm,'UAP)(*');
				App_template.Loading_button(selector);
				AjaxSubmitForm(url,token).then(function(response){
				    if (response == 1) {
				        cls.LoadDefault();
				        toastr.info('Success');
				    }
				    App_template.End_loading_button(selector,htmlBtn);
				}).fail(function(response){
				   toastr.error('Connection error,please try again');
				   App_template.End_loading_button(selector,htmlBtn);
				})
			}

		}

	}

	validation = (arr_data) => {
		let toatString = "";
		let result = "";
		for (var i = 0; i < arr_data.length; i++) {
			let indexNo = i+1;
			let arr = arr_data[i];
			for(let key in arr){
			   switch(key)
			   {
			    default :
			    		let nm = key+' '+(indexNo);
			    	  	result = Validation_required(arr[key],nm);
			    	  	if (result['status'] == 0) {
			    	  	  toatString += result['messages'] + "<br>";
			    	  	}
			   }
			}
		}

		if (toatString != "") {
		  toastr.error(toatString, 'Failed!!');
		  return false;
		}
		return true
	}

}