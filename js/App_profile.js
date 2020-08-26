class App_profile {
	constructor(){

	}

	LoadDefault = () => {
		let cls = this;
		cls.makePageBiodata();
		cls.makePageEducation();
		cls.makePageSkills();
		cls.makePageWorkExperience();
	}

	makePageWorkExperience = () => {
		let selector = $('#pageWorkExperience');
		selector.empty();
		loading_page(selector);
		App_global.__Load_ajax_page_work_experience(selector,'');
	}


	makePageBiodata = () => {
		let selector = $('#pageBiodata');
		selector.empty();
		loading_page(selector);
		App_global.__Load_ajax_page_biodata(selector);
	}

	makePageEducation = () => {
		let selector = $('#pageEducation');
		selector.empty();
		loading_page(selector);
		App_global.__Load_ajax_page_education(selector,'');
	}

	makePageSkills = () => {
		let selector = $('#pageSkills');
		selector.empty();
		loading_page(selector);
		App_global.__Load_ajax_page_skills(selector);
	}
}