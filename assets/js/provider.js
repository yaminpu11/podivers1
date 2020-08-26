


function getDataContent(type, element) {
    var data = {
        type : type,
    };

    var token = jwt_encode(data,'UAP)(*');
    var url = base_url_js+'getDataContent';
    var locimg = base_url_js_sw+'uploads/alumni';
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        async : true,    
        data: { token: token },
        cache: false,
        success: function( response ) 
        {                 
           if(type=='banner'){
               
                var i;
                for(i=0,variArray=response.length; i<variArray; i++){
                    var activeLink = (i == 0) ? 'active' : '';
                    $('#ViewSlider').append('<div class="carousel-item '+activeLink+' view ">'+
                        '<img class="d-block w-100 img-fitter" data-src="'+locimg+'/'+response[i].File+'" height="660px"  alt="'+response[i].TitleContent+'" >'+
                        '<div class="mask flex-center rgba-black-light rgba-gradient"></div>'+
                      '</div>');
                }
                $('.img-fitter').imgFitter({
                    // CSS background position
                    backgroundPosition: 'center center',
                    // for image loading effect
                    fadeinDelay: 400,
                    fadeinTime: 1200

                });
           }

           else if(type=="event"){
                var des = '';
                for(i=0,variArray=response.length; i<variArray; i++){
                    var getdate = response[i].AddDate;
                    var fromat = moment(getdate).format("D-MM-YYYY HH:mm");
                    var day = moment(getdate).format("DD");
                    var month = moment(getdate).format("MMMM");
                    var year = moment(getdate).format("YYYY");
                    
                    des += 
                            '<div class="col-lg-4 col-md-12 mb-lg-5 mb-4">'+
                                '<div class=card>'+
                                '<a href="'+base_url_js+'event/'+response[i].ID_Content+'">'+
                                  '<div class="overlay rounded  mb-4 ">'+
                                    '<time class="p-3 purple-gradient" datetime="">'+
                                      '<span class="day font-weight-bold">'+day+'</span>'+
                                      '<span class="month">'+month+'</span>'+
                                      '<span class="year">'+year+'</span>'+
                                      '<span class="time">'+fromat+'</span>'+
                                    '</time>'+                                
                                  '</div>'+
                                '</a>'+
                              
                              '<h4 class="font-weight-bold mb-3 text-capitalize"><strong>'+response[i].TitleContent+'</strong></h4>'+
                              '<p>by <a class="font-weight-bold">'+response[i].Name+'</a>, '+fromat+'</p>'+
                              '<p class="dark-grey-text">'+response[i].Description+'</p>'+
                              '<a href="'+base_url_js+'event/'+response[i].ID_Content+'" class="btn btn-red btn-rounded btn-md mb-4 mx-5">Read more</a>'+
                              '</div>'+
                            '</div>';

                };

                $('#viewEventAll').append(des);
           }               
            
        },
        error: function( error )
        {
         alert( error );
        }
    });
    
}



function getdataBlogsByApi(type, element) {
    var data = {
        type : type,
    };
    var token = jwt_encode(data,'UAP)(*');
    var url = base_url_js+'getapinewsbyblog';
    var locimg = base_url_admblog+'upload/';    
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        async : true,
        cache: false,
        data: { token: token },       
        success: function( response ) 
        {                 
        // console.log(response);       
            var i;
            for(i=0,variArray=response.length; i<variArray; i++){ //Fast looping array
                var strtittlew1 = response[i].Title;
                var titleres1 = (strtittlew1.length>30) ? strtittlew1.split(' ')[0]+' '+strtittlew1.split(' ')[1]+' '+strtittlew1.split(' ')[2]+' '+strtittlew1.split(' ')[3]+'...' : strtittlew1;
                var str = response[i].Content;
                var res = str.substring(110,0);
                var activeLink = (i == 0) ? 'active' : '';
                $('#ViewNewsLimit').append('<div class="carousel-item active">'+
                  '<div class="w-100">'+
                    '<div class="card card-wrapper mb-2">'+
                      '<div class="card-up" style="background-image: url('+locimg+''+response[i].Images+'); background-size: cover; background-position:top center;background-repeat: no-repeat;border-top-right-radius: 5px;border-top-left-radius: 5px;">'+
                      '<div class="time-news"><i class="fas fa-clock"></i> '+response[i].CreateAT+'</div>'+
                      '</div>'+

                      '<div class="card-body mx-2 pb-0">'+
                        '<p class="card-title font-weight-bold">'+titleres1+'</p>'+
                        '<p class="card-text" >'+res+'...</p>'+

                      '</div>'+
                      '<div class="clearfix"></div>'+
                      '<div class="card-footer">'+
                        '<a href="'+base_url_blog+'article/'+response[i].ID_title+'/'+response[i].SEO_title+'" target="_blank" class="btn btn-primary btn-md btn-rounded float-left">Read More</a>'+
                      '<div>'+
                    '</div>'+
                  '</div>'+
                '</div>');
            }
            // $('.carousel-item').find('.carousel-item').addClass('active');
                   
            var owl = $('#ViewNewsLimit');
            owl.owlCarousel({
                items:6,
                center: true,
                loop:true,
                margin:20,
                nav:true,
                autoplay:true,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:false
                    },
                    900:{
                        items:2,
                        nav:true,
                        loop:false
                    },
                    1366:{
                        items:4,
                        nav:true,
                        loop:false
                    },
                    1362:{
                        items:4,
                        nav:true,
                        loop:false
                    },
                    1440:{
                        items:6,
                        nav:true,
                        loop:false
                    }
                },
                navText: ['<div class="btn-floating btn-primary float-left left-20x waves-effect waves-light" style="line-height: 4.2;"><span class="fas fa-chevron-left fa-2x"></span></div>','<div class="btn-floating btn-primary float-right right-20x waves-effect waves-light" style="line-height: 4.2;"><span class="fas fa-chevron-right fa-2x"></span></div>'],

            }); 
            $('.play').on('click',function(){
                owl.trigger('play.owl.autoplay',[4000])
            })
            $('.stop').on('click',function(){
                owl.trigger('stop.owl.autoplay')
            })
        },
        error: function( error )
        {
         alert( error );
        }
    });
}
function getdataBlogsByApiBPM(type, element) {
    var data = {
        type : type,
    };
    var token = jwt_encode(data,'UAP)(*');
    var url = base_url_js+'getapinewsbyblog';
    var locimg = base_url_admblog+'upload/';    
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        async : true,
        cache: false,
        data: { token: token },       
        success: function( response ) 
        {                 
        // console.log(response);       
            var i;
            for(i=0,variArray=response.length; i<variArray; i++){ //Fast looping array
                var strtittlew1 = response[i].Title;
                var titleres1 = (strtittlew1.length>30) ? strtittlew1.split(' ')[0]+' '+strtittlew1.split(' ')[1]+' '+strtittlew1.split(' ')[2]+' '+strtittlew1.split(' ')[3]+'...' : strtittlew1;
                var str = response[i].Content;
                var res = str.substring(110,0);
                var activeLink = (i == 0) ? 'active' : '';
                $('#ViewBPMNewsLimit').append('<div class="carousel-item active">'+
                  '<div class="w-100">'+
                    '<div class="card card-wrapper mb-2">'+
                      '<div class="card-up" style="background-image: url('+locimg+''+response[i].Images+'); background-size: cover; background-position:top center;background-repeat: no-repeat;border-top-right-radius: 5px;border-top-left-radius: 5px;">'+
                      '<div class="time-news"><i class="fas fa-clock"></i> '+response[i].CreateAT+'</div>'+
                      '</div>'+

                      '<div class="card-body mx-2 pb-0">'+
                        '<p class="card-title font-weight-bold">'+titleres1+'</p>'+
                        '<p class="card-text" >'+res+'...</p>'+

                      '</div>'+
                      '<div class="clearfix"></div>'+
                      '<div class="card-footer">'+
                        '<a href="'+base_url_blog+'article/'+response[i].ID_title+'/'+response[i].SEO_title+'" target="_blank" class="btn btn-primary btn-md btn-rounded float-left">Read More</a>'+
                      '<div>'+
                    '</div>'+
                  '</div>'+
                '</div>');
            }
            // $('.carousel-item').find('.carousel-item').addClass('active');
                   
            var owl = $('#ViewBPMNewsLimit');
            owl.owlCarousel({
                items:6,
                center: true,
                loop:true,
                margin:20,
                nav:true,
                autoplay:true,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:false
                    },
                    900:{
                        items:2,
                        nav:true,
                        loop:false
                    },
                    1366:{
                        items:4,
                        nav:true,
                        loop:false
                    },
                    1362:{
                        items:4,
                        nav:true,
                        loop:false
                    },
                    1440:{
                        items:6,
                        nav:true,
                        loop:false
                    }
                },
                navText: ['<div class="btn-floating btn-primary float-left left-20x waves-effect waves-light" style="line-height: 4.2;"><span class="fas fa-chevron-left fa-2x"></span></div>','<div class="btn-floating btn-primary float-left left-20x waves-effect waves-light" style="line-height: 4.2;"><span class="fas fa-chevron-right fa-2x"></span></div>'],

            }); 
            $('.play').on('click',function(){
                owl.trigger('play.owl.autoplay',[4000])
            })
            $('.stop').on('click',function(){
                owl.trigger('stop.owl.autoplay')
            })
        },
        error: function( error )
        {
         alert( error );
        }
    });
}


function getdataTestimonial(type, element) {
    var data = {
        type : type,
    };
    var token = jwt_encode(data,'UAP)(*');
    var url = base_url_js+'getDataTestimonial';
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        async : true,    
        data: { token: token },
        cache: false,
        success: function( response ) 
        {              
            var i;
            for(i=0,variArray=response.length; i<variArray; i++){
                var activeLink = (i == 0) ? 'active' : '';
                // alert(count);
                $('#ViewTestimonial').append('<div class="carousel-item '+activeLink+'">'+
                    '<div class="col-12 col-md-12">'+
                      '<div class="card card-wrapper mb-2 font-italic">'+
                        '<h4 class="text-primary font-weight-bold mt-4 text-italic"><i>'+response[i].Name+'</i></h4>'+
                        '<p class="font-weight-normal"><i><i class="fas fa-quote-left pr-2"></i>'+response[i].Testimony+' <i class="fas fa-quote-right pr-2"></i></i></p>'+
                        
                      '</div>'+
                    '</div>'+
                  '</div>');
            }
        },
        error: function( error )
        {
         alert( error );
        }
    });
    
}


function getDataContentAll(type, element) {
    var data = {
        type : type,
    };

    var token = jwt_encode(data,'UAP)(*');
    var url = base_url_js+'getDataContent';
    var locimg = base_url_js_sw+'uploads/alumni/';
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        async : true,    
        data: { token: token },
        cache: false,
        success: function( response ) 
        {                 
            if(type=="event"){
                var des = '';
                for(i=0,variArray=response.length; i<variArray; i++){
                    var getdate = response[i].AddDate;
                    var fromat = moment(getdate).format("D-MM-YYYY HH:mm");
                    var day = moment(getdate).format("DD");
                    var month = moment(getdate).format("MMMM");
                    var year = moment(getdate).format("YYYY");

                    console.log(month); 
                    
                    des += 
                            '<div class="col-lg-4 col-md-12 mb-lg-5 mb-4">'+
                                '<div class="card h-100">'+
                                    '<a href="'+base_url_js+'event/'+response[i].ID_Content+'">'+
                                      '<div class="overlay mb-4">'+
                                        '<time class="p-3 purple-gradient" datetime="">'+
                                          '<span class="day font-weight-bold">'+day+'</span>'+
                                          '<span class="month">'+month+'</span>'+
                                          '<span class="year">'+year+'</span>'+
                                          '<span class="time">'+fromat+'</span>'+
                                        '</time>'+                                
                                      '</div>'+
                                    '</a>'+
                                  
                                  '<h4 class="font-weight-bold mb-3 text-capitalize"><strong>'+response[i].TitleContent+'</strong></h4>'+
                                  '<p>by <a class="font-weight-bold">'+response[i].Name+'</a>, '+fromat+'</p>'+
                                  '<p class="dark-grey-text">'+response[i].Description+'</p>'+
                                  '<a href="'+base_url_js+'event/'+response[i].ID_Content+'" class="btn btn-red btn-rounded btn-md mb-4 mx-5">Read more</a>'+
                                '</div>'+
                            '</div>';

                };

                $('#viewEventAll').append(des);
           }               
            else if(type=="about"){
                var des = '';
                for(i=0,variArray=response.length; i<variArray; i++){
                   
                    des += '<h4 class="card-title indigo-text text-capitalize"><strong>'+response[i].TitleContent+'</strong></h4>'+
                    '<p>'+response[i].Description+'</p>';

                };

                $('#viewAboutAll').append(des);
           } 
        },
        error: function( error )
        {
         alert( error );
        }
    });
    
}



function getDataContentEventDetail(type,id, element) {
    var data = {
        type : type,
        ID : id,
    };

    var token = jwt_encode(data,'UAP)(*');
    var url = base_url_js+'getDataContentDetail';
    var locimg = base_url_js_sw+'uploads/alumni/';
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        async : true,    
        data: { token: token },
        cache: false,
        success: function( response ) 
        {                 
            if(type=="event"){
                var des = '';
                var img = '';
                for(i=0,variArray=response.length; i<variArray; i++){
                    var getdate = response[i].AddDate;
                    var fromat = moment(getdate).format("D-MM-YYYY HH:mm");
                    var day = moment(getdate).format("DD");
                    var month = moment(getdate).format("MMMM");
                    var year = moment(getdate).format("YYYY");

                    console.log(month); 
                    if(response[i].File==null || response[i].File==''){
                        img += '';
                    }else{
                        img +='<img src="'+locimg+''+response[i].File+'" alt="'+response[i].Title+'" class="img-fluid d-block w-100 card-img-top">';
                    }
                    des += 
                            '<div class="card card-cascade wider reverse">'+

                              '<div class="card-body card-body-cascade text-center p-0 mt-1">'+
                                '<div id="imgada">'+
                                '</div>'+
                                '<a href="'+base_url_js+'event/'+response[i].ID_Content+'">'+
                                  '<div class="overlay mb-4">'+
                                    '<time class="p-3 purple-gradient" datetime="">'+
                                      '<span class="day font-weight-bold">'+day+'</span>'+
                                      '<span class="month">'+month+'</span>'+
                                      '<span class="year">'+year+'</span>'+
                                      '<span class="time">'+fromat+'</span>'+
                                    '</time>'+                                
                                  '</div>'+
                                '</a>'+
                                '<div class="px-3 pb-5">'+
                                    '<h4 class="card-title"><strong>'+response[i].TitleContent+'</strong></h4>'+
                                    '<h6 class="font-weight-bold indigo-text py-2">'+response[i].AddDate+'</h6>'+
                                    '<p class="card-text">'+response[i].Description+''+
                                    '</p>'+
                                    '<a class="btn-floating btn-lg btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>'+
                                    '<a class="btn-floating btn-lg btn-pin" type="button" role="button"><i class="fab fa-pinterest"></i></a>'+
                                    '<a class="btn-floating btn-lg btn-li" type="button" role="button"><i class="fab fa-linkedin-in"></i></a>'+
                                '</div>'+

                              '</div>'+

                            '</div>';

                };
                    $('#imgada').append(img);
                    $('#detailEvent').append(des);
            }               
            
        },
        error: function( error )
        {
         alert( error );
        }
    });
    
}
