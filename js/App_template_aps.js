class App_template_aps {

    constructor(){

    }

    LoadingModalStart = () => {
       $('#NotificationModal .modal-header').addClass('hide');
         $('#NotificationModal .modal-body').html('<center>' +
             '                    <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>' +
             '                    <br/>' +
             '                    Loading Data . . .' +
             '<button type="button" id="ModalbtnCancleForm" data-dismiss="modal" class="btn btn-default hide">Close</button>'+
             '                </center>');
         $('#NotificationModal .modal-footer').addClass('hide');
         $('#NotificationModal').modal({
             'backdrop' : 'static',
             'show' : true
         }); 
    }

    LoadingModalEnd = (timeout) => {
        setTimeout(function () {
            $('#NotificationModal').find('#ModalbtnCancleForm').trigger('click');
            $('#NotificationModal').modal('hide');
            
        },timeout);
    }

    Loading_button = (selector) => {
        selector.html('<i class="fa fa-refresh fa-spin fa-fw right-margin"></i> Loading...');
        selector.prop('disabled',true);
    }

    End_loading_button = (selector,html='Save') => {
        selector.prop('disabled',false).html(html);
    }

    loadSummerNote = (selector) => {
        selector.summernote({
            placeholder: 'Your text',
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
    }

    count_notif = () => {
        let url = base_url_js_pcam+'api/__crudLog';
        let data = {
            action: "getTotalUnreadLog",
            UserID: sessionNPM,
            Alumni : 'yes',
        }
        let token = jwt_encode(data,'UAP)(*');
        AjaxSubmitForm(url,token).then(function(response){
            let numWr = (response > 9) ? '9+' : response;
            $('.label-notification').html(numWr);
        }).fail(function(response){
           toastr.error('Connection error,please try again');
           App_template.LoadingModalEnd();
        })
    }
}