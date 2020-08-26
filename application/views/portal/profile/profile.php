<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-info-circle margin-right"></i> About Me</h4>
            <a href="<?= base_url('portal/profile/about-me'); ?>" class="btn btn-sm btn-default panel-heading-button-right">Edit</a>
        </div>
        <div class="panel-body">
            <p>
               <?php echo (count($G_biodata) > 0) ? $G_biodata[0]['AboutMe'] : '<p style = "color:red;">--No data found--</p>' ?>
            </p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-address-card margin-right"></i> Biodata</h4>
            <a href="<?= base_url('portal/profile/biodata'); ?>" class="btn btn-sm btn-default panel-heading-button-right">Edit</a>
        </div>
        <div class="panel-body" id = "pageBiodata">
          
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-graduation-cap margin-right"></i> Education</h4>
            <a href="<?= base_url('portal/profile/education'); ?>" class="btn btn-sm btn-default panel-heading-button-right">Edit</a>
        </div>
        <div class="panel-body" id = "pageEducation">
            
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-star margin-right"></i> Skills</h4>
            <a href="<?= base_url('portal/profile/skills'); ?>" class="btn btn-sm btn-default panel-heading-button-right">Edit</a>
        </div>
        <div class="panel-body" id = "pageSkills">
            
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-briefcase margin-right"></i> Work Experience</h4>
            <a href="<?= base_url('portal/profile/work-experience'); ?>" class="btn btn-sm btn-default panel-heading-button-right">Edit</a>
        </div>
        <div class="panel-body" id = "pageWorkExperience">
           
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('js/App_profile.js')?>"></script>
<script type="text/javascript">
    let App_this = new App_profile();
    $(document).ready(function(e){
        App_this.LoadDefault();
    })
</script>