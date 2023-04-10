$(document).ready(function (){
    // alert('test');
    // $("#sort").on('change',function(){
    //     this.form.submit();
    // });
    // $("#sort").on('change',function(){
    //     // alert('test');
    //     var sort = $(this).val();
    //     var url = $('#url').val();
    //     // alert(sort);
    //     $.ajax({
    //         url:url,
    //         method:"post",
    //         data:{product_one:product_one,sort:sort,url:url},
    //         success:function(data){
    //             $('.filter_products').html(data);
    //         }
    //     });
    // });


    // $('.product_one').on('click',function(){
    //     var product_one = get_filter(this);
    //     // var fabric = get_filter('fabric');
    //     var sort = $("#sort option:selected").text();
    //     var url = $('#url').val();

    //     $.ajax({
    //         url:url,
    //         method:"post",
    //         data:{product_one:product_one,sort:sort,url:url},
    //         success:function(data){
    //             $('.filter_products').html(data);
    //         }
    //     })

    // });



    $("#sort").on('change',function(){
        // alert('test');
        var sort = $(this).val();
        var product_one = get_filter('product_one');
        var product_two = get_filter('product_two');
        var product_three = get_filter('product_three');
        var product_four = get_filter('product_four');
        var product_five = get_filter('product_five');
        var product_six = get_filter('product_six');
        var url = $('#url').val();
        // alert(url);
        $.ajax({
            url:url,
            method:"post",
            data:{product_one:product_one,product_two:product_two,product_three:product_three,product_four:product_four,product_five:product_five,product_six:product_six,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })
    });



    $('.product_one').on('click',function(){
        // var fabric = get_filter(this);
        var product_one = get_filter('product_one');
        var product_two = get_filter('product_two');
        var product_three = get_filter('product_three');
        var product_four = get_filter('product_four');
        var product_five = get_filter('product_five');
        var product_six = get_filter('product_six');
        var sort = $("#sort option:selected").val();
        var url = $('#url').val();

        $.ajax({
            url:url,
            method:"post",
            data:{product_one:product_one,product_two:product_two,product_three:product_three,product_four:product_four,product_five:product_five,product_six:product_six,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })

    });


    $('.product_two').on('click',function(){
        // var fabric = get_filter(this);
        var product_one = get_filter('product_one');
        var product_two = get_filter('product_two');
        var product_three = get_filter('product_three');
        var product_four = get_filter('product_four');
        var product_five = get_filter('product_five');
        var product_six = get_filter('product_six');
        var sort = $("#sort option:selected").val();
        var url = $('#url').val();

        $.ajax({
            url:url,
            method:"post",
            data:{product_one:product_one,product_two:product_two,product_three:product_three,product_four:product_four,product_five:product_five,product_six:product_six,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })

    });


    $('.product_three').on('click',function(){
        // var fabric = get_filter(this);
        var product_one = get_filter('product_one');
        var product_two = get_filter('product_two');
        var product_three = get_filter('product_three');
        var product_four = get_filter('product_four');
        var product_five = get_filter('product_five');
        var product_six = get_filter('product_six');
        var sort = $("#sort option:selected").val();
        var url = $('#url').val();

        $.ajax({
            url:url,
            method:"post",
            data:{product_one:product_one,product_two:product_two,product_three:product_three,product_four:product_four,product_five:product_five,product_six:product_six,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })

    });


    $('.product_four').on('click',function(){
        // var fabric = get_filter(this);
        var product_one = get_filter('product_one');
        var product_two = get_filter('product_two');
        var product_three = get_filter('product_three');
        var product_four = get_filter('product_four');
        var product_five = get_filter('product_five');
        var product_six = get_filter('product_six');
        var sort = $("#sort option:selected").val();
        var url = $('#url').val();

        $.ajax({
            url:url,
            method:"post",
            data:{product_one:product_one,product_two:product_two,product_three:product_three,product_four:product_four,product_five:product_five,product_six:product_six,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })

    });


    $('.product_five').on('click',function(){
        // var fabric = get_filter(this);
        var product_one = get_filter('product_one');
        var product_two = get_filter('product_two');
        var product_three = get_filter('product_three');
        var product_four = get_filter('product_four');
        var product_five = get_filter('product_five');
        var product_six = get_filter('product_six');
        var sort = $("#sort option:selected").val();
        var url = $('#url').val();

        $.ajax({
            url:url,
            method:"post",
            data:{product_one:product_one,product_two:product_two,product_three:product_three,product_four:product_four,product_five:product_five,product_six:product_six,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })

    });


    $('.product_six').on('click',function(){
        // var fabric = get_filter(this);
        var product_one = get_filter('product_one');
        var product_two = get_filter('product_two');
        var product_three = get_filter('product_three');
        var product_four = get_filter('product_four');
        var product_five = get_filter('product_five');
        var product_six = get_filter('product_six');
        var sort = $("#sort option:selected").val();
        var url = $('#url').val();

        $.ajax({
            url:url,
            method:"post",
            data:{product_one:product_one,product_two:product_two,product_three:product_three,product_four:product_four,product_five:product_five,product_six:product_six,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })

    });



    function get_filter(class_name){
        var filter=[];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }


    $("#getPrice").change(function(){
        // alert("test");
        var size = $(this).val();
        if (size=='') {
            alert('please select size');
            return false;
        }
        var product_id = $(this).attr('product-id');
        // alert(product_id);
        $.ajax({
            url:'get-product-price',
            data:{size:size,product_id:product_id,},
            type:"post",
            success:function(resp){
                // alert(resp)
                $('.getAttrPrice').html("€"+resp);
            },error:function(){
                // alert('error');
            }
        });
    });


    // $("#getPrice").change(function(){
    //     // alert("test");
    //     var size = $(this).val();
    //     if (size=='') {
    //         alert('please select size');
    //         return false;
    //     }
    //     var product_id = $(this).attr('product-id');
    //     // alert(product_id);
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url:'get-product-price',
    //         data:{size:size,product_id:product_id,},
    //         type:"post",
    //         success:function(resp){
    //             // alert(resp)
    //             $('.getAttrPrice').html("€"+resp);
    //         },error:function(){
    //             // alert('error');
    //         }
    //     });
    // });



    $("#getPrice").change(function(){
        // alert("test");
        var size = $(this).val();
        if (size=='') {
            alert('please select size');
            return false;
        }
        var product_id = $(this).attr('product-id');
        // alert(product_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'get-product-price',
            data:{size:size,product_id:product_id,},
            type:"post",
            success:function(resp){
                // alert(resp)
                $('.getAttrPrice').html("€"+resp);
            },error:function(){
                // alert('error');
            }
        });
    });




});

