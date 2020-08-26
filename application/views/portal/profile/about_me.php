
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Edit About Me</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <textarea rows="5" id="Description" name="content" class="form-control default" ></textarea>
                    <span class="help-block"></span>
                </div>
                <div style="text-align: right;">
                    <button class="btn btn-success" id = "BtnSaveAboutMe">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	let G_biodata = <?php echo json_encode($G_biodata) ?>;
</script>
<script type="text/javascript" src="<?= base_url('js/App_about_me.js')?>"></script>
<script type="text/javascript">

let App_this = new App_about_me();

$(document).ready(function(e){
	App_template.loadSummerNote($('#Description'));
	App_this.__show_data($('#Description'));
})

$(document).off('click', '#BtnSaveAboutMe').on('click', '#BtnSaveAboutMe', function(e) {
	let selector = $(this);
  	App_this.__action_submit(selector);
})

</script>