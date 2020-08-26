<div class="row" id = "pageFormBiodata">
	<div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Biodata</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div style="padding: 10px;" id = "MyphotoDisplay">

                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NPM</label>
                            <input class="form-control" type="text" name="NPM" value="<?php echo $this->session->userdata('alumni_NPM') ?>" readonly></input>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"  name="Name" value="<?php echo $this->session->userdata('alumni_Name') ?>" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title Ahead</label>
                            <input class="form-control frmInput" name="TitleAhead" dbfield = "db_alumni.biodata"></input>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title Behind</label>
                            <input class="form-control frmInput" name="TitleBehind" dbfield = "db_alumni.biodata"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Place of Birth</label>
                                <input type="text" class="form-control" name="PlaceOfBirth" value="<?php echo $this->session->userdata('alumni_PlaceOfBirth') ?>" readonly />
                            </div>
                            <div class="col-md-6">
                                <label>Date of Birth</label>
                                <input type="text" class="form-control"  name="DateOfBirth" value="<?php echo $this->session->userdata('alumni_DateOfBirth') ?>" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control frmInput" type="text" name="Email" dbfield ="<?php echo 'ta_'.$this->session->userdata('alumni_ClassOf').'.'.'students' ?>"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">+62</span>
                                <input class="form-control frmInput" name="Phone" dbfield ="<?php echo 'ta_'.$this->session->userdata('alumni_ClassOf').'.'.'students' ?>"></input>
                            </div>
                            <p class="help-block">Ex : 821xx3432</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hp</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">+62</span>
                                <input class="form-control frmInput" name="HP" dbfield ="<?php echo 'ta_'.$this->session->userdata('alumni_ClassOf').'.'.'students' ?>"></input>
                            </div>
                            <p class="help-block">Ex : 879xxxx0012</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nationality</label>
                            <select class="form-control frmInput" type="text" name="NationalityID" dbfield ="<?php echo 'ta_'.$this->session->userdata('alumni_ClassOf').'.'.'students' ?>">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control frmInput" name="Address" rows="4" dbfield ="<?php echo 'ta_'.$this->session->userdata('alumni_ClassOf').'.'.'students' ?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>High School</label>
                        <textarea class="form-control frmInput" readonly rows="4" name="HighSchool"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ijazah Number</label>
                            <input class="form-control" type="text" readonly name="IjazahNumber"></input>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>IPK</label>
                            <input class="form-control" type="text" readonly name="IPK"></input>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <div style="text-align: right;">
                            <button class="btn btn-sm btn-success" id = "btnSubmitBiodata">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
	</div>
</div>

<script type="text/javascript">
	const arrCountry = <?php echo json_encode($LoadSelectCountry) ?>;
</script>
<script type="text/javascript" src="<?= base_url('js/App_Biodata.js')?>"></script>
<script type="text/javascript">
	let App_this = new App_Biodata();

	$(document).ready(function(e){
		let selectorPhoto = $('#MyphotoDisplay');
		let App_declare = new App_left_menu();
		App_declare.__LoadImageByAjax(selectorPhoto,'max-width: 120px;');
		App_this.LoadDefault();
	})


	$(document).off('click','#btnSubmitBiodata').on('click','#btnSubmitBiodata',function(e){
		let selector = $(this);
		App_this.submit_biodata(selector);
	})
		
</script>
