class App_notification {

	constructor(){

	}

	LoadDefault = () => {
		$('#pageNotif').empty();
		let html  = '<table id="tableNotif" class="table table-hover">'+
        					'<thead>'+
        						'<tr>'+
        						    '<th style="width: 5%;">Notifications</th>'+
        						    '<th></th>'+
        						    '</tr>'+
        					'</thead>'+
        					'<tbody id="dataNotif"></tbody>'+
        				'</table>';
        $('#pageNotif').html(html);	

		var data = {
			NIP :sessionNPM,
			Alumni : 'yes',
		};
		var token = jwt_encode(data,'UAP)(*');
		var dataTable = $('#tableNotif').DataTable( {
		    "processing": true,
		    "serverSide": true,
		    "iDisplayLength" : 10,
		    "ordering" : false,
		    "language": {
		        "searchPlaceholder": "Search"
		    },
		    "ajax":{
		        url : base_url_js_pcam+'rest2/__getNotification', // json datasource
		        ordering : false,
		        data : {token:token},
		        type: "post",  // method  , by default get
		        error: function(){  // error handling
		            $(".employee-grid-error").html("");
		            $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
		            $("#employee-grid_processing").css("display","none");
		        }
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
		          	let de = jwt_decode(full['data']);
		          	// console.log(de);
		            // let html = full[1];
		            let html = '<div><b>'+de['CreatedName']+'</b>'+
                        '<br>'+
                        '<a href="'+base_url_js+de['URLDirectAlumni']+'" id_logging_user="'+de['ID_logging_user']+'">'+de['Title']+'</a>'+
                        '<p style="font-size: 12px;color: #9e9e9e;">'+de['Description']+'</p>'+
                        '<div style="text-align: right;font-size: 12px;color: #9e9e9e;">'+moment(new Date(de['CreatedAt'])).format("ddd, DD MMMM YYYY H:m:s")+'</div></div>'
		            			;
		            return html;
		          }
		        },
		    ],
		    'createdRow': function( row, data, dataIndex ) {
		    	if (data[2] == 1) {
		    		$(row).attr('style','background-color: #eaf1fb;')
		    	}
		    },
			dom: 'l<"toolbar">frtip',
			initComplete: function(){
				$("div.toolbar")
					.html('<div class="toolbar no-padding pull-right" style = "margin-left : 10px;">'+
					'<span data-smt="" class="btn btn-sm btn-read-all" style = "background-color : #0a885f;color:whitesmoke">'+
						'Set all read'+
					'</span>'+
				'</div>');
			}  
			
		});
	}

	set_read_all = () => {
		let cls = this;
		if (confirm('Are you sure ?')) {
			var url = base_url_js_pcam+'api/__crudLog';
			var data = {
				action : 'ReadAllLog',
				UserID : sessionNPM,
				Alumni : 'yes',
			};
			var token = jwt_encode(data,'UAP)(*');
			$.post(url,{token:token},function (jsonResult) {
				App_template.count_notif();
				cls.LoadDefault();
			});
		}
	}
}