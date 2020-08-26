class App_testimony {
	
	constructor(){
		this.url = base_url_js+'action1/Testimony';
	}

	LoadDefault = (selectorPage='') => {
		App_template.LoadingModalStart();
		let cls = this;
		let url = cls.url;
		let dataToken = {
			action : 'read',
		};
		let token = jwt_encode(dataToken,'UAP)(*');
		AjaxSubmitForm(url,token).then(function(response){
		    	let PageContentSelector = (selectorPage == '') ? $('#pageContent') : selectorPage;
		    	let Status = 'No Testimony';
		    	let dataResponse = response['data'];
		    	let TokenResponseInfo = jwt_encode(response['info'],'UAP)(*');
		    	if (dataResponse.length > 0) {
		    		let rowData = dataResponse[0];
		    		let StatusRowData = rowData['Status'];
		    		switch (StatusRowData) {
		    			case '0':
		    			case 0:
		    				 Status = 'Onprogress Review';
		    				 break;
		    			case '-1':
		    			case -1:
		    				 Status = 'Reject';
		    				 break;
		    			case '1':
		    			case  1:
		    				 Status = 'Approved';
		    				 break;

		    		}
		    	}

		    	let html = '<div class = "row">'+
		    					'<div class = "col-xs-3" style = "text-align:left;">'+
		    						'<label style = "color:green;">Status : '+Status+'</label>'+' <button class = "btn btn-sm btn-xs btn-primary btnInfo" token = "'+TokenResponseInfo+'">'+
		    							'Info </button>'+
		    					'</div>'+ 
		    				'</div>';
		    	html  += '<div class = "row">'+
		    				'<div class = "col-xs-12">'+
		    					'<div class = "form-group">'+
		    						'<textarea rows="5" id="Testimony" name="Testimony" class="form-control default"></textarea>'+
		    					'</div>'+
		    					'<div style = "text-align:right;">'+
		    						'<button class = "btn btn-success" id = "btnSaveTestimony">Save</button>'+
		    					'</div>'+
		    				'</div>'+
		    			 '</div>'
		    	PageContentSelector.html(html);
		    	App_template.loadSummerNote($('#Testimony'));
		    	cls.__show_data($('#Testimony'),dataResponse);
		    	if (Status == 'Approved') {
		    		$('#Testimony').summernote('disable');
		    		$('#btnSaveTestimony').prop('disabled',true);
		    	}
		    	App_template.LoadingModalEnd(100);
		}).fail(function(response){
		   toastr.error('Connection error,please try again');
		})
			
	}

	__show_data = (selector,dataResponse) => {
		let arr = dataResponse;
		if (arr.length > 0 && (arr[0]['Testimony'] != null && arr[0]['Testimony'] != '' && arr[0]['Testimony'] != undefined  ) ) {
			selector.summernote('code',arr[0]['Testimony']);
		}
	}

	Submit_testimony = (selector) => {
		let cls = this;
		let htmlBtn = selector.html();
		let data  = {};
		let Testimony = $('#Testimony').val();
		data['action'] = 'submit';
		data['data'] = {};
		data['data']['Testimony'] = Testimony;
		let token = jwt_encode(data, "UAP)(*");
		App_template.Loading_button(selector);
		AjaxSubmitForm(cls.url,token).then(function(response){
			if (response == 1) {
				toastr.info('success');
				cls.LoadDefault();
			}
			App_template.End_loading_button(selector,htmlBtn);
		}).fail(function(response){
           toastr.error('Connection error,please try again');
           App_template.End_loading_button(selector,htmlBtn);
        })
	}

	__getInfo = (selector) => {

		let de = jwt_decode(selector.attr('token'));

		let html  = '';
		let dataRow = '';
		for (var i = 0; i < de.length; i++) {
			dataRow += '<tr>'+
							'<td>'+ (i+1)+'</td>'+
							'<td>'+ de[i].Info+'</td>'+
							'<td>'+ de[i].CreateBy+'</td>'+
							'<td>'+ de[i].CreateAt+'</td>'+
						'</tr>';
		}
		html += '<div class  = "row">'+
					'<div class = "col-md-12">'+
						'<table class = "table table-striped">'+
							'<thead>'+
								'<tr>'+
									'<th>No</th>'+
									'<th>Action</th>'+
									'<th>By</th>'+
									'<th>Time</th>'+
								'</tr>'+
							'</thead>'+
							'<tbody>'+
								dataRow+
							'</tbody>'+
						'</table>'+
					'</div>'+
				'</div>';	

		$('#GlobalModalLarge .modal-header').html('<h4 class="modal-title">'+'Info'+'</h4>');
		$('#GlobalModalLarge .modal-body').html(html);
		$('#GlobalModalLarge .modal-footer').html(''+
		' <button type="button" id="ModalbtnCancleForm" data-dismiss="modal" class="btn btn-default">Close</button>');
		$('#GlobalModalLarge').modal({
		    'show' : true,
		    'backdrop' : 'static'
		});
	}

}