$(document).ready(function () {
    // check admin password correct or not
    $("#current_pwd").keyup(function () {
        var current_pwd = $("#current_pwd").val();
        // alert(current_pwd);
        $.ajax({
            type: "post",
            url: "check-current-pwd",
            data: {
                current_pwd: current_pwd
            },
            success: function (resp) {
                // alert(resp);
                if (resp == "false") {
                    $("#chkCurrentPwd").html(
                        "<font color=red>Current Password is incorrect</font>"
                    );
                } else if (resp == "true") {
                    $("#chkCurrentPwd").html(
                        "<font color=green>Current Password is correct</font>"
                    );
                }
            },
            error: function () {
                alert("error");
            }
        });
    });

    // $(".updateSectionStatus").click(function () {
        $(document).on('click', '.updateSectionStatus', function () {
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
        // alert(status);
        // alert(section_id);
        $.ajax({
            type: "post",
            url: "update-section-status",
            data: {
                status: status,
                section_id: section_id
            },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#section-" + section_id).html(
                        "<a class='updateSectionStatus' href='javascript: void(0)'>Inactive</a>"
                    );
                } else if (resp["status"] == 1) {
                    $("#section-" + section_id).html(
                        "<a class='updateSectionStatus' href='javascript: void(0)'>Active</a>"
                    );
                }
            },
            error: function () {
                // alert("error");
            }
        });
    });


    // Brand Status change
    // $(".updateBrandStatus").click(function () {
        $(document).on('click', '.updateBrandStatus', function () {
        var status = $(this).text();
        var brand_id = $(this).attr("brand_id");
        // alert(status);
        // alert(brand_id);
        $.ajax({
            type: "post",
            url: "update-brand-status",
            data: {
                status: status,
                brand_id: brand_id
            },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#brand-" + brand_id).html(
                        "<a class='updateBrandStatus' href='javascript: void(0)'>Inactive</a>"
                    );
                } else if (resp["status"] == 1) {
                    $("#brand-" + brand_id).html(
                        "<a class='updateBrandStatus' href='javascript: void(0)'>Active</a>"
                    );
                }
            },
            error: function () {
                // alert("error");
            }
        });
    });


// Blog Status change
// $(".updateBlogStatus").click(function () {
    $(document).on('click', '.updateBlogStatus', function () {
    var status = $(this).text();
    var blog_id = $(this).attr("blog_id");
    // alert(status);
    // alert(blog_id);
    $.ajax({
        type: "post",
        url: "update-blog-status",
        data: {
            status: status,
            blog_id: blog_id
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#blog-" + blog_id).html(
                    "<a class='updateBlogStatus' href='javascript: void(0)'>Inactive</a>"
                );
            } else if (resp["status"] == 1) {
                $("#blog-" + blog_id).html(
                    "<a class='updateBlogStatus' href='javascript: void(0)'>Active</a>"
                );
            }
        },
        error: function () {
            // alert("error");
        }
    });
});



// Banner Status change
// $(".updateBannerStatus").click(function () {
    $(document).on('click', '.updateBannerStatus', function () {
    var status = $(this).text();
    var banner_id = $(this).attr("banner_id");
    // alert(status);
    // alert(banner_id);
    $.ajax({
        type: "post",
        url: "update-banner-status",
        data: {
            status: status,
            banner_id: banner_id
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#banner-" + banner_id).html(
                    "<a class='updateBannerStatus' href='javascript: void(0)'>Inactive</a>"
                );
            } else if (resp["status"] == 1) {
                $("#banner-" + banner_id).html(
                    "<a class='updateBannerStatus' href='javascript: void(0)'>Active</a>"
                );
            }
        },
        error: function () {
            // alert("error");
        }
    });
});



    // Tag Status change
    // $(".updateTagStatus").click(function () {
        $(document).on('click', '.updateTagStatus', function () {
        var status = $(this).text();
        var tag_id = $(this).attr("tag_id");
        // alert(status);
        // alert(tag_id);
        $.ajax({
            type: "post",
            url: "update-tag-status",
            data: {
                status: status,
                tag_id: tag_id
            },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#tag-" + tag_id).html(
                        "<a class='updateTagStatus' href='javascript: void(0)'>Inactive</a>"
                    );
                } else if (resp["status"] == 1) {
                    $("#tag-" + tag_id).html(
                        "<a class='updateTagStatus' href='javascript: void(0)'>Active</a>"
                    );
                }
            },
            error: function () {
                // alert("error");
            }
        });
    });


    // Coupon Status change
    // $(".updateCouponStatus").click(function () {
        $(document).on('click', '.updateCouponStatus', function () {
            var status = $(this).text();
            var coupon_id = $(this).attr("coupon_id");
            // alert(status);
            // alert(coupon_id);
            $.ajax({
                type: "post",
                url: "update-coupon-status",
                data: {
                    status: status,
                    coupon_id: coupon_id
                },
                success: function (resp) {
                    if (resp["status"] == 0) {
                        $("#coupon-" + coupon_id).html(
                            "<a class='updateCouponStatus' href='javascript: void(0)'>Inactive</a>"
                        );
                    } else if (resp["status"] == 1) {
                        $("#coupon-" + coupon_id).html(
                            "<a class='updateCouponStatus' href='javascript: void(0)'>Active</a>"
                        );
                    }
                },
                error: function () {
                    // alert("error");
                }
            });
        });





    // Category Status
    $(document).on('click', '.updateCategoryStatus', function () {
    // $(".updateCategoryStatus").click(function () {
        var status = $(this).text();
        var category_id = $(this).attr("category_id");
        // alert(status);
        // alert(category_id);
        $.ajax({
            type: "post",
            url: "update-category-status",
            data: {
                status: status,
                category_id: category_id
            },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#category-" + category_id).html(
                        "<a class='updateCategoryStatus' href='javascript: void(0)'>Inactive</a>"
                    );
                } else if (resp["status"] == 1) {
                    $("#category-" + category_id).html(
                        "<a class='updateCategoryStatus' href='javascript: void(0)'>Active</a>"
                    );
                }
            },
            error: function () {
                // alert("error");
            }
        });
    });

    // Product Status
    // $(".updateProductStatus").click(function () {
        $(document).on('click', '.updateProductStatus', function () {
        var status = $(this).text();
        var product_id = $(this).attr("product_id");
        // alert(status);
        // alert(product_id);
        $.ajax({
            type: "post",
            url: "update-product-status",
            data: {
                status: status,
                product_id: product_id
            },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#product-" + product_id).html(
                        "<a class='updateProductStatus' href='javascript: void(0)'>Inactive</a>"
                    );
                } else if (resp["status"] == 1) {
                    $("#product-" + product_id).html(
                        "<a class='updateProductStatus' href='javascript: void(0)'>Active</a>"
                    );
                }
            },
            error: function () {
                // alert("error");
            }
        });
    });

    // Append Categories level

    $("#section_id").change(function () {
        var section_id = $(this).val();
        // alert(section_id);
        $.ajax({
            type: "post",
            url: "append-categories-level",
            data: {
                section_id: section_id
            },
            success: function (resp) {
                $("#appendCategoriesLevel").html(resp);
            },
            error: function () {
                // alert('error');
            }
        });
    });

    // confirm deletion of sweet alert
    // $(".confirmDelete").click(function () {
        $(document).on('click', '.confirmDelete', function () {
        var record = $(this).attr("record");
        var recordid = $(this).attr("recordid");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if (result.value) {
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
                window.location.href =
                    "/admin/delete-" + record + "/" + recordid;
            }
        });
    });

    // Product Attribute add/remove script
    var maxField = 10; //Input fields increment limitation
    var addButton = $(".add_button"); //Add button selector
    var wrapper = $(".field_wrapper"); //Input field wrapper
    var fieldHTML =
        '<div style="margin-top:10px;"><input placeholder="Size" type="text" name="size[]" value=""/>&nbsp;<input placeholder="price" type="text" name="price[]" value=""/>&nbsp;<input placeholder="stock" type="text" name="stock[]" value=""/>&nbsp;<input placeholder="sku" type="text" name="sku[]" value=""/><a href="javascript:void(0);" class="remove_button">Remove</a></>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function () {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on("click", ".remove_button", function (e) {
        e.preventDefault();
        $(this)
            .parent("div")
            .remove(); //Remove field html
        x--; //Decrement field counter
    });
    //End Product Attribute add/remove script
});
