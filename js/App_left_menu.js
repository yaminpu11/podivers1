class App_left_menu {

    constructor(){

    }

    __LoadImageByAjax = (selector,style= 'max-width: 90px;') => {
        $.ajax({
            type: "GET",
            url: base_url_js+'get_picture',
            dataType:"html",
            success: function (data) {
                let htmlIMG = '<img src="data:image/jpeg;base64,'+data+'" style="'+style+'">';
                selector.html(htmlIMG);
            }
         });
    }

    __changeUploadPhoto = (selector) => {
        let cls = this;
        let ArrUploadFilesSelector = [];
        let UploadFile = selector;
        let valUploadFile = UploadFile.val();
        if (valUploadFile) { // if upload file
             let NameField = UploadFile.attr('name');
             let temp = {
                 NameField : NameField,
                 Selector : UploadFile,
             };
             ArrUploadFilesSelector.push(temp);
        }

        let FilesValidation =  file_validation_image(ArrUploadFilesSelector[0].Selector,'Upload Photo');
        if (FilesValidation) {
            let url = base_url_js+'action1/change_photo';
            let token = '';
            AjaxSubmitForm(url,token,ArrUploadFilesSelector).then(function(response){
                if (response == 1) {
                    let selectorDiv = $('#LoadImageByAjax');
                    cls.__LoadImageByAjax(selectorDiv);
                    toastr.info('Success');
                }
            }).fail(function(response){
               toastr.error('Connection error,please try again');
            })
        }
    }

}