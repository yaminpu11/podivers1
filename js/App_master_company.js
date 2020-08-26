class App_master_company {
	
	constructor(){

	}

	Form_addCompany = async() => {
		let cls = this;
		let token = '';
		let url = base_url_js+'action1/Form_addCompany';
		const ajaxGetResponse = await AjaxSubmitFormPromises(url,token);
		let html = ajaxGetResponse;
		$('#GlobalModal').modal('hide');
		$('#GlobalModalLarge .modal-header').html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
				    '<h4 class="modal-title">'+'Add Company'+'</h4>');
		$('#GlobalModalLarge .modal-body').html(html);
		$('#GlobalModalLarge .modal-footer').html('<button type="button" class="btn btn-default btnCloseModalCompany" data-dismiss="modal">Close</button>');
		$('#GlobalModalLarge').find('.modal-dialog').attr('style','width: 1350px;');
		$('#GlobalModalLarge').modal({
		    'show' : true,
		    'backdrop' : 'static'
		});

		cls.checkUpdate();
	}

	checkUpdate = () => {
		let cls = this;
		var dataUpdate = $('#dataUpdate').val();
		var d = (dataUpdate!='') ? JSON.parse(dataUpdate) : [];

		if(d.length>0){
		    d = d[0];

		    /*UPDATED BY FEBRI @ FEB 2020*/
		    var DistrictID = 0; var ProvinceID = 0; var RegionID = 0;
		    $.each(d,function(k,v){
		        console.log(k);
		        $("#form-post-master #"+k).val(v);
		        if(k == "IndustryTypeID"){
		            var keyval = 60;
		            if(v != null){
		                keyval = v;
		            }
		            cls.loadSelectOptionCompanyType('#IndustryTypeID',keyval);
		        }
		        if(k == "EmployeeMemberRangeID"){
		            cls.loadSelectOptionRangeEmployees('#EmployeeMemberRangeID',v);
		        }
		        if(k == "GrossRevenueID"){
		            cls.loadSelectOptionGrossRevenue('#GrossRevenueID',v);
		        }
		        if(k == "CountryID"){
		            cls.loadSelectOptionCountry('#CountryID',v);
		        }

		        if(k == "ProvinceID"){
		            ProvinceID = v;
		            cls.loadSelectOptionLoc_Province('#ProvinceID', v);
		        }
		        if(k == "RegionID"){
		            RegionID = v;
		            cls.loadSelectOptionLoc_Regions(ProvinceID,'#RegionID',v);
		        }
		        if(k == "DistrictID"){
		            DistrictID = v;
		            cls.loadSelectOptionLoc_District(RegionID,'#DistrictID',v);
		        }

		    });
		    /*END UPDATED BY FEBRI @ FEB 2020*/

		} else {
		    cls.loadSelectOptionCountry("#CountryID",'');
		    cls.loadSelectOptionCompanyType('#IndustryTypeID','');
		    cls.loadSelectOptionRangeEmployees('#EmployeeMemberRangeID','');
		    cls.loadSelectOptionGrossRevenue('#GrossRevenueID','');

		    $('#IndustryTypeID').select2({width:'100%'});
		}
	}

	loadSelectOptionCompanyType = (element,selected) => {
	    var url = base_url_js_pcam+'api/__getCompanyType';
	    $.getJSON(url,function (jsonResult) {

	        if(jsonResult.length>0){
	            var option = $(element);
	            if(jsonResult.length>0){
	                for(var i=0;i<jsonResult.length;i++){
	                    var data = jsonResult[i];
	                    option.append('<option value="'+data.ID+'">'+data.name+'</option>')
	                        .val(selected).trigger('change');
	                }
	            }
	        }

	    });

	}

	loadSelectOptionRangeEmployees = (element,selected) => {
	    var url = base_url_js_pcam+'api/__getRangeEmployees';
	    $.getJSON(url,function (jsonResult) {
	        $.each(jsonResult,function (i,v) {

	            var sc = (selected==v.ID) ? 'selected' : '';

	            var opt = v.RangeStart+' - '+v.RangeEnd;
	            if(v.Type=='1') {
	                opt = '&#60; '+v.RangeEnd;
	            } else if(v.Type=='2'){
	                opt = v.RangeStart+' &#62;';
	            }

	            $(element).append('<option value="'+v.ID+'" '+sc+'>'+opt+'</option>');

	        })
	    });
	}

	loadSelectOptionGrossRevenue = (element,selected) => {
        var url = base_url_js_pcam+'api/__getGrossRevenue';
        $.getJSON(url,function (jsonResult) {
            $.each(jsonResult,function (i,v) {

                var sc = (selected==v.ID) ? 'selected' : '';

                var opt = v.RangeStart+' - '+v.RangeEnd;
                if(v.Type=='1') {
                    opt = '&#60; '+v.RangeEnd;
                } else if(v.Type=='2'){
                    opt = v.RangeStart+' &#62;';
                }

                $(element).append('<option value="'+v.ID+'" '+sc+'>'+opt+'</option>');

            })
        });
    }

    loadSelectOptionCountry = (element,selected) => {
        var url = base_url_js_pcam+'api/__getCountry';
        $.getJSON(url,function (jsonResult) {
            $(element).append('<option>-- Select Country --</option>');
            $.each(jsonResult,function (i,v) {
                var sc = (selected==v.ctr_code) ? 'selected' : '';
                $(element).append('<option value="'+v.ctr_code+'" '+sc+'>'+v.ctr_name+'</option>');
            })
            $(element).select2({'width':'100%'});
        });
    }

    loadSelectOptionLoc_Province = (element,selected) => {
        var url = base_url_js_pcam+'api/__getProvince';
        $.getJSON(url,function (jsonResult) {
            $.each(jsonResult,function (i,v) {

                var sc = (selected==v.ProvinceID) ? 'selected' : '';
                $(element).append('<option value="'+v.ProvinceID+'" '+sc+'>'+v.ProvinceName+'</option>');

            })
        });
    }

    loadSelectOptionLoc_Regions = (ProvinceID,element,selected) => {
        var url = base_url_js_pcam+'api/__getRegions/'+ProvinceID;
        $.getJSON(url,function (jsonResult) {
            $.each(jsonResult,function (i,v) {

                var sc = (selected==v.RegionID) ? 'selected' : '';
                $(element).append('<option value="'+v.RegionID+'" '+sc+'>'+v.RegionName+'</option>');

            })
        });
    }

    loadSelectOptionLoc_District = (RegionID,element,selected) =>{
        var url = base_url_js_pcam+'api/__getDistric/'+RegionID;
        $.getJSON(url,function (jsonResult) {
            $.each(jsonResult,function (i,v) {

                var sc = (selected==v.DistrictID) ? 'selected' : '';
                $(element).append('<option value="'+v.DistrictID+'" '+sc+'>'+v.DistrictName+'</option>');

            })
        });
    }

    submit_save = async (selector) => {
    	let error = false;
    	let itsme = selector;
    	let itsform = itsme.parent().parent().parent().parent().parent();
    	let htmlBtn = selector.html();
    	itsform.find(".required,.select2-req").each(function(){
    	    let value = $(this).val();
    	    if($.trim(value) == ''){
    	        $(this).addClass("error");
    	        $(this).parent().find(".text-message").text("Please fill this field");
    	        error = false;                    
    	    }else{
    	        error = true;
    	        $(this).removeClass("error");
    	        $(this).parent().find(".text-message").text("");
    	    }
    	});
    	
    	let totalError = itsform.find(".error").length;
    	if(error && totalError == 0 ){
    	    let dataFormArr = itsform.serializeArray();
    	    let dataForm = {};
    	    if(!jQuery.isEmptyObject(dataFormArr)) {
    	        $.each(dataFormArr,function(k,v){
    	            if(v.name != 'ID'){
    	                dataForm[v.name] = v.value;
    	            }
    	        });
    	    }
    	    
    	    let ID = itsform.find("input[name=ID]").val();

    	    let data = {
    	        ID : (ID!='' && ID!=null) ? ID : '',
    	        dataForm : dataForm
    	    };
	 
    	    let token = jwt_encode(data,'UAP)(*');
    	    let url = base_url_js+'action1/submit_add_company';
    	    App_template.Loading_button(selector);
    	    const ajaxGetResponse = await AjaxSubmitFormPromises(url,token);
    	    if (ajaxGetResponse == 1) {
	    	    toastr.success('Data saved','Success');
		        $('#GlobalModalLarge').modal('hide');
		        setTimeout(function () {
		        	let selectorFilterCompany = $('#filterCompany');
		        	selectorFilterCompany.val(dataForm['Name']);
		        	App_this.__autocomplete_company(selectorFilterCompany,dataForm['Name']);
		            
		            $('#GlobalModal').modal({
	        		    'show' : true,
	        		    'backdrop' : 'static'
	        		});

		        },500);
    	    }
    	    else
    	    {
    	    	App_template.End_loading_button(selector,htmlBtn);
    	    }

    	}else{
    	    alert("Please fill out the field.");
    	}
    }

    CloseModalCompany = async() => {
        $('#GlobalModalLarge').modal('hide');
        setTimeout(function () {
            $('#GlobalModal').modal({
    		    'show' : true,
    		    'backdrop' : 'static'
    		});

        },500);
    }

}