class App_detail_topic {

	constructor(){

	}

	LoadDefault  = () => {
		let cls = this;
		let data = {
			ID : DataID,
		}
		
		let url = base_url_js+'action1/get_detail_topic';
		let token = jwt_encode(data, "UAP)(*");
		App_template.LoadingModalStart();
		AjaxSubmitForm(url,token).then(function(response){
			if (response.length > 0) {
					let d = response[0];
				   	$('#viewTitle').html(d.Topic);
				   	$('#viewCreate').html('Create at : '+moment(d.CreateAt).format('dddd, DD MMMM YYYY hh:mm A'));
				   	$('#viewDescription').html(d.Description);
				   	cls.makeComment(d);
				   	$('#formComment').val('');
				   	$('#btnActionComment').removeAttr('forum_commentid');
				   	App_template.LoadingModalEnd();
			}
			
		}).fail(function(response){
		   toastr.error('Connection error,please try again');
		})
	}

	makeComment = (data) => {
		let cls = this;
		$('#rowComment').empty();
		let G_comment = data['G_comment'];
		let htmlCreate  = cls.HtmlComment(G_comment);
		$('#rowComment').html(htmlCreate);
				
	}

	getRecusiveComment = (G_comment) => {
		let cls = this;
		let html = '';
		if (G_comment.length > 0) {
			html  += '<ul>';
			for (var i = 0; i < G_comment.length; i++) {
				let classLi = (G_comment[i].DivisionName != 'Student') ? 'lecturer' : 'student';
				let imgSrc = (classLi == 'student') ? base_url_js_pcam+'upload/students/'+G_comment[i].Year+'/'+G_comment[i].Photo : 
							base_url_js_pcam+'upload/employees/'+G_comment[i].Photo;
				let comment_child = G_comment[i].comment_child;
				let CreateAt = moment(G_comment[i].CreateAt).format('dddd, DD MMMM YYYY HH:mm:ss');
				let token = jwt_encode(G_comment[i],'UAP)(*');
				let html_RecusiveComment = cls.getRecusiveComment(comment_child);
				html += '<div class = "row" style = "padding:5px;">'+
							'<div class = "col-xs-12">'+
								'<div class = "well">'+
									'<div class = "row">'+
										'<div class = "col-xs-12">'+
											'<h4 class = "h4-comment">'+
												G_comment[i].Name+
												'<br/>'+
												'<small>'+
													CreateAt+
												'</small>'+
											'</h4>'+
											'<p>'+
												G_comment[i].Comment+
											'</p>'+
											'<div style="text-align: right;">'+
												'<button class="btn btn-sm btn-default btnQuote" token = "'+token+'" ><i class="fa fa-quote-right margin-right"></i> Quote</button>'+
											'</div>'+		
										'</div>'+
									'</div>'+
									html_RecusiveComment+
								'</div>'+
							'</div>'+
						'</div>';
			}

			html  += '</ul>';
			
		}

		return html;	

	}

	HtmlComment = (G_comment) => {
		let cls = this;
		let html = '';
		for (var i = 0; i < G_comment.length; i++) {
			let classLi = (G_comment[i].DivisionName != 'Student') ? 'lecturer' : 'student';
			let imgSrc = (classLi == 'student') ? base_url_js_pcam+'upload/students/'+G_comment[i].Year+'/'+G_comment[i].Photo : 
						base_url_js_pcam+'upload/employees/'+G_comment[i].Photo;
			let comment_child = G_comment[i].comment_child;
			let CreateAt = moment(G_comment[i].CreateAt).format('dddd, DD MMMM YYYY HH:mm:ss');
			let token = jwt_encode(G_comment[i],'UAP)(*');
			
			let html_RecusiveComment = cls.getRecusiveComment(comment_child);

			html += '<li class = "'+classLi+'">'+
						'<div class = "row">'+
							'<div class = "col-xs-1" style = "text-align:center">'+
								'<img src = "'+imgSrc+'" style="max-width: 40px;" class="img-rounded" >'+
								'<div class = "quote">'+
									'<i class ="fa fa-hashtag"></i>'+
									comment_child.length+
								'</div>'+
							'</div>'+
							'<div class = "col-xs-11">'+
								'<div class = "thumbnail">'+
									'<div class = "row">'+
										'<div class = "col-xs-12">'+
											'<h4 class = "h4-comment">'+
												G_comment[i].Name+
												'<br/>'+
												'<small>'+
													CreateAt+
												'</small>'+
											'</h4>'+
											'<p>'+
												G_comment[i].Comment+
											'</p>'+
											'<div style="text-align: right;">'+
												'<button class="btn btn-sm btn-default btnQuote" token = "'+token+'" ><i class="fa fa-quote-right margin-right"></i> Quote</button>'+
											'</div>'+		
										'</div>'+
									'</div>'+
									html_RecusiveComment+
								'</div>'+
							'</div>'+
						'</div>'+
					'</li>';		

		}

		return html;
	}


	submit_action_comment = (selector,ParentCommentID) => {
		let cls = this;
		let htmlBtn = selector.html();
		let ForumID = DataID;
		let formComment = $('#formComment').val();
		if (formComment != '') {
			let data = {};
			if (ParentCommentID != undefined && ParentCommentID != '') {
				data['ParentCommentID'] = ParentCommentID;
			}

			data['Comment'] = formComment;
			data['ForumID'] = ForumID;

			if (confirm('Are you sure ?')) {

				let url = base_url_js+'action1/submit_comment_forum';
				let token = jwt_encode(data,'UAP)(*');
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

}