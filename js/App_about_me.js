class App_about_me {
	constructor(){
		this.G_biodata = G_biodata;
	}

	__action_submit = (selector) => {
		App_template.Loading_button(selector);
		let url = base_url_js+'action1/about_me';
		let txtAboutMe = $('div .note-editable').html();
		let data = {
			AboutMe : txtAboutMe,
		};

		let token = jwt_encode(data, "UAP)(*");
		AjaxSubmitForm(url,token).then(function(response){
			if (response == 1) {
				toastr.info('success');
			}
			App_template.End_loading_button(selector);
		}).fail(function(response){
           toastr.error('Connection error,please try again');
           App_template.End_loading_button(selector);
        })
	}

	__show_data = (selector) => {
		let arr = this.G_biodata;
		if (arr.length > 0 && (arr[0]['AboutMe'] != null && arr[0]['AboutMe'] != '' && arr[0]['AboutMe'] != undefined  ) ) {
			selector.summernote('code',this.G_biodata[0]['AboutMe']);
		}
	}
}