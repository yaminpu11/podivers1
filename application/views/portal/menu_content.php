<style type="text/css">
.nav-tabs > li > a {
    background-color: #ececec;
}
</style>
<?php $Segment1 = $this->uri->segment(2); ?>
<?php $Segment2 = $this->uri->segment(3); ?>
<div id="content">
	<div class="container">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Dashboard</a>
				</li>
				<li class="current">
					<a href="#!" title="">Dashboard</a>
				</li>
			</ul>
		</div>
		<div class="col-xs-12">
			<div class="well" style="padding-bottom: 30px;margin-top: 40px;">
		        <div class="panel-heading clearfix">
		            <h3 >
		            	Build Content <?= ucwords(str_replace("-"," ",$Segment1)); ?>
		            </h3>
		            <p id="idDisplay"></p>
		        </div>
		        <div class="panel-body" id="tabs">
		        	<button class="btn btn-success" onclick="add_lpmi()"><i class="glyphicon glyphicon-plus"></i> Create</button>
		        	<?php if($Segment1=='knowledge'){echo '<button class="btn btn-success" onclick="Catlpmi()"><i class="glyphicon glyphicon-plus"></i> Add Category</button>';} ?>
		        	<?php if($Segment1=='knowledge'){echo '<button class="btn btn-success" onclick="SubCatlpmi()"><i class="glyphicon glyphicon-plus"></i> Add Sub Category</button>';} ?>
		        	<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
		        	<hr>        	
								
					<div class="table-responsive">
					  <table class="table table-condensed table-striped" id="table">
					      <thead>
					        <tr>
					          <!-- <th>#</th> -->
					          <th><?php if ($Segment1 =="testimonials"){echo "Name";}else{echo "Title";}?></th>
					          <!-- <th>Category</th> -->
					          <th>Published</th>
					          <th>Date Update</th>
					          <th>Lang</th>
					          <th>Action</th>
					        </tr>
					      </thead>
					      <tbody id="viewDatalist">
					        
					      </tbody>
					    </table>
					</div>
				

				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">.form-horizontal .form-group {
    padding: 5px 15px;
}</style>




<!-----Modal Category--->
<div class="modal fade " id="modal_formCat" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-md" style="width: 60%">
	    <div class="modal-content">
	    <div class="modal-header" style="padding: 20px 35px">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h3 class="modal-title" id="myModalLabel">Create Content <?= ucwords(str_replace("-"," ",$Segment1)); ?></h3>
	    </div>
	    
	    <div class="modal-body form">
			<form class="getcategory" id="formcat" style="margin: 0 15px;;">            		
				<div class="form-group">  
				    <label for=""><label id="cng">Add</label> Category:</label>  
				    	<input type="hidden" value="" name="idcat"/>
				    	<input id="namecategory" name="category" class="form-control" type="text" placeholder="Input Category Here" value="">  
						
				</div> 
				<div class="form-group" style="margin-bottom: 0px">
                    <h3>Language</h3>
                    <select  name="lang" class="form-control">
                      <option value="">--Select--</option>
					  <option value="Eng">English</option>
					  <option value="Ind">Indonesia</option>							  
					</select>
					<span class="help-block"></span>
                </div>
				<div class="form-group">
					<div class="btn btn-success" id="btncategory" onclick="add_category()">Save</div>
				</div>
			</form> 
			<div class="panel-body" style="min-height: 100px;">
				<div class="table-responsive">
			        <table class="table table-condensed table-striped">
			            <thead>
			                <tr>
			                    <td style="width: 8%">No</td>
			                    <td>Category</td>
			                    <td>Lang</td>
			                    <td>Create by</td>
			                    <td>Create at</td>
			                    <td>Action</td>
			                </tr>
			            </thead>
			            <tbody id="viewDatalistCategory">					        
					    </tbody>
			        </table>
			    </div>
	    	</div>
			<!-- <div class="modal-footer">
		       	<button type="button" id="btnSave" onclick="save()" class="btn btn-info">Save</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		    </div> -->

    	</div>
    	
    	</div>
	</div>
</div>





<!-----Modal Sub Category--->
<div class="modal fade " id="modal_formSubCat" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-md" style="width: 60%">
	    <div class="modal-content">
	    <div class="modal-header" style="padding: 20px 35px">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h3 class="modal-title" id="myModalLabel">Create Content <?= ucwords(str_replace("-"," ",$Segment1)); ?></h3>
	    </div>
	    
	    <div class="modal-body form">
			<form class="getcategory" id="formSubcat" style="margin: 0 15px;;">        				
				<input type="hidden" value="" name="idSubcat"/>
				<div class="form-group" style="margin-bottom: 0px">
                    <label>Language</label>
                    <select  name="lang" class="form-control getidlang">
                      <option value="">--Select--</option>
					  <option value="Eng">English</option>
					  <option value="Ind">Indonesia</option>							  
					</select>
					<span class="help-block"></span>
                </div> 

				<div class="form-group" style="margin-bottom: 0px">
                    <label>Select Category</label>
                    <select  name="idcategory" class="form-control" id="showcategory">
                      <option value="">--Select--</option>
                        <!-- <?php foreach($category as $row):?>
                        <option value="<?php echo $row->ID;?>" ><?php echo $row->Name;?></option>
                        <?php endforeach;?>  -->                          
                    </select>
                    <span class="help-block"></span>
                </div> 

                <div class="form-group" style="margin-bottom: 0px">
                    <label>Name Sub Category</label>                       
                    <input name="subcategoryname" placeholder="Input sub category" class="form-control" type="text">
                    <span class="help-block"></span>
                </div> 
				
				<div class="form-group">
					<div class="btn btn-success" id="btnSubcategory" onclick="add_Subcategory()">Save</div>
				</div>
			</form> 
			<div class="panel-body" style="min-height: 100px;">
				<div class="table-responsive">
			        <table class="table table-condensed table-striped">
			            <thead>
			                <tr>
			                    <td style="width: 8%">No</td>
			                    <td>Sub Category</td>
			                    <td>Category</td>
			                    <td>Lang</td>
			                    <td>Create by</td>
			                    <td>Create at</td>
			                    <td>Action</td>
			                </tr>
			            </thead>
			            <tbody id="viewDatalistSubCategory">					        
					    </tbody>
			        </table>
			    </div>
	    	</div>
			<!-- <div class="modal-footer">
		       	<button type="button" id="btnSave" onclick="save()" class="btn btn-info">Save</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		    </div> -->

    	</div>
    	
    	</div>
	</div>
</div>




<!-- MODAL ADD -->
	<div class="modal fade " id="modal_form" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	    <div class="modal-dialog modal-lg" style="width: 80%">
	    <div class="modal-content">
	    <div class="modal-header" style="padding: 20px">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h3 class="modal-title" id="myModalLabel">Create Content <?= ucwords(str_replace("-"," ",$Segment1)); ?></h3>
	    </div>
	    
	    <div class="modal-body form">
	    	<form action="#" id="form" class="form-horizontal">
	            			<input type="hidden" value="" name="id"/>
	            			<input type="hidden" value="<?= $Segment1 ?>" name="type"/>
	        <div class="row">
					<div class="col-md-8" >
	                <div class="thumbnail" style="padding: 15px"> 
						<div class="form-group">
	                        <label><?php if ($Segment1 =="testimonials"){echo "Name";}else{echo "Title";}?></label>                        
	                        <input name="title" placeholder="<?php if ($Segment1 =="testimonials"){echo "Name";}else{echo "Title";}?>" class="form-control" type="text">
	                        <span class="help-block"></span>
	                	</div>
	                	 <div class="container" id="show_a1" hidden="true">
						  <div class="row">
						    <div class='col-sm-6' style="padding: 0px">
						      <div class="form-group">
						      	<label>Date</label>
						        <div class="input-group input-append date datetimepicker">
						        	<input data-format="yyyy-MM-dd hh:mm" class="form-control input_modal_assign_to" type="text" name="date" readonly="" value="">
						        	<span class="input-group-addon add-on">
						        		<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
						        	</span>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>
	                	 <div class="form-group">
						    <label for="Description">Text</label>
						    <textarea id="Description" name="description" placeholder="Description" class="form-control"></textarea>
						    <span class="help-block"></span>
					  	</div>
					  	
					  	<div class="form-group" id="show_a2" hidden="true">
	                        <label>Meta description</label>
	                        <small class="red">Max 160 characters</small>
	                        <textarea name="meta_des" placeholder="Meta Description" class="form-control" style="border-color: #d9d9d9;"></textarea>
	                    </div>
	                    <div class="form-group" id="show_a3" hidden="true">
	                        <label>Meta Keywords</label>
	                        <small class="red">No more than 10 keyword</small>
	                        <textarea name="meta_key" placeholder="Meta Keywords" class="form-control" style="border-color: #d9d9d9;"></textarea>
	                    </div>
	                    <div class="form-group" id="photo-preview">
                            <label>File</label>
                            <div>
                                (No file)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="show_a4" hidden="true">
                            <label  id="label-photo">Upload file </label>
                            <div>
                                <input name="photo" type="file">
                                <p style="color: red;">* Max size 2 MB (type file jpg, jpeg, png and pdf)</p>
                                <p style="color: red;">* Image weight 1028 x height 600</p>
                                <span class="help-block" style="color: red;"></span>
                            </div>
                        </div>
	                </div>    
	            </div> 
	            <div class="col-md-4">
	            	
	            	<div class="thumbnail" style="padding: 15px; margin-bottom: 15px"> 	            		
	            		
	                    <div class="form-group" style="margin-bottom: 0px">
	                        <h3>Language</h3>
	                        <select  name="lang" class="form-control getidlangcontent">
	                          <option value="">--Select--</option>
							  <option value="Eng">English</option>
							  <option value="Ind">Indonesia</option>							  
							</select>
							<span class="help-block"></span>
	                    </div>
	                    <div class="form-group">
	                        <h3>Published</h3>                        
							
								<input type="radio" value="Yes" name="status" id="st1"> Yes
							
								<input type="radio" value="No" name="status" id="st2"> No
							
							<span class="help-block"></span>
	                    </div>
	            	</div>
	            	<div id="show_a5" class="thumbnail" style="padding: 15px ;margin-bottom:15px" > 
	            		<div class="form-group" style="margin-bottom: 0px">
	                        <h3>Select Category</h3>
	                        <div class="form-group" style="margin-bottom: 0px">
			                    <label>Select Category</label>
			                    <select  name="category" class="form-control getsubCatcontent" id="showcategorycontent">
			                      <option value="">--Select--</option>
			                        <!-- <?php foreach($category as $row):?>
			                        <option value="<?php echo $row->ID;?>" ><?php echo $row->Name;?></option>
			                        <?php endforeach;?>  -->                          
			                    </select>
			                    <span class="help-block"></span>
			                </div> 
							<span class="help-block"></span>
	                    </div>
	                    <div class="form-group" style="margin-bottom: 0px">
		                    <label>Select Sub Category</label>
		                    <select  name="idsubcategory" class="form-control shotes" id="showSubcategorycontent">
		                      <option value="">--Select--</option>
		                        <!-- <?php foreach($category as $row):?>
		                        <option value="<?php echo $row->ID;?>" ><?php echo $row->Name;?></option>
		                        <?php endforeach;?>  -->                          
		                    </select>
		                    <span class="help-block"></span>
		                </div> 
	                </div>
	            	<div class="thumbnail" style="padding: 15px"> 	            		
	            		
	                    <div class="form-group" style="margin-bottom: 15px">
	                        <h3>Setting Build</h3>	                                             
							<hr>

								<div><input type="checkbox" id="ad1" <?php if ($Segment1 =="vision" || $Segment1 =="mission" || $Segment1 =="slider" ||$Segment1 =="target" || $Segment1 =="program" || $Segment1 =="news" || $Segment1 =="knowledge" || $Segment1 =="testimonials" || $Segment1 =="partner"){echo "disabled";}?> onchange="valueChanged1()"> <label id="setingedit0">Add</label> Date
								</div>
								<div><input type="checkbox" id="ad2" onchange="valueChanged2()"> <label id="setingedit">Add</label> Meta Descripton
								</div>
								<div><input type="checkbox" id="ad3" onchange="valueChanged3()"> <label id="setingedit1">Add</label> Meta Keywords
								</div>
								<div><input type="checkbox" id="ad4" <?php if ($Segment1 =="vision" || $Segment1 =="mission" ||$Segment1 =="target" || $Segment1 =="program" || $Segment1 =="event" ){echo "disabled";}?> onchange="valueChanged4()"> <label id="setingedit2">Add</label> Upload
								</div>
								<div><input type="checkbox" id="ad5" <?php if ($Segment1 =="vision" || $Segment1 =="mission" || $Segment1 =="slider" ||$Segment1 =="target" || $Segment1 =="program" || $Segment1 =="news" || $Segment1 =="event" || $Segment1 =="testimonials" || $Segment1 =="partner"){echo "disabled";}?> onchange="valueChanged5()"> <label id="setingedit3">Add</label> Category
								</div>										
							<span class="help-block"></span>
	                    </div>
	            	</div>	           

	                </form>
	                                      
	            	
	            </div>               
	      	</div>
		</div>	

	    <div class="modal-footer">
	       	<button type="button" id="btnSave" onclick="save()" class="btn btn-info">Save</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	    </div>


	    </div>
	    
	</div>
<!--END MODAL ADD-->
<script>

	$( function() {
		$('.datetimepicker').datetimepicker();
	} );

</script>

<script>
	
    $(document).ready(function () {    	
        $('#Description').summernote({
            placeholder: 'Text your announcement',
            tabsize: 2,
            height: 300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            callbacks: {
                  onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text/html');
                    e.preventDefault();
                    var div = $('<div />');
                    div.append(bufferText);
                    div.find('*').removeAttr('style');
                    setTimeout(function () {
                      document.execCommand('insertHtml', false, div.html());
                    }, 10);
                  }
                }
        });

    }); 

     // show setting build
    $("#show_a1").hide();
    $("#show_a2").hide();	
    $("#show_a3").hide();
    $("#show_a4").hide();
    $("#show_a5").hide();
	function valueChanged1()
    {
        if($('#ad1').is(":checked"))   
            $("#show_a1").show();
        else
            $("#show_a1").hide();
    }
    function valueChanged2()
    {
        if($('#ad2').is(":checked"))   
            $("#show_a2").show();
        else
            $("#show_a2").hide();
    }
    function valueChanged3()
    {
        if($('#ad3').is(":checked"))   
            $("#show_a3").show();
        else
            $("#show_a3").hide();
    }
    function valueChanged4()
    {
        if($('#ad4').is(":checked"))   
            $("#show_a4").show();
        else
            $("#show_a4").hide();
    }
    function valueChanged5()
    {
        if($('#ad5').is(":checked"))   
            $("#show_a5").show();
        else
            $("#show_a5").hide();
    }
   

	var save_method; //for save method string
	var table;
	 
	$(document).ready(function() {
	 
	    //datatables
	    table = $('#table').DataTable({ 
	 
	        "processing": true, //Feature control the processing indicator.
	        "serverSide": true, //Feature control DataTables' server-side processing mode.
	        "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
	 
	        // Load data for the table's content from an Ajax source
	        "ajax": {	        	
	            "url": base_url_js+'__ajaxlist_lpmi',
	            "type": "POST",
	            "data": function ( data ) {
		                data.type = '<?= $Segment1 ?>';		                
		            }
	        },	 
	        "deferRender": true,
            "aLengthMenu": [[5, 10, 50,100],[ 5, 10, 50,100]], // Combobox Limit
	        
	        //Set column definition initialisation properties.
	        "columnDefs": [
			        { 
			        	"searchable": false,
			            "targets": [ 0 ], //first column / numbering column
			            "orderable": false, //set not orderable
			        },
	   
	        ],
	 
	    });

 		//set input/textarea/select event when change value, remove class error and remove text help block 
	    $("input").change(function(){
	        $(this).parent().parent().removeClass('has-error');
	        $(this).next().empty();
	    });
	    $("textarea").change(function(){
	        $(this).parent().parent().removeClass('has-error');
	        $(this).next().empty();
	    });
	    $("select").change(function(){
	        $(this).parent().parent().removeClass('has-error');
	        $(this).next().empty();
	    });
	 
	});
	 



	// show category

	$('.getidlang').change(function () {
    var idlang =  $(this).val();
    // alert(idlang); 
    $.ajax({
        url: base_url_js+'__getCatByLang_lpmi',
        method : "POST",
        data : {idlang: idlang},
        async : true,
        dataType : 'json',
        success: function (data) {

                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].ID+'>'+data[i].Name+'</option>';
                }
                $('#showcategory').html(html);

            }

        });

    });



    // show sub category


    $('.getsubCat').change(function () {
    var idcat =  $(this).val();
    // alert(idlang); 
    $.ajax({
        url: base_url_js+'__getSubCat_lpmi',
        method : "POST",
        data : {idcat: idcat},
        async : true,
        dataType : 'json',
        success: function (data) {

                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].IDSub+'>'+data[i].SubName+'</option>';
                }
                $('#showSubcategory').html(html);

            }

        });

    });


    // show category Content

	$('.getidlangcontent').change(async function () {
    	var idlang =  $(this).val();
    	const DataCategory = await AjaxshowCategoryBylang(idlang);
    		HtmlDataCategory(DataCategory);
    		$('.getsubCatcontent').trigger('change');

    });



    // show sub category Content


    $('.getsubCatcontent').change( async function () {
    	// console.log('XXXX');
    	var idcat =  $(this).val();
		const DataSubCategory = await AjaxshowSubCategoryByCategory(idcat);
			HtmlDataSubCategory(DataSubCategory);    

    });



	function add_category()
	{
		$('#btncategory').text('Saving...'); //change button text
	    $('#btncategory').attr('disabled',true); //set button disable 
	    var url;
	 
	    if(save_method == 'add') {
	        url = base_url_js+'__ajaxaddCat_lpmi';
	    } else {
	        url = base_url_js+'__ajaxupdateCat_lpmi';
	    }
	 
	    // ajax adding data to database
	    var category = new FormData($('#formcat')[0]);
	    // console.log(category);
	    $.ajax({
	        url : url,
	        type: "POST",
	        data: category,
	        contentType: false,
	        processData: false,
	        dataType: "JSON",
	        success: function(data)
	        {
	 
	            if(data.status) //if success close modal and reload ajax table
	            {
	            	toastr.success('Data saved','Success');
	                // $('#modal_form').modal('hide');
	                // reload_table();
	                loadDatacate();
	                $('#namecategory').val('');
	                $('#btncategory').text('Save'); //change button text
	            	$('#btncategory').attr('disabled',false); //set button enable 
	            	$('#cng').text('Add')
	            }
	            
	                       
	 			
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error adding / update data');
	            $('#btncategory').text('Save'); //change button text
	            $('#btncategory').attr('disabled',false); //set button enable 
	 
	        }
	    });
	    return false;
	}


	function loadDatacate() {
        
        $.ajax({
              type  : 'GET',
              url   : base_url_js+'__ajaxCat_lpmi',
              async : false,
              dataType : 'json',
              success : function(data){

                  var html = '';
                  var i;
                  for (i = 0; i < data.length; i++) {
                      html += '<tr>'+
		                        '<td>'+(i+1)+'</td>'+
		                        '<td>'+data[i].Name+'</td>'+
		                        '<td>'+data[i].Lang+'</td>'+
		                        '<td>'+data[i].CreateAt+'</td>'+
		                        '<td>'+data[i].CreateBy+'</td>'+
		                        '<td>'+
		                          '<a id="tab1-20933" class="btn btn-success" onclick="editCat_lpmi('+data[i].ID+')" href="javascript:;" data="'+data[i].ID+'"> Edit</a>'+
		                          '<a id="tab1-20933" class="btn btn-danger" onclick="deleteCat_lpmi('+data[i].ID+')" href="javascript:;" data="'+data[i].ID+'"> Delete</a>'+
		                        '</td>'+
		                      '</tr>';
		                      // console.log(data[i].Name);
                  }
                  
                  $('#viewDatalistCategory').html(html);
              }
          })
    }

	function Catlpmi()
	{
		loadDatacate();	
	    save_method = 'add';
	    $('#formcat')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	    $('#modal_formCat').modal('show'); // show bootstrap modal
	    $('.modal-title').text('Build Category'); // Set Title to Bootstrap modal title
	}
	

	function editCat_lpmi(id)
	{
	    save_method = 'update';
	    $.ajax({
	        url : base_url_js+'__ajaxeditCat_lpmi/'+id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data)
	        {
	 			$('[name="idcat"]').val(data.ID);
	            $('[name="category"]').append(data.Name);
	            $('[name="lang"]').val(data.Lang);	
				$('[name="category"]').focus();	  
				$('#cng').text('Edit')          			

	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
	}

	function deleteCat_lpmi(id)
	{
	    if(confirm('Are you sure delete this data?'))
	    {
	        // ajax delete data to database
	        $.ajax({
	            url : base_url_js+'__ajaxdeleteCat_lpmi/'+id,
	            type: "POST",
	            dataType: "JSON",
	            success: function(data)
	            {
	                //if success reload ajax table
	                toastr.success('Data delete','Success');
	                $('#modal_form').modal('hide');
	                loadDatacate();
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error deleting data');
	            }
	        });
	 
	    }
	}




 // Sub Category

	function loadDataSubcate() {
        
        $.ajax({
              type  : 'GET',
              url   : base_url_js+'__ajaxSubCat_lpmi',
              async : false,
              dataType : 'json',
              success : function(data){

                  var html = '';
                  var i;
                  for (i = 0; i < data.length; i++) {
                      html += '<tr>'+
		                        '<td>'+(i+1)+'</td>'+
		                        '<td>'+data[i].SubName+'</td>'+
		                        '<td>'+data[i].Name+'</td>'+
		                        '<td>'+data[i].Lang+'</td>'+
		                        '<td>'+data[i].CreateAt+'</td>'+
		                        '<td>'+data[i].CreateBy+'</td>'+
		                        '<td>'+
		                          '<a id="tab1-20933" class="btn btn-success" onclick="editSubCat_lpmi('+data[i].IDSub+')" href="javascript:;" data="'+data[i].IDSub+'"> Edit</a>'+
		                          '<a id="tab1-20933" class="btn btn-danger" onclick="deleteSubCat_lpmi('+data[i].IDSub+')" href="javascript:;" data="'+data[i].IDSub+'"> Delete</a>'+
		                        '</td>'+
		                      '</tr>';
		                      // console.log(data[i].Name);
                  }
                  
                  $('#viewDatalistSubCategory').html(html);
              }
          })
    }

	function SubCatlpmi()
	{
		loadDataSubcate();	
	    save_method = 'add';
	    $('#formSubcat')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	    $('#modal_formSubCat').modal('show'); // show bootstrap modal
	    $('.modal-title').text('Build Sub Category'); // Set Title to Bootstrap modal title
	}


	function add_Subcategory()
	{
		$('#btnSubcategory').text('Saving...'); //change button text
	    $('#btnSubcategory').attr('disabled',true); //set button disable 
	    var url;
	 
	    if(save_method == 'add') {
	        url = base_url_js+'__ajaxaddSubCat_lpmi';
	    } else {
	        url = base_url_js+'__ajaxupdateSubCat_lpmi';
	    }
	 
	    // ajax adding data to database
	    var category = new FormData($('#formSubcat')[0]);
	    // console.log(category);
	    $.ajax({
	        url : url,
	        type: "POST",
	        data: category,
	        contentType: false,
	        processData: false,
	        dataType: "JSON",
	        success: function(data)
	        {
	 
	            if(data.status) //if success close modal and reload ajax table
	            {
	            	toastr.success('Data saved','Success');
	                // $('#modal_form').modal('hide');
	                // reload_table();
	                loadDataSubcate();
	                $('#namecategory').val('');
	                $('#btnSubcategory').text('Save'); //change button text
	            	$('#btnSubcategory').attr('disabled',false); //set button enable 
	            	$('#cng1').text('Add')
	            }
	            
	                       
	 			
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error adding / update data');
	            $('#btnSubcategory').text('Save'); //change button text
	            $('#btnSubcategory').attr('disabled',false); //set button enable 
	 
	        }
	    });
	    return false;
	}


	function editSubCat_lpmi(id)
	{
	    save_method = 'update';
	    $.ajax({
	        url : base_url_js+'__ajaxeditSubCat_lpmi/'+id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data)
	        {
	        	$('[name="idSubcat"]').val(data.IDSub);
	        	$('[name="lang"]').val(data.Lang).trigger('change');
	 			$('[name="idcategory"]').val(data.IDCat).trigger('change');
	            $('[name="subcategoryname"]').val(data.SubName);
				$('[name="subcategoryname"]').focus();	  
				$('#cng1').text('Edit')          			

	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
	}

	function deleteSubCat_lpmi(id)
	{
	    if(confirm('Are you sure delete this data?'))
	    {
	        // ajax delete data to database
	        $.ajax({
	            url : base_url_js+'__ajaxdeleteSubCat_lpmi/'+id,
	            type: "POST",
	            dataType: "JSON",
	            success: function(data)
	            {
	                //if success reload ajax table
	                toastr.success('Data delete','Success');
	                $('#modal_form').modal('hide');
	                loadDataSubcate();
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error deleting data');
	            }
	        });
	 
	    }
	}


// Craete content

	function add_lpmi()
	{
	    save_method = 'add';
	    $('#form')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	    $('#modal_form').modal('show'); // show bootstrap modal
	    $('.modal-title').text('Build Content'); // Set Title to Bootstrap modal title
	    $('#photo-preview').hide(); // hide photo preview modal
	    $('#Description').summernote('code', '');
	    $('#show_a1').hide();
	    $('#show_a2').hide();
	    $('#show_a3').hide();
	    $('#show_a4').hide();
	    $('#show_a5').hide();

	    $('#setingedit0').text('Add');  //change name checkbox
	 	$('#setingedit').text('Add');  //change name checkbox
	 	$('#setingedit1').text('Add');  //change name checkbox
	 	$('#setingedit2').text('Add');  //change name checkbox
	 	$('#setingedit3').text('Add');  //change name checkbox
	}

	const loadDefaultEdit = () => {
		save_method = 'update';
	    $('#form')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	    $('#setingedit0').text('Edit');  //change name checkbox
	 	$('#setingedit').text('Edit');  //change name checkbox
	 	$('#setingedit1').text('Edit');  //change name checkbox
	 	$('#setingedit2').text('Edit');  //change name checkbox
	 	$('#setingedit3').text('Edit');  //change name checkbox
	}

	const LoadAjaxByID = async(id) => {
		const url = base_url_js+'__ajaxedit_lpmi/'+id;
		const data = {}
		const token = jwt_encode(data,'UAP)(*');
		const response = await AjaxSubmitFormPromises(url,token);
		return response;
	}

	const fillDataModal = (data) => {
		$('[name="id"]').val(data.ID);
		$('[name="title"]').val(data.Title);
		// $('[name="description"]').val(data.Description);
		$('#Description').summernote('code', data.Description);
		$('[name="meta_des"]').val(data.Meta_des);
		$('[name="meta_key"]').val(data.Meta_key);
		$('[name="date"]').val(data.AddDate);
	}

	const AjaxshowCategoryBylang = async(idlang) => {
		const url = base_url_js+'__getCatByLang_lpmi';
		const data = {idlang:idlang}
		const response = await AjaxSubmitFormPromisesNoToken(url,data);
		return response;
	}

	const HtmlDataCategory = (data) => {
		var html = '';
		var i;
		for(i=0; i<data.length; i++){
		    html += '<option value='+data[i].ID+'>'+data[i].Name+'</option>';
		}
		$('#showcategorycontent').html(html);
	}

	const AjaxshowSubCategoryByCategory = async(idcat) => {
		const url = base_url_js+'__getSubCat_lpmi';
		const data = {idcat:idcat}
		const response = await AjaxSubmitFormPromisesNoToken(url,data);
		return response;
	}


	const HtmlDataSubCategory = (data) => {
		var html = '';
		var i;
		for(i=0; i<data.length; i++){
		    html += '<option value='+data[i].IDSub+'>'+data[i].SubName+'</option>';
		}
		$('#showSubcategorycontent').html(html);
	}

	const edit_lpmi =async(id) => {
		/*
			1. isi data default
			2. Load Ajax __ajaxedit_lpmi
			3. result point 2 ajax ke  plus event change (getidlang)
			4. result point 3 ajax isi category
			5. result category auto ke suc categegory plus event change (getsubCat)
		
		*/

		// 1
		loadDefaultEdit(); 
		// 2 
		const dataLPMI = await LoadAjaxByID(id);
			fillDataModal(dataLPMI);

		// 3
		const lang = dataLPMI.Lang;
		$('[name="lang"]').val(lang);
		const DataCategory = await AjaxshowCategoryBylang(lang);
			HtmlDataCategory(DataCategory);
		// 4 dan 5
		const getCategory = $('.getsubCatcontent').find('option:selected').val();

		const DataSubCategory = await AjaxshowSubCategoryByCategory(getCategory);
			HtmlDataSubCategory(DataSubCategory);

			const data = dataLPMI;
            if (data.Status=="Yes") {
            	document.getElementById("st1").checked = true;
            } else {
                document.getElementById("st2").checked = true;
            }
            console.log(data.AddDate);
            if (data.AddDate=='' || data.AddDate=='0000-00-00 00:00:00'){
            	document.getElementById("ad1").checked = false;
            	$("#show_a1").hide();
            	// $("#show_a1").prop("show", this.checked);
            }else{
            	document.getElementById("ad1").checked = true;
            	$("#show_a1").show()
            }
            // console.log(data.IDCat);
            if (data.IDSubCat ){
            	document.getElementById("ad5").checked = true;
            	$('#show_a5').show();
            	// $("#show_a1").prop("show", this.checked);
            	// console.log('no');
            }else{
            	document.getElementById("ad5").checked = false;
            	// document.getElementById("show_a5").hidden = false;
            	$('#show_a5').hide();
            	// console.log('ok');
            }
            // if (data.File!=="" ) {
         //    	// document.getElementById("ad4").checked = true;                	
				
            // } else {
            //     $('#photo-preview').hide();

            // }
            // $('[name="status"]').val(data.Status);
            // $('[name="lang"]').val(data.Lang);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Content'); // Set title to Bootstrap modal title
 				
 			// $('#photo-preview').show(); // show photo preview modal
 			// console.log(data.File);
 			

 			if(data.File)
            {
            	
		        var fileName = data.File;
		        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
		        // console.log(fileNameExt);
            	if(!fileNameExt=='pdf'){
	                $('#label-photo').text('Change file'); // label photo upload
	                $('#photo-preview div').html('<img src="'+base_url_js+'uploads/lpmi/'+data.File+'" class="img-responsive">'); // show photo
	                // $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.file+'"/> Remove photo when saving'); // remove photo
                }else{
                	$('#photo-preview div').html('<iframe src="'+base_url_js+'uploads/lpmi/'+data.File+'" height="100%" width="100%" scrolling="auto"></iframe>');
                }

            }
            else
            {
                // $('#label-photo').text('Upload Photo1'); // label photo upload
                // $('#photo-preview div').text('(No photo)');
                $('#photo-preview').hide();
                // document.getElementById("photo-preview").hidden = false;
            }



	}
	 
	// function edit_lpmi(id)
	// {
	//     save_method = 'update';
	//     $('#form')[0].reset(); // reset form on modals
	//     $('.form-group').removeClass('has-error'); // clear error class
	//     $('.help-block').empty(); // clear error string
	//     $('#setingedit0').text('Edit');  //change name checkbox
	//  	$('#setingedit').text('Edit');  //change name checkbox
	//  	$('#setingedit1').text('Edit');  //change name checkbox
	//  	$('#setingedit2').text('Edit');  //change name checkbox
	//  	$('#setingedit3').text('Edit');  //change name checkbox
	//     //Ajax Load data from ajax
	//     $.ajax({
	//         url : base_url_js+'__ajaxedit_lpmi/'+id,
	//         type: "GET",
	//         dataType: "JSON",
	//         success: function(data)
	//         {
	//  			// console.log(data.IDSubCat);
	//  			// console.log(data.SubName);
	//             $('[name="id"]').val(data.ID);
	//             $('[name="title"]').val(data.Title);
	//             // $('[name="description"]').val(data.Description);
	//             $('#Description').summernote('code', data.Description);
	//             $('[name="meta_des"]').val(data.Meta_des);
	//             $('[name="meta_key"]').val(data.Meta_key);
	//             $('[name="date"]').val(data.AddDate);
	//             // $('[name="category"]').val(data.IDCat);
	//             // Language
	//             $('[name="lang"]').val(data.Lang).trigger('change');
	//             $('[name="category"]').val(data.IDCat).trigger('change');
	//             $('[name="idsubcategory"]').val(data.IDSub).trigger('change');

	//             // $('.getsubCatcontent').trigger('change');


	//             if (data.Status=="Yes") {
 //                	document.getElementById("st1").checked = true;
	//             } else {
	//                 document.getElementById("st2").checked = true;
	//             }
	//             console.log(data.AddDate);
	//             if (data.AddDate=='' || data.AddDate=='0000-00-00 00:00:00'){
	//             	document.getElementById("ad1").checked = false;
	//             	$("#show_a1").hide();
	//             	// $("#show_a1").prop("show", this.checked);
	//             }else{
	//             	document.getElementById("ad1").checked = true;
	//             	$("#show_a1").show()
	//             }
	//             // console.log(data.IDCat);
	//             if (data.IDSubCat ){
	//             	document.getElementById("ad5").checked = true;
	//             	$('#show_a5').show();
	//             	// $("#show_a1").prop("show", this.checked);
	//             	// console.log('no');
	//             }else{
	//             	document.getElementById("ad5").checked = false;
	//             	// document.getElementById("show_a5").hidden = false;
	//             	$('#show_a5').hide();
	//             	// console.log('ok');
	//             }
	//             // if (data.File!=="" ) {
 //             //    	// document.getElementById("ad4").checked = true;                	
					
	//             // } else {
	//             //     $('#photo-preview').hide();

	//             // }
	//             // $('[name="status"]').val(data.Status);
	//             // $('[name="lang"]').val(data.Lang);
	//             $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
	//             $('.modal-title').text('Update Content'); // Set title to Bootstrap modal title
	 				
	//  			// $('#photo-preview').show(); // show photo preview modal
	//  			// console.log(data.File);
	 			

	//  			if(data.File)
	//             {
	            	
	// 		        var fileName = data.File;
	// 		        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
	// 		        // console.log(fileNameExt);
	//             	if(!fileNameExt=='pdf'){
	// 	                $('#label-photo').text('Change file'); // label photo upload
	// 	                $('#photo-preview div').html('<img src="'+base_url_js+'uploads/lpmi/'+data.File+'" class="img-responsive">'); // show photo
	// 	                // $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.file+'"/> Remove photo when saving'); // remove photo
	//                 }else{
	//                 	$('#photo-preview div').html('<iframe src="'+base_url_js+'uploads/lpmi/'+data.File+'" height="100%" width="100%" scrolling="auto"></iframe>');
	//                 }
	
	//             }
	//             else
	//             {
	//                 // $('#label-photo').text('Upload Photo1'); // label photo upload
	//                 // $('#photo-preview div').text('(No photo)');
	//                 $('#photo-preview').hide();
	//                 // document.getElementById("photo-preview").hidden = false;
	//             }
	//         },
	//         error: function (jqXHR, textStatus, errorThrown)
	//         {
	//             alert('Error get data from ajax');
	//         }
	//     });
	// }
	 
	function reload_table()
	{
	    table.ajax.reload(null,false); //reload datatable ajax 
	}
	 
	function save()
	{
	    $('#btnSave').text('saving...'); //change button text
	    $('#btnSave').attr('disabled',true); //set button disable 
	    var url;
	 
	    if(save_method == 'add') {
	        url = base_url_js+'__ajaxadd_lpmi';
	    } else {
	        url = base_url_js+'__ajaxupdate_lpmi';
	    }
	 
	    // ajax adding data to database
	    var formData = new FormData($('#form')[0]);
	    $.ajax({
	        url : url,
	        type: "POST",
	        data: formData,
	        contentType: false,
	        processData: false,
	        dataType: "JSON",
	        success: function(data)
	        {
	 
	            if(data.status) //if success close modal and reload ajax table
	            {
	            	toastr.success('Data saved','Success');
	                $('#modal_form').modal('hide');
	                reload_table();
	            }
	            else
	            {
	                for (var i = 0; i < data.inputerror.length; i++) 
	                {
	                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
	                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
	                }
	            }
	 
	            $('#btnSave').text('Save'); //change button text
	            $('#btnSave').attr('disabled',false); //set button enable 
	 
	 
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error adding / update data');
	            $('#btnSave').text('Save'); //change button text
	            $('#btnSave').attr('disabled',false); //set button enable 
	 
	        }
	    });
	}
	 
	function delete_lpmi(id)
	{
	    if(confirm('Are you sure delete this data?'))
	    {
	        // ajax delete data to database
	        $.ajax({
	            url : base_url_js+'__ajaxdelete_lpmi/'+id,
	            type: "POST",
	            dataType: "JSON",
	            success: function(data)
	            {
	                //if success reload ajax table
	                toastr.success('Data delete','Success');
	                $('#modal_form').modal('hide');
	                reload_table();
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error deleting data');
	            }
	        });
	 
	    }
	}


</script>
