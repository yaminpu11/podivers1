class App_global_alumni {

    constructor(){

    }

    __Load_ajax_page_biodata = (selector) => {
        let cls = this;
        let url = base_url_js+'action1/load_data_alumni';
        let token = '';
        AjaxSubmitForm(url,token).then(function(response){
            cls.__Load_page_biodata(selector,response);
            App_template.LoadingModalEnd(100);
        }).fail(function(response){
           toastr.error('Connection error,please try again');
           App_template.LoadingModalEnd(100);
        })
    }

    __Load_page_biodata = (selector,data) => {
        let rowdata = data[0];
        let html  = '';
            let Name  = rowdata['Name'];
            if (rowdata['TitleAhead'] != '' && rowdata['TitleAhead'] != null && rowdata['TitleAhead'] != undefined ) {
                Name = rowdata['TitleAhead']+ ' '+Name;
            }

            if (rowdata['TitleBehind'] != '' && rowdata['TitleBehind'] != null && rowdata['TitleBehind'] != undefined ) {
                Name = Name+' '+rowdata['TitleBehind'];
            }

            html  += '<div class="table-responsive">'+
                        '<table class="table table-striped">'+
                            '<tr>'+
                                '<td style="width: 20%;">Name</td>'+
                                '<td style="width: 1%;">:</td>'+
                                '<td>'+Name+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>NPM</td>'+
                                '<td>:</td>'+
                                '<td>'+rowdata['NPM']+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Email</td>'+
                                '<td>:</td>'+
                                '<td>'+rowdata['Email']+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Place & Birth</td>'+
                                '<td>:</td>'+
                                '<td>'+rowdata['PlaceOfBirth'] + ' & '+ moment(new Date(rowdata['DateOfBirth'])).format("D MMMM YYYY")+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Gender</td>'+
                                '<td>:</td>'+
                                '<td>'+rowdata['Gender']+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Address</td>'+
                                '<td>:</td>'+
                                '<td>'+rowdata['Address']+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Phone</td>'+
                                '<td>:</td>'+
                                '<td>'+rowdata['Phone']+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>HP</td>'+
                                '<td>:</td>'+
                                '<td>'+rowdata['HP']+'</td>'+
                            '</tr>'+
                        '</table>'+
                     '</div>'
                     ;
        selector.html(html);
    }

    __Load_ajax_page_skills = (selector) => {
        let cls = this;
        let url = base_url_js+'action1/load_data_skills';
        let token = '';
        AjaxSubmitForm(url,token).then(function(response){
            if ($('.btneditSkills').length) {
                let tokenBtnedit = jwt_encode(response,'UAP)(*');
                $('.btneditSkills').attr('token',tokenBtnedit);
            } 
            cls.__Load_page_skills(selector,response);
            App_template.LoadingModalEnd();
        }).fail(function(response){
           toastr.error('Connection error,please try again');
           App_template.LoadingModalEnd();
        })
    }

    __Load_page_skills = (selector,data) => {
        let cls = this;
        let html = '';
        for (var i = 0; i < data.length; i++) {
            let htmlGroupSkill = '';
            let dataSkill = data[i].data;
            if (dataSkill.length > 0) {
                htmlGroupSkill += dataSkill[0].SkillName;
                for (var j = 1; j < dataSkill.length; j++) {
                    htmlGroupSkill += ','+dataSkill[j].SkillName;
                }
            }
            else
            {
                htmlGroupSkill += '<p style = "color:red;">No data found in the server</p>';
            }
            
            html  += '<div class = "row" style= "margin-top:5px;">'+
                        '<div class = "col-xs-3">'+
                            '<label style = "color:#999;">'+data[i].level+'</label>'+
                        '</div>'+
                        '<div class = "col-xs-9">'+
                            htmlGroupSkill+
                        '</div>'+
                     '</div>'

                    ;
        }

        selector.html(html);

    }

    __Load_ajax_page_education = (selector,activeBtn = 'active') => {
        let cls = this;
        let url = base_url_js+'action1/load_data_education';
        let token = '';
        AjaxSubmitForm(url,token).then(function(response){
            cls.__Load_page_education(selector,response,activeBtn);
            App_template.LoadingModalEnd();
        }).fail(function(response){
           toastr.error('Connection error,please try again');
           App_template.LoadingModalEnd();
        })
    }

    __Load_page_education = (selectorHTML,data,activeBtn) => {
        let cls = this;
        if (data.length > 0) {
            let html = '';
            for (var i = 0; i < data.length; i++) {
                let row = data[i];
                let tokenData = jwt_encode(row,'UAP)(*');
                let dateD = moment(new Date(row['GraduationDate'])).format("YYYY");
                let btnAction = '';
                if (activeBtn == 'active') {
                    btnAction = '<div class = "col-xs-4" style = "text-align:right;">'+
                                        '<span class = "fa fa-pencil-square-o btn btn-sm btn-primary btneditEducation"></span>'+
                                        ' '+
                                        '<span class = "fa fa-times btn btn-sm btn-warning btnremoveEducation"></span>'+
                                    '</div>';
                }
                html += '<div class = "row DataRow" data-id="'+row['ID']+'" data-token = "'+tokenData+'" style = "margin-top:10px;">'+
                            '<div class = "col-sm-3">'+
                                '<span style = "color : green;">'+dateD+'</span>'+
                            '</div>'+   
                            '<div class = "col-sm-9">'+
                                '<div class = "row">'+
                                    '<div class = "col-xs-8">'+
                                        '<label style= "font-size:18px;">'+row['Name_University']+'</label>'+
                                    '</div>'+
                                    btnAction+
                                '</div>'+
                                '<div class = "row">'+
                                    '<div class = "col-xs-12">'+
                                        '<span style = "color:blue;font-size:15px;">'+row['edu_name']+' in '+row['Name_MajorProgramstudy']+ ' | '+row['ctr_name']+'</span>'+
                                    '</div>'+
                                '</div>'+
                                '<div class = "row" style = "margin-top:10px;">'+
                                    '<label class = "col-xs-5 col-sm-3" style = "color:#999;">Major</label>'+
                                    '<label class = "col-xs-7 col-sm-9">'+row['Name_MajorProgramstudy']+'</label>'+
                                '</div>'+
                                '<div class = "row">'+
                                    '<label class = "col-xs-5 col-sm-3" style = "color:#999;">IPK</label>'+
                                    '<label class = "col-xs-7 col-sm-9">'+row['IPK']+'</label>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<hr/>' 
                        ;
            }
            selectorHTML.html(html);
            
        }
    }

    __Load_ajax_page_work_experience = async (selector,activeBtn = 'active') => {
        let cls = this;
        let url = base_url_js+'action1/load_work_experience';
        let token = '';
        const ajaxGetResponse = await AjaxSubmitFormPromises(url,token);
        let btnAdd = (activeBtn == 'active') ? '                <div class="col-md-4" style="text-align: right;">' +
            '                    <button class="btn btn-success" id="btnAddingExperience">Add Experience</button>' +
            '                </div>' : '';
        selector.html('<div class="well">' +
            '            <div class="row">' +
            '                <div class="col-md-8">' +
            '                    <h3 id="viewName" style="margin-top: 7px;font-weight: bold;">'+sessionNPM+' - '+sessionName+'</h3>' +
            '                </div>' +
                            btnAdd+
            '            </div>' +
            '        </div>' +
            '       <table class="table table-striped">' +
            '            <thead>' +
            '            <tr>' +
            '                <th style="width: 20%;text-align: center;">Date</th>' +
            '                <th style="text-align: center;">Company</th>' +
            '                <th style="width: 10%;text-align: center;"><i class="fa fa-cog"></i></th>' +
            '            </tr>' +
            '            </thead>' +
            '            <tbody id="listBodyExperience"></tbody>' +
            '        </table>');
        let jsonResult = ajaxGetResponse;
        if(jsonResult.length>0){
            $.each(jsonResult,function (i,v) {

                var StartMonth = (v.StartMonth!='' && v.StartMonth!=null) ? moment().months((parseInt(v.StartMonth)-1)).format('MMMM') : '';
                var StartYear = (v.StartYear!='' && v.StartYear!=null) ? v.StartYear : '';

                var EndMonth = (v.EndMonth!='' && v.EndMonth!=null)
                    ? moment().months((parseInt(v.EndMonth)-1)).format('MMMM') : '';
                var EndYear = (v.EndYear!='' && v.EndYear!=null) ? v.EndYear : '';

                var Last = (v.Status=='1') ? 'Present job' : EndMonth+' '+EndYear;

                var pMonth = (moment().month() + 1);
                var pYear = moment().year();

                if(v.Status=='0'){
                    pMonth = v.EndMonth;
                    pYear = v.EndYear;
                }

                var y = (parseInt(pYear)-parseInt(StartYear));
                var m = (parseInt(pMonth) >= parseInt(v.StartMonth)) ? Math.abs(parseInt(pMonth)-parseInt(v.StartMonth))
                    : 12 - Math.abs(parseInt(pMonth)-parseInt(v.StartMonth));

                var viewLamaKerja = (y>0) ? y+' year '+m+' months' : m+' months';

                var WorkSuitability = (v.WorkSuitability!='0')
                    ? '<i class="fa fa-check-circle margin-right" style="color: green;" aria-hidden="true"></i> Yes'
                    : '<i class="fa fa-times-circle margin-right" aria-hidden="true"></i> No';

                var WorkSuitability = '<b style="color: red;">Low</b>';
                if(v.WorkSuitability=='1' || v.WorkSuitability==1){
                    WorkSuitability = '<b style="color: royalblue;">Medium</b>';
                }
                else if(v.WorkSuitability=='2' || v.WorkSuitability==2){
                    WorkSuitability = '<b style="color: green;">High</b>';
                }

                let btnEdit = (activeBtn == 'active') ? '<button class="btn btn-default btnEditExperience" data-token="'+jwt_encode(v,'UAP)(*')+'" data-id="'+v.ID+'">Edit</button>' : '';

                $('#listBodyExperience').append('<tr>' +
                    '    <td>' +
                    '        <p>'+StartMonth+' '+StartYear+' - '+Last+'</p>' +
                    '        <p class="block-helped">'+viewLamaKerja+'</p>' +
                    '    </td>' +
                    '    <td>' +
                    '        <h3 style="margin-top: 0px;font-weight: bold;">'+v.Title+'<br/><small>'+v.PositionLevel+' | '+v.Address+'</small></h3>' +
                    '        <table class="table table-details">' +
                    '            <tr>' +
                    '                <td>Company</td>' +
                    '                <td>:</td>' +
                    '                <td>'+v.Company+'</td>' +
                    '            </tr>' +
                    '            <tr>' +
                    '            <tr>' +
                    '                <td>Industry</td>' +
                    '                <td>:</td>' +
                    '                <td>'+v.Industry+'</td>' +
                    '            </tr>' +
                    '            <tr>' +
                    '            <tr>' +
                    '                <td>Position Level</td>' +
                    '                <td>:</td>' +
                    '                <td>'+v.PositionLevel+'</td>' +
                    '            </tr>' +
                    '            <tr>' +
                    '                <td>Job Description</td>' +
                    '                <td>:</td>' +
                    '                <td>'+v.JobDescription+'</td>' +
                    '            </tr>' +
                    '            <tr>' +
                    '                <td>Work Suitability</td>' +
                    '                <td>:</td>' +
                    '                <td>'+WorkSuitability+'</td>' +
                    '            </tr>' +
                    '        </table>' +
                    '    </td>' +
                    '    <td style="text-align: center;">' +
                            btnEdit+
                    '    </td>' +
                    '</tr>');
            });
        } else {
            $('#listBodyExperience').append('<tr>' +
                '<td colspan="3" style="text-align: center;">Data not yet</td>' +
                '</tr>');
        }

        App_template.LoadingModalEnd();
        
    }
}