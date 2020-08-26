let oTableAlumniForum;
class App_alumni_forum {

	constructor(){

	}


	LoadDefault = (selector) => {
		let table = selector.DataTable({
		    "fixedHeader": true,
		    "responsive": true,
		    "processing": true,
		    "destroy": true,
		    "serverSide": true,
		    "lengthMenu": [
		        [5, 10,20],
		        [5, 10,20]
		    ],
		    "iDisplayLength": 10,
		    "ordering": false,
		    "language": {
		        "searchPlaceholder": "Topic",
		    },
		    "ajax": {
		        url: base_url_js+'action1/load_data_forum', // json datasource
		        ordering: false,
		        type: "post", // method  , by default get
		        data: function(token) {
		            // Read values
		            let data = {
		                action: 'read_server_side',
		            };
		            let get_token = jwt_encode(data, "UAP)(*");
		            token.token = get_token;
		        },
		    },
		    'columnDefs': [
		        {
		          'targets': 0,
		          'searchable': false,
		          'orderable': false,
		          'className': 'dt-body-center',
		        },
		        {
		          'targets': 1,
		          'searchable': false,
		          'orderable': false,
		          'className': 'dt-body-center',
		          'render': function (data, type, full, meta){
		            let html = '<div style="text-align:left;">'+
		            				'<a href="'+base_url_js+'forum/detail-topic/'+full['tokenURL']+'">'+full[2]+'</a>'+
		            				'<br/>'+
		            				'<span style="font-size: 12px;color: #9e9e9e;">Owner : '+full[1]+'</span>'+
		            				'<br/>'+
		            				'<span style="font-size: 12px;color: #9e9e9e;">'+moment(new Date(full[3])).format("ddd, DD MMM YYYY");+'</span>'+
		            			'</div>'
		            			;
		            return html;
		          }
		        },
		        {
		          'targets': 2,
		          'searchable': false,
		          'orderable': false,
		          'className': 'dt-body-center',
		          'render': function (data, type, full, meta){
		          	let de = jwt_decode(full['data']);
		          	// console.log(de);
		          	let G_user = de['G_user'];
		            let html = '<div style="text-align:left;">'+
		            				'Participant : '+'<a href = "javascript:void(0)" class = "btnG_user" data="'+full['data']+'"> '+(G_user.length)+'</a>'+
		            			'</div>'
		            			;
		            return html;
		          }
		        },
		        {
		          'targets': 3,
		          'searchable': false,
		          'orderable': false,
		          'className': 'dt-body-center',
		          'render': function (data, type, full, meta){
		          	let de = jwt_decode(full['data']);
		          	let G_comment = de['G_comment'];
		            let html = '<div style="text-align:center;">'+
		            				'<i class="fa fa-comments"></i> <span>'+(G_comment.length)+'</span>'+
		            			'</div>'
		            			;
		            return html;
		          }
		        },
		        {
		            'targets': 4,
		            'searchable': false,
		            'orderable': false,
		            'className': 'dt-body-center',
		            'render': function (data, type, full, meta){
		                let btnAction = '';
		                return btnAction;
		            }
		        },
		    ],
		    'createdRow': function(row, data, dataIndex) {
		        
		    },
		    dom: 'l<"toolbar">frtip',
		    "initComplete": function(settings, json) {
		                  $("div.toolbar")
		                     .html('<div class="toolbar no-padding pull-right" style = "margin-left : 10px;">'+
		                        '<span data-smt="" class="btn btn-sm btn-add-topic" page = "form" style = "background-color : #0a885f;color:whitesmoke">'+
		                            ' Add new topic '+
		                       '</span>'+
		                    '</div>');
		    }
		});

		oTableAlumniForum = table;
	}

	makeForm_action = (action='add',data={},ID='') => {
		let html = '<div class = "row">'+
						'<div class = "col-xs-12">'+
							'<div class = "form-group">'+
								'<label>Title</label>'+
								'<input type = "text" class = "form-control frmInput" name = "Topic" />'+
							'</div>'+
							'<div class = "form-group">'+
								'<label>Description</label>'+
								'<textarea class = "form-control frmInput" name = "Description" row = "4" ></textarea>'+
							'</div>'+
						'</div>'+
					'</div>'

					;

		$('#GlobalModalLarge .modal-header').html('<h4 class="modal-title">'+'Create New Topic'+'</h4>');
		$('#GlobalModalLarge .modal-body').html(html);
		$('#GlobalModalLarge .modal-footer').html('<button class = "btn btn-success btnSaveModalAlumni" action = "'+action+'" data-id="'+ID+'">Save</button>'+
		' <button type="button" id="ModalbtnCancleForm" data-dismiss="modal" class="btn btn-default">Close</button>');
		$('#GlobalModalLarge').modal({
		    'show' : true,
		    'backdrop' : 'static'
		});

		if (data["Topic"] !== undefined) {
			for (key in data) {
				$('.frmInput[name="'+key+'"]').val(data[key]);
			}
			console.log('not empty')
		}
		else
		{
			console.log('empty')
		}

	}

	submit_form_action = (selector,action,ID) => {
		let cls = this;
		let htmlBtn = selector.html();
		let data = {};
		$('.frmInput').each(function(e){
			let v = $(this).val();
			let nm = $(this).attr('name');
			data[nm] = v;
		})

		let validation = (action == 'delete') ? true : cls.validation(data);
		if (validation) {
			let dataForm = {
				action : action,
				ID : ID,
				data : {
					forum : data
				},
			}
			if (confirm('Are you sure ?') ) {
				let url = base_url_js+'action1/submit_forum_alumni';
				let token = jwt_encode(dataForm,'UAP)(*');
				App_template.Loading_button(selector);
				AjaxSubmitForm(url,token).then(function(response){
				    if (response == 1) {
				    	$('#GlobalModalLarge').modal('hide');
				        oTableAlumniForum.ajax.reload(null, false);
				        App_template.count_notif();
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
		    		if (key == 'Description') {continue;}
		    	  	result = Validation_required(arr[key],key);
		    	  	if (result['status'] == 0) {
		    	  	  toatString += result['messages'] + "<br>";
		    	  	}
		   }
		}

		if (toatString != "") {
		  toastr.error(toatString, 'Failed!!');
		  return false;
		}
		return true
	}

	showModalUser = (data) => {
		let html = '';
		let G_user = data['G_user'];
		// console.log(G_user);
		let dataHtml = '';
		for (var i = 0; i < G_user.length; i++) {
			let no = i+1;
			let ReadComment = (G_user[i].ReadComment == '1') ? 'Read' : 'Unread';
			dataHtml += '<tr>'+
							'<td>'+no+'</td>'+
							'<td>'+G_user[i].Name+'</td>'+
							'<td>'+ReadComment+'</td>'+
						'</tr>';
		}

		html += '<div class = "row">'+
					'<div class =" col-xs-12">'+
						'<table class = "table table-striped">'+
							'<thead>'+
								'<tr>'+
									'<th>No</th>'+
									'<th>Name</th>'+
									'<th>Status</th>'+
								'</tr>'+
							'</thead>'+
							'<tbody>'+
								dataHtml+
							'</tbody>'+
						'</table>'+
					'</div>'+
				'</div>';	
		$('#GlobalModalLarge .modal-header').html('<h4 class="modal-title">'+'User'+'</h4>');
		$('#GlobalModalLarge .modal-body').html(html);
		$('#GlobalModalLarge .modal-footer').html(''+
		' <button type="button" id="ModalbtnCancleForm" data-dismiss="modal" class="btn btn-default">Close</button>');
		$('#GlobalModalLarge').modal({
		    'show' : true,
		    'backdrop' : 'static'
		});
	}
}