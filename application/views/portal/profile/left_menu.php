<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-user margin-right"></i> Profile</h4>
                </div>
                <div class="panel-body" style="text-align: center;">
                    <div id = "LoadImageByAjax">
                        <!-- <img src="<?= base_url('images/icon/alumni.png') ?>" style="max-width: 90px;"> -->
                    </div>
                    <div style="margin-top: 10px;">
                        <label class="btn btn-sm btn-default">Change Photo <input name = "Photo" class = "file-upload-photo" type="file" style="display: none;" accept="image/png, image/jpeg"></label>
                    </div>
                    <h3><?php echo $this->session->userdata('alumni_Name'); ?><br/><small><?php echo $this->session->userdata('alumni_Email'); ?></small></h3>
                </div>
            </div>

            <div class="thumbnail" id="listMenu">
                <div class="list-group">
                    <a href="<?= base_url('portal/profile/'); ?>" class="list-group-item <?= ($this->uri->segment(2)=='profile' && $this->uri->segment(3)=='') ? 'active' : ''; ?>">Profile</a>
                    <a href="<?= base_url('portal/profile/about-me'); ?>" class="list-group-item <?= ($this->uri->segment(3)=='about-me') ? 'active' : ''; ?>">About Me</a>
                    <a href="<?= base_url('portal/profile/biodata'); ?>" class="list-group-item <?= ($this->uri->segment(3)=='biodata') ? 'active' : ''; ?>">Biodata</a>
                    <a href="<?= base_url('portal/profile/education'); ?>" class="list-group-item <?= ($this->uri->segment(3)=='education') ? 'active' : ''; ?>">Education</a>
                    <a href="<?= base_url('portal/profile/skills'); ?>" class="list-group-item <?= ($this->uri->segment(3)=='skills') ? 'active' : ''; ?>">Skills</a>
                    <a href="<?= base_url('portal/profile/work-experience'); ?>" class="list-group-item <?= ($this->uri->segment(3)=='work-experience') ? 'active' : ''; ?>">Work Experience</a>
                    <!-- <a href="<?= base_url('portal/profile/setting'); ?>" class="list-group-item <?= ($this->uri->segment(3)=='setting') ? 'active' : ''; ?>">Setting</a> -->
                </div>
            </div>

        </div>

        <div class="col-md-9">
            <?= $page; ?>
        </div>


    </div>
</div>
<script type="text/javascript" src="<?= base_url('js/App_left_menu.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/App_global_alumni.js')?>"></script>
<script type="text/javascript">
    let App_global = new App_global_alumni();

    $(document).ready(function(e){
        let selector = $('#LoadImageByAjax');
        let App_declare = new App_left_menu();
        App_declare.__LoadImageByAjax(selector);
    })

    $(document).on('change','.file-upload-photo',function () {
        let itsme = $(this);
        let App_declare = new App_left_menu();
        App_declare.__changeUploadPhoto(itsme);
    });
</script>