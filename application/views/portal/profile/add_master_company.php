<div class="row">
    <div class="col-sm-12">
        <form id="form-post-master" action="" method="post" autocomplete="off">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="fa fa-edit"></i>
                        <span>Form Master Company</span>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="hidden" name="ID" class="com-ID" id="ID">
                                <input type="text" name="Name" class="form-control required com-Name" id="Name">
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" name="Brand" class="form-control required com-Brand" id="Brand">
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Industry</label>
                                <select class="select2-select-00 select2-req com-IndustryTypeID" style="width: 100%;" size="5" id="IndustryTypeID" name="IndustryTypeID">
                                    <option value=""></option>
                                </select>
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2 oth-industry hidden">
                            <div class="form-group">
                                <label>Other Industry</label>
                                <input type="text" class="form-control com-Industry" name="Industry" id="Industry" placeholder="Type industry name">
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Range Employees</label>
                                <select class="form-control com-EmployeeMemberRangeID required " id="EmployeeMemberRangeID" name="EmployeeMemberRangeID"></select>
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Number Of Branches</label>
                                <input class="form-control required number com-NumberOfBranchef" type="text" id="NumberOfBranchef" name="NumberOfBranchef" />
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Gross Revenue</label>
                                <select class="form-control required com-GrossRevenueID" id="GrossRevenueID" name="GrossRevenueID"></select>
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>                        
                    </div><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control required com-Address" id="Address" name="Address" rows="5"></textarea>
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Country</label>
                                <select class="com-CountryID select2-req" id="CountryID" name="CountryID"></select>
                                <small class="text-danger text-message"></small>
                            </div>
                            <div class="form-group">
                                <label>Postcode</label>
                                <input class="form-control required number com-Postcode" type="text" id="Postcode" name="Postcode" maxlength="5">
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Province</label>
                                <select class="form-control isrequire com-ProvinceID" id="ProvinceID" name="ProvinceID">
                                    <option value="" disabled selected>-- Select Province --</option>
                                    <option value="" disabled>------------</option>
                                </select>
                                <small class="text-danger text-message"></small>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control com-Phone number" type="text" id="Phone" name="Phone">
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label>Region</label>
                            <select class="form-control isrequire com-RegionID" id="RegionID" name="RegionID"></select>
                            <small class="text-danger text-message"></small>
                        </div>
                        <div class="col-sm-2">
                            <label>District</label>
                            <select class="form-control isrequire com-DistrictID" id="DistrictID" name="DistrictID"></select>
                            <small class="text-danger text-message"></small>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Website official</label>
                                <input class="form-control com-Website" id="Website" name="Website">
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input class="form-control com-Facebook" id="Facebook" name="Facebook">
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Instagram</label>
                                <input class="form-control com-Instagram" id="Instagram" name="Instagram">
                                <small class="text-danger text-message"></small>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="alert alert-info" style="padding:5px;margin:0px"><b><i class="fa fa-exclamation-triangle"></i> Please fill up this form with correctly data</b></p>                            
                        </div>
                        <div class="col-sm-8 text-right">
                            <!-- <a class="btn btn-default" href="<?=site_url('student-life/master/company/list')?>">Cancel</a> -->
                            <button class="btn btn-success" id="btnSave2" type="button">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<textarea class="hide" id="dataUpdate"><?= json_encode($detailCompany); ?></textarea>