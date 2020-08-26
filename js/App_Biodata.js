class App_Biodata {
	constructor(){

	}

	LoadDefault = () => {
		App_template.LoadingModalStart();
		let cls = this;
		cls.WriteInput();
		
	}

	WriteInput = () => {
		let cls = this;
		let url = base_url_js+'action1/load_data_alumni';
        let token = '';
        AjaxSubmitForm(url,token).then(function(response){
        	if (response.length > 0) {
        		let dt = response[0];
        		$('#pageFormBiodata').find('input,textarea').each(function(e){
        			let nm = $(this).attr('name');
        			if (nm =='IPK') {
        				$(this).val(dt['IPK_data']['dataIPK']['IPK']);
        			}
        			else if(nm == 'HP' || nm == 'Phone'){
        				let dtV = dt[nm];
        				if (dt[nm].substring(0,1) == '0') {
        					dtV = dt[nm].substring(1,dt[nm].length );
        				}
        				$(this).val(dtV);
        			}
        			else
        			{
        				$(this).val(dt[nm]);
        			}
        			
        		})

        		cls.LoadSelectCountry(dt['NationalityID']);
        		App_template.LoadingModalEnd(100);
        		
        	}
		}).fail(function(response){
           toastr.error('Connection error,please try again');
           App_template.LoadingModalEnd(100);
        })
	}

	LoadSelectCountry = (dtselected = '') => {
		let dtCountry = arrCountry;
		let selector = $('.frmInput[name="NationalityID"]').empty();
		for (var i = 0; i < dtCountry.length; i++) {
			let selected = (dtCountry[i].ctr_code == dtselected) ? 'selected' : '';
			selector.append(
					'<option value = "'+dtCountry[i].ctr_code+'" '+selected+' >'+dtCountry[i].ctr_name+'</option>'
				)
		}

		selector.select2();
	}

	submit_biodata = (selector) => {
		let cls = this;
		if (confirm('Are you sure ?')) {
			let data = {};
			let db_alumni = {};
			let db_ta = {};
			let msgStr = '';
			$('.frmInput').each(function(e){
				let dbfield = $(this).attr('dbfield');
				let nm = $(this).attr('name');
				let v = $(this).val();
				// validation
					if (nm == 'Email') {
						if (v != '') {
							v =  v.toLowerCase();
							let chk = Validation_email(v,'Email');
							if (chk.status == 0) {
								msgStr += chk['messages']+'<br/>';
							}
							
						}
					}

					if (nm == 'Phone' || nm == 'HP') {
						if (v != '') {
							let chk = Validation_numeric(v,nm);
							if (chk.status == 0) {
								msgStr += chk['messages']+'<br/>';
							}
						}
					}
				// end validation

				if (dbfield == 'db_alumni.biodata') {
					db_alumni[nm] = v;
				}
				else
				{
					db_ta[nm] = v;
				}

				// if (dbfield == 'ta_2015.students') {
				// 	db_ta[nm] = v;
				// }
			})

			if (msgStr == '') {
				App_template.Loading_button(selector);
				data['db_alumni'] = db_alumni;
				data['db_ta'] = db_ta;
				let url = base_url_js+'action1/submit_biodata';
				let token = jwt_encode(data,'UAP)(*');
				AjaxSubmitForm(url,token).then(function(response){
				    if (response == 1) {
				        cls.LoadDefault();
				        toastr.info('Success');
				    }

				    App_template.End_loading_button(selector);
				}).fail(function(response){
				   toastr.error('Connection error,please try again');
				   App_template.End_loading_button(selector);
				})

			}
			else
			{
				toastr.error(msgStr);
			}
			
		}	
	}
}