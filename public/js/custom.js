$(document).ready(function() {

    $('form textarea').summernote({
        height: 300,
        codemirror: { // codemirror options
            theme: 'monokai'
        }
    });

    $('#example').DataTable();
    
    $('#category-list').select2({
        placeholder: "Select category",
        allowClear: true
    })
 
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    })

    //=========sidebar menu=============//

    $('.sidebar-menu li').on('click', function() {
        if (!$(this).hasClass() == 'active') {
            $(this).addClass('active')
            $('.sidebar-menu li').removeClass('active')
        }
    })

    $('.sidebar-menu li ul.treeview-menu').on('click', function() {
        if (!$(this).hasClass() == 'active') {
            $(this).addClass('active')
            $(this).parent('li').addClass('active')
            $('.sidebar-menu li').removeClass('active')
        }
    })
    $('#pcolor, #scolor, #color1, #color2, #color3, #color4, #color5, #color6').colorpicker();

    //---------static change ----------//
    $(document).on('change', '#Option', function() {
        var value = $(this).val()
        if (value == 'img') {
            $(this).parent().children('.wrap-background-img').show()
            $(this).parent().children('.wrap-background-color').hide()
        } else {
            $(this).parent().children('.wrap-background-img').hide()
            $(this).parent().children('.wrap-background-color').show()
        }
    })

    //------slider add more --------//
    var clicks = 0;
    $(document).on('click', '.addmorebtn', function() {
        clicks++;
        $('.add .counter').val(clicks)
            //$('.add .sliderid').val(clicks)
        var count = $('.add .counter').val();
        $('.add .sliderimg').attr('id', 'sliderimg' + count)
            //$('.add #iconimg').attr('name','iconimg'+clicks+'[]')
        $('.add .bgimg').attr('id', 'bgimg' + count)
        $('.add .textarea').attr('id', 'sliderdesc' + count)

        //$('.add #sliderimg'+count).attr('onchange','readURL(this, '+count+');')
        var html = $('.add').html()
        $('.form-horizontal #slider-wrap').append(html)
        if (clicks > 0) {
            $('#sliderimg' + count).attr('onchange', 'readURL(this, ' + count + ');')
            $('form #add-slider-wrap #sliderdesc' + count).summernote({
                height: 300,
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            })
        }


    })

    //------slider add more from edit section--------//
    var nums = $('#add-slider-wrap .count').val() - 1;
    $(document).on('click', '.addmoreslider', function() {
        nums++;

        $('.addslider .counter').val(nums)
        var count = $('.addslider .counter').val();
        $('.addslider .sliderimg').attr('id', 'sliderimg' + count)
        $('.addslider .bgimgs').attr('id', 'bgimg' + count)
        $('.addslider .textarea').attr('id', 'sliderdesc' + count)

        var html = $('.addslider').html()
        $('.form-horizontal #slider-wrap').append(html)
        if (nums > 0) {
            $('#sliderimg' + count).attr('onchange', 'readURL(this, ' + count + ');')
            $('form #slider-wrap #sliderdesc' + count).summernote({
                height: 300,
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            })
        }


    })

    //-----------static add more --------------//

    $(document).on('click', '.addmoreblock', function() {
        clicks++;
        $('.addstatic .counter').val(clicks)
        var count = $('.addstatic .counter').val();
        $('.addstatic .bgimg').attr('id', 'bgimg' + count)
        $('.addstatic .icon-upload').attr('id', 'icon-upload' + count)

        $('.addstatic .textarea').attr('id', 'pagedesc' + count)
        $('.addstatic #order').val(count);
        var html = $('.addstatic').html()
        $('.staticform').append(html)
        $('#pcolor, #scolor, #color1, #color2, #color3, #color4, #color5, #color6').colorpicker();
        if (clicks > 0) {
            $('#icon-upload' + count).attr('onchange', 'readURL(this, ' + count + ');')

            $('form .staticblock #pagedesc' + count).summernote({
                height: 300,
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            })
        }
    })

    //-----------Gallery management --------------//

    $(document).on('click', '.addgallery', function() {
        clicks++;
        $('.addnewgallery .counter').val(clicks)
        var count = $('.addnewgallery .counter').val();
        $('.addnewgallery .galleryimg').attr('id', 'galleryimg' + count)
        $('.addnewgallery .bgimg').attr('id', 'bgimg' + count)

        $('.addnewgallery .textarea').attr('id', 'sliderdesc' + count)
        var html = $('.addnewgallery').html()
        $('.gallery-wrap').append(html)
        if (clicks > 0) {
            $('#galleryimg' + count).attr('onchange', 'readURL(this, ' + count + ');')

            $('form .gallery-wrap #pagedesc' + count).summernote({
                height: 300,
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            })
        }
    })








    //-----------newsevent image upload ------------//

    $(document).on('click', '#uploadimg .addimg', function() {
        clicks++;
        $('#uploadimg .box-body').append('<div class="wrap"><span class="btn btn-default btn-file"><i class="fa fa-folder-open"></i>Upload Image<input type="file" name="uploadimg[]" onchange="readURL12(this,' + clicks + ');" accept="image/*" class="icon-upload"></span><img id="preview"  class="manage-width icon-img' + clicks + '" src="#" alt="Icon" style="display:none;" /></div>')
    })

    /* Delete event image uploaded */

    $(document).on('click', 'a#deleteimg', function() {
        var id = $(this).attr('data-id')
        var eid = $(this).attr('data-event-id')
        var _this = $(this);
        $.ajax({
                type: "POST",
                url: base_url + '/events/imgdelete',
                data: {
                    pid: id,
                    eid: eid
                },
                dataType: 'json',
            })
            .done(function(data) {
                console.log(data)
                _this.parent().children('img').attr('src', '')
                    //$('.bg-img.featured-img').css('background-image', 'url()')
            })
            .fail(function() {
                console.log('error');
            })

    })

    //------------- Add Contact Backend ------------//

    $(document).on('click', '#addcontact', function() {
        clicks++;
        $('.add-box-body .counter').val(clicks)
        var html = $('.add-box-body').html()
        $('.contactform .box').append(html)
    })

    /* Delete featured image */

    $(document).on('click', 'a#delete', function() {
        var id = $(this).attr('data-id')
        var returnurl = $(this).attr('data-url')
        var tables = $(this).attr('data-table')
        $.ajax({
                type: "POST",
                url: base_url + '/delete/featuredimg',
                data: {
                    pid: id,
                    table: tables
                },
                dataType: 'json',
            })
            .done(function(data) {
                $('.bg-img.featured-img').css('background-image', 'url()')
            })
            .fail(function() {
                console.log('error');
            })

    })

    /* Menu Management */


    $('.dd').nestable({
        dropCallback: function(details) {

            var order = new Array();
            $("li[data-id='" + details.destId + "']").find('ol:first').children().each(function(index, elem) {
                order[index] = $(elem).attr('data-id');
            });

            if (order.length === 0) {
                var rootOrder = new Array();
                $("#nestable > ol > li").each(function(index, elem) {
                    rootOrder[index] = $(elem).attr('data-id');
                });
            }
            $.ajax({
                    type: "POST",
                    url: base_url + '/admin/menus/order',
                    data: {
                        source: details.sourceId,
                        destination: details.destId,
                        order: JSON.stringify(order),
                        rootOrder: JSON.stringify(rootOrder)
                    },
                    dataType: 'json',
                })
                .done(function(data) {
                    $("#success-indicator").fadeIn(100).delay(1000).fadeOut();
                })
                .fail(function() {
                    console.log('error');
                })
        }
    });

    $('.delete_toggle').each(function(index, elem) {
        $(elem).click(function(e) {
            e.preventDefault();
            // alert('here');
            $('#postvalue').attr('value', $(elem).attr('rel'));
            $('#deleteModal').modal('toggle');
        });
    });


})

function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // $('.bg-img')
            //     .attr('src', e.target.result)
            //     .width(150)
            //     .height(200);
            if (id == '') {
                $('.bg-img').css('background-image', 'url(' + e.target.result + ')')
                $('.bg-img').addClass('slider-image')
            } else {
                $('form .inner-wrap.second #bgimg' + id).css('background-image', 'url(' + e.target.result + ')')
                $('form .inner-wrap.second #bgimg' + id).css({
                        'background-repeat': 'no-repeat',
                        'background-size': 'cover',
                        '-webkit-background-size': 'cover',
                        'min-height': '250px',
                        'background-position': 'center'
                    })
                    // $('.inner-wrap.second #bgimg'+id).addClass('slider-image')
            }
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        if (id == '') {
            $('.bg-img').css('background-image', 'url(' + e.target.result + ')')
        } else {
            $('form .inner-wrap.second #bgimg' + id).css('background-image', 'url()')
        }
    }
}

function readURL1(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            if (id == '') {
                $('form .icon-img')
                    .attr('src', e.target.result)
                    .width(110)
                    .height(110);
            } else {

                $('form .inner-wrap.second #iconimgs' + id)
                    .attr('src', e.target.result)
                    .width(110)
                    .height(110);
            }

        };

        reader.readAsDataURL(input.files[0]);
    } else {
        if (id == '') {
            $('form .icon-img')
                .attr('src', '');
        } else {

            $('form .inner-wrap.second #iconimgs' + id)
                .attr('src', '');
        }
    }
}

function readURL12(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            if (id == '') {
                $('form .icon-imgs')
                    .attr('src', e.target.result);
                $('form .icon-imgs').show()
            } else {

                $('form .icon-img' + id)
                    .attr('src', e.target.result);
                $('form .icon-img' + id).show()
            }

        };

        reader.readAsDataURL(input.files[0]);
    } else {
        if (id == '') {
            $('form .icon-imgs')
                .attr('src', '');
        } else {

            $('form .icon-img' + id)
                .attr('src', '');
        }
    }
}

function readfeatured(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {

            $('.bg-img').addClass('featured-img')
            $('.featured-img').css('background-image', 'url(' + e.target.result + ')')

        };

        reader.readAsDataURL(input.files[0]);
    } else {
        $('.featured-img').css('background-image', 'url()')
    }
}

function readfeatured10(input, classname) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('form .' + classname).css('background-image', 'url(' + e.target.result + ')')
        };
        $('form .' + classname).show()
        $('form .' + classname).addClass('header-img')

        reader.readAsDataURL(input.files[0]);
    } else {
        $('form .' + classname).css('background-image', 'url()')
        $('form .' + classname).removeClass('header-img')
    }
}

function readfeatured1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {

            $('form .icon-img')
                .attr('src', e.target.result)
            $('form .icon-img').show()
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        $('form .icon-img')
            .attr('src', '')
    }
}