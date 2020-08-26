class App_education {
	constructor(){

	}

	LoadDefault = () => {
		App_template.LoadingModalStart();
		let selector = $('#pageContent');
		App_global.__Load_ajax_page_education(selector);
	}

	makeFormInput = (data={}) => {
		App_template.LoadingModalStart();
		let cls = this;
		let selectorHTML = $('#pageContent');
		let ClassRow = 'rowFormInput';
		let html = '<div class = "'+ClassRow+'">'+
					'<div class = "row">'+
						'<div class = "col-xs-6">'+
							'<div class = "form-group">'+
								'<label>Choose University</label>'+
								'<select class = "frmInput form-control" name = "ID_university">'+
								'</select>'+
							'</div>'+
						'</div>'+
						'<div class = "col-xs-6">'+
							'<div class = "form-group">'+
								'<label>Education Level</label>'+
								'<select class = "frmInput form-control" name = "edu_code">'+
								'</select>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class = "row">'+
						'<div class = "col-xs-6">'+
							'<div class = "form-group">'+
								'<label>Choose Country</label>'+
								'<select class = "frmInput form-control" name = "ctr_code">'+
								'</select>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class = "row">'+
						'<div class = "col-xs-6">'+
							'<div class = "form-group">'+
								'<label>Choose Major</label>'+
								'<select class = "frmInput form-control" name = "ID_major_programstudy_employees">'+
								'</select>'+
							'</div>'+
						'</div>'+
						'<div class = "col-xs-6">'+
							'<div class = "form-group">'+
								'<label>IPK</label>'+
								'<input type = "text" class = "form-control frmInput" name="IPK"/>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class = "row">'+
						'<div class = "col-xs-12">'+
							'<div class = "form-group">'+
								'<label>Description</label>'+
								'<textarea class = "frmInput form-control" name ="Description"></textarea>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class = "row">'+
						'<div class = "col-xs-12" style = "text-align:right">'+
							'<button class = "btn btn-sm btn-success btnSaveEducation">Save</button> '+
							'<button class = "btn btn-sm btn-danger btnCanceEducation">Cancel</button> '+
						'</div>'+
					'</div>'
				   '</div>'
				 ;
		selectorHTML.html(html);
		let selectorForm = $('.'+ClassRow);

		// ajax data
		cls.__domUniversity(data,selectorForm);
		cls.__domEducationLevel(data,selectorForm);
		cls.__domCountry(data,selectorForm);
		cls.__domMajor(data,selectorForm);

		// check action
			if (data['ID'] !== undefined) {
				$('.btnSaveEducation').attr('action','edit');
				$('.btnSaveEducation').attr('data-id',data['ID']);
				$('.frmInput[name="IPK"]').val(data['IPK']);
				$('.frmInput[name="Description"]').val(data['Description']);
			}
			else
			{
				$('.btnSaveEducation').attr('action','add');
				$('.btnSaveEducation').attr('data-id','');
			}

		$('.frmInput[name="IPK"]').maskMoney({thousands:',', decimal:'.', precision:2,allowZero: true});
		$('.frmInput[name="IPK"]').maskMoney('mask', '9894');

		var firstLoad = setInterval(function () {
			let bool = true;
            selectorForm.find('select').each(function(e){
            	let sel = $(this);
            	if (!sel.find('option').length) {
            		bool = false;
            		return;
            	}
            })

            if(bool ){
                App_template.LoadingModalEnd();
                clearInterval(firstLoad);
            }
        },1000);
        setTimeout(function () {
            clearInterval(firstLoad);
        },5000);


	}

	__domMajor = (data={},selectorForm) => {
		let selector = selectorForm.find('.frmInput[name="ID_major_programstudy_employees"]');
		let url = base_url_js_pcam+'api4/__getTableMaster';
		let dataToken = {
			table : 'db_employees.major_programstudy_employees',
		};
		let token = jwt_encode(dataToken,'UAP)(*');
		AjaxSubmitForm(url,token).then(function(response){
			selector.empty();
			let varSelected = (data['ID_major_programstudy_employees'] !== undefined) ? '' : 'selected'; 
			selector.append(
				'<option value = "" '+varSelected+'>--Choose one--</option>'
				);
			for (var i = 0; i < response.length; i++) {
				let selected = (data['ID_major_programstudy_employees'] !== undefined && response[i].ID == data['ID_major_programstudy_employees'] ) ? 'selected' : '' ;
				selector.append(
					'<option value = "'+response[i].ID+'" '+selected+'>'+response[i].Name_MajorProgramstudy+'</option>'
					);
			}
			selector.select2();
		}).fail(function(response){
		   toastr.error('Connection error,please try again');
		})

	}

	__domCountry = (data={},selectorForm) => {
		let selector = selectorForm.find('.frmInput[name="ctr_code"]');
		let url = base_url_js_pcam+'api4/__getTableMaster';
		let dataToken = {
			table : 'db_admission.country',
		};
		let token = jwt_encode(dataToken,'UAP)(*');
		AjaxSubmitForm(url,token).then(function(response){
			selector.empty();
			let varSelected = (data['ctr_code'] !== undefined) ? '' : 'selected'; 
			selector.append(
				'<option value = "" '+varSelected+'>--Choose one--</option>'
				);
			for (var i = 0; i < response.length; i++) {
				let selected = (data['ctr_code'] !== undefined && response[i].ctr_code == data['ctr_code'] ) ? 'selected' : '' ;
				selector.append(
					'<option value = "'+response[i].ctr_code+'" '+selected+'>'+response[i].ctr_name+'</option>'
					);
			}
			selector.select2();
		}).fail(function(response){
		   toastr.error('Connection error,please try again');
		})

	}

	__domEducationLevel = (data={},selectorForm) => {
		let selector = selectorForm.find('.frmInput[name="edu_code"]');
		let url = base_url_js_pcam+'api4/__getTableMaster';
		let dataToken = {
			table : 'db_admission.education',
		};
		let token = jwt_encode(dataToken,'UAP)(*');
		AjaxSubmitForm(url,token).then(function(response){
			selector.empty();
			let varSelected = (data['edu_code'] !== undefined) ? '' : 'selected'; 
			selector.append(
				'<option value = "" '+varSelected+'>--Choose one--</option>'
				);
			for (var i = 0; i < response.length; i++) {
				let selected = (data['edu_code'] !== undefined && response[i].edu_code == data['edu_code'] ) ? 'selected' : '' ;
				selector.append(
					'<option value = "'+response[i].edu_code+'" '+selected+'>'+response[i].edu_name+'</option>'
					);
			}
			selector.select2();
		}).fail(function(response){
		   toastr.error('Connection error,please try again');
		})

	}

	__domUniversity = (data={},selectorForm) => {
		let selector = selectorForm.find('.frmInput[name="ID_university"]');
		let url = base_url_js_pcam+'api4/__getTableMaster';
		let dataToken = {
			table : 'db_research.university',
		};
		let token = jwt_encode(dataToken,'UAP)(*');
		AjaxSubmitForm(url,token).then(function(response){
			selector.empty();
			let varSelected = (data['ID_university'] !== undefined) ? '' : 'selected'; 
			selector.append(
				'<option value = "" '+varSelected+'>--Choose one--</option>'
				);
			for (var i = 0; i < response.length; i++) {
				let selected = (data['ID_university'] !== undefined && response[i].ID == data['ID_university'] ) ? 'selected' : '' ;
				if (response[i].ID != 52) { // exception PU
					selector.append(
						'<option value = "'+response[i].ID+'" '+selected+'>'+response[i].Name_University+'</option>'
						);
				}
			}
			selector.select2();
		}).fail(function(response){
		   toastr.error('Connection error,please try again');
		})

	}

	SubmitSaveEducation = (selector,action='add',ID='') => {
		let cls = this;
		let data = {};
		let htmlBtn = selector.html();
		$('#pageContent').find('.frmInput').each(function(e){
			let nm = $(this).attr('name');
			let v = '';
			if ($(this).is('select')) {
			    v = $(this).find('option:selected').val();
			}
			else
			{
				v = $(this).val();
			}

			data[nm] = v;
		})

		let validation = (action != 'delete') ? cls.validation(data) : true;
		if (validation) {
			if (confirm('Are you sure ?')) {
					let url = base_url_js+'action1/submit_education';
					let dataForm = {
						action : action,
						data : data,
						ID : ID,
					}
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

	validation = (arr) => {
		let toatString = "";
		let result = "";
		for(let key in arr){
		   switch(key)
		   {
		    default :
		    	  if (key != 'Description') {
		    	  	let nm = key;
		    	  	if (key == 'ID_university') {
		    	  		nm = 'University';
		    	  	}
		    	  	else if(key == 'edu_code'){
		    	  		nm = 'Education Level';
		    	  	}
		    	  	else if(key == 'ctr_code'){
		    	  		nm = 'Country';
		    	  	}
		    	  	else if(key == 'ID_major_programstudy_employees'){
		    	  		nm = 'Major';
		    	  	}
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