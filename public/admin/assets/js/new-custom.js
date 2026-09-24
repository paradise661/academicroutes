$ = jQuery;
// document.onkeydown = function (e) {
//     if (
//         e.ctrlKey &&
//         (e.keyCode === 67 ||
//             e.keyCode === 86 ||
//             e.keyCode === 85 ||
//             e.keyCode === 117)
//     ) {
//         return false;
//     } else {
//         return true;
//     }
// };
// $(document).keypress("u", function (e) {
//     if (e.ctrlKey) {
//         return false;
//     } else {
//         return true;
//     }
// });
// $(document).keydown(function (event) {
//     if (event.keyCode == 123) {
//         // Prevent F12
//         return false;
//     } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
//         // Prevent Ctrl+Shift+I
//         return false;
//     }
// });
// $(document).on("contextmenu", function (e) {
//     e.preventDefault();
// });
// var unFocus = function () {
//     if (document.selection) {
//         document.selection.empty();
//     } else {
//         window.getSelection().removeAllRanges();
//     }
// };

// document.getElementById("site").onmousemove = function () {
//     unFocus();
// };
// const img = document.querySelector("img");
// img.setAttribute("draggable", false);

ckeditor("ckeditor");
ckeditor("ckeditor1");
ckeditor("ckeditor2");
ckeditor("ckeditor3");

ckeditor("ckeditor4");
ckeditor("ckeditor10");

function ckeditor($className) {
    CKEDITOR.ClassicEditor.create(document.querySelector("." + $className), {
        toolbar: {
            items: [
                "heading",
                "|",
                "bold",
                "italic",
                "strikethrough",
                "underline",
                "code",
                "subscript",
                "superscript",
                "removeFormat",
                "|",
                "bulletedList",
                "numberedList",
                "|",
                "outdent",
                "indent",
                "|",
                "undo",
                "redo",
                "|",
                "fontSize",
                "fontFamily",
                "fontColor",
                "|",
                "alignment",
                "|",
                "link",
                "insertImage",
                "blockQuote",
                "insertTable",
                "mediaEmbed",
                "|",
                "specialCharacters",
                "horizontalLine",
                "pageBreak",
                "|",
                "sourceEditing",
            ],
            shouldNotGroupWhenFull: true,
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true,
            },
        },
        heading: {
            options: [
                {
                    model: "paragraph",
                    title: "Paragraph",
                    class: "ck-heading_paragraph",
                },
                {
                    model: "heading1",
                    view: "h1",
                    title: "Heading 1",
                    class: "ck-heading_heading1",
                },
                {
                    model: "heading2",
                    view: "h2",
                    title: "Heading 2",
                    class: "ck-heading_heading2",
                },
                {
                    model: "heading3",
                    view: "h3",
                    title: "Heading 3",
                    class: "ck-heading_heading3",
                },
                {
                    model: "heading4",
                    view: "h4",
                    title: "Heading 4",
                    class: "ck-heading_heading4",
                },
                {
                    model: "heading5",
                    view: "h5",
                    title: "Heading 5",
                    class: "ck-heading_heading5",
                },
                {
                    model: "heading6",
                    view: "h6",
                    title: "Heading 6",
                    class: "ck-heading_heading6",
                },
            ],
        },
        placeholder: "",
        fontFamily: {
            options: [
                "default",
                "Arial, Helvetica, sans-serif",
                "Courier New, Courier, monospace",
                "Georgia, serif",
                "Lucida Sans Unicode, Lucida Grande, sans-serif",
                "Tahoma, Geneva, sans-serif",
                "Times New Roman, Times, serif",
                "Trebuchet MS, Helvetica, sans-serif",
                "Verdana, Geneva, sans-serif",
            ],
            supportAllValues: true,
        },
        fontSize: {
            options: [
                8,
                10,
                12,
                14,
                "default",
                18,
                20,
                22,
                24,
                26,
                28,
                30,
                32,
                34,
                36,
            ],
            supportAllValues: true,
        },
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true,
                },
            ],
        },
        htmlEmbed: {
            showPreviews: true,
        },
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: "https://",
                toggleDownloadable: {
                    mode: "manual",
                    label: "Downloadable",
                    attributes: {
                        download: "file",
                    },
                },
            },
        },
        mention: {
            feeds: [
                {
                    marker: "@",
                    feed: [
                        "@apple",
                        "@bears",
                        "@brownie",
                        "@cake",
                        "@cake",
                        "@candy",
                        "@canes",
                        "@chocolate",
                        "@cookie",
                        "@cotton",
                        "@cream",
                        "@cupcake",
                        "@danish",
                        "@donut",
                        "@dragée",
                        "@fruitcake",
                        "@gingerbread",
                        "@gummi",
                        "@ice",
                        "@jelly-o",
                        "@liquorice",
                        "@macaroon",
                        "@marzipan",
                        "@oat",
                        "@pie",
                        "@plum",
                        "@pudding",
                        "@sesame",
                        "@snaps",
                        "@soufflé",
                        "@sugar",
                        "@sweet",
                        "@topping",
                        "@wafer",
                    ],
                    minimumCharacters: 1,
                },
            ],
        },
        removePlugins: [
            "CKBox",
            "CKFinder",
            "EasyImage",
            "RealTimeCollaborativeComments",
            "RealTimeCollaborativeTrackChanges",
            "RealTimeCollaborativeRevisionHistory",
            "PresenceList",
            "Comments",
            "TrackChanges",
            "TrackChangesData",
            "RevisionHistory",
            "Pagination",
            "WProofreader",
            "MathType",
        ],
    });
}

$(".dropify").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});
$(".mainlogo").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});
$(".footerlogo").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});
$(".footerlogo").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});
$(".homepageimage").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});
$(".faqimage").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});

$(".ctaimage").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});
$(".faq_image").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});
$(".page_img").dropify({
    messages: {
        default: "",
        replace: "",
        remove: "Remove",
        error: "Ooops, something wrong happended.",
    },
});
function media($mediaID) {
    $(document).ready(function () {
        $(document).on(
            "click",
            "#" + $mediaID + "files .thumbnails",
            function (e) {
                var id = $(this).attr("data-id");
                var size_class = $(".card_check").length;
                if (size_class > 0) {
                    if ($(".image_card" + id).hasClass("card_check selected")) {
                        $(".image_card" + id).removeClass(
                            "card_check selected"
                        );

                        if ($("#" + $mediaID + "_id").val()) {
                            $("#" + $mediaID + "_remove").removeClass("d-none");
                            $("#" + $mediaID + "_img").removeClass(
                                "custom-width"
                            );
                        } else {
                            $("#" + $mediaID + "_remove").addClass("d-none");
                        }
                    }
                } else {
                    if ($(".image_card" + id).hasClass("card_check selected")) {
                        $(".image_card" + id).removeClass(
                            "card_check selected"
                        );

                        if ($("#" + $mediaID + "_id").val()) {
                            $("#" + $mediaID + "_remove").removeClass("d-none");
                            $("#" + $mediaID + "_img").removeClass(
                                "custom-width"
                            );
                        } else {
                            $("#" + $mediaID + "_remove").addClass("d-none");
                        }
                    } else {
                        $(".image_card" + id).addClass("card_check selected");

                        $("#" + $mediaID + "-image-close").click(function () {
                            var imgvalue = $(
                                "#" + $mediaID + "files .selected"
                            ).attr("data-id");
                            var imgurl = $(
                                "#" + $mediaID + "files .selected"
                            ).attr("data-url");
                            var imgalt = $(
                                "#" + $mediaID + "files .selected"
                            ).attr("data-alt");
                            if (imgvalue) {
                                $("#" + $mediaID + "_id").val(imgvalue);
                            }
                            $("#" + $mediaID + "_img").attr("src", imgurl);
                            $("#" + $mediaID + "_img").attr("alt", imgalt);

                            if ($("#" + $mediaID + "_id").val()) {
                                $("#" + $mediaID + "_remove").removeClass(
                                    "d-none"
                                );
                                $("#" + $mediaID + "_img").removeClass(
                                    "custom-width"
                                );
                            } else {
                                $("#" + $mediaID + "_remove").addClass(
                                    "d-none"
                                );
                            }
                        });
                    }
                }
            }
        );

        if ($("#" + $mediaID + "_id").val()) {
            $("#" + $mediaID + "_remove").removeClass("d-none");
            $("#" + $mediaID + "_img").removeClass("custom-width");
        } else {
            $("#" + $mediaID + "_img").addClass("custom-width");
            $("#" + $mediaID + "_remove").addClass("d-none");
        }

        $("#" + $mediaID + "_remove").click(function () {
            $("#" + $mediaID + "_id").val("");

            $("#" + $mediaID + "_img").attr(
                "src",
                "/admin/assets/images/upload.png"
            );
            $("#" + $mediaID + "_img").attr("alt", "upload-media");

            $("#" + $mediaID + "_remove").addClass("d-none");

            $("#" + $mediaID + "_img").addClass("custom-width");
        });
    });

    $("#" + $mediaID + "Model").on("show.bs.modal", function () {
        $.ajax({
            url: "/admin/popupmedia",
            type: "GET",
            success: function (data) {
                $("#" + $mediaID + "files").html(data);

                Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone("form#popupdropzone", {
                    maxFiles: 120,
                    dictInvalidFileType: "This form only accepts images.",
                    dictDefaultMessage: "Drag or click here to upload",
                    maxFilesize: 10000,
                    timeout: 180000,
                });

                myDropzone.on("complete", function (file) {
                    if (
                        this.getUploadingFiles().length === 0 &&
                        this.getQueuedFiles().length === 0
                    ) {
                        toastr.success("Images Upload Successfully!", {
                            fadeAway: 1500,
                        });

                        $("#popup-allmedia  .thumb-image").remove();

                        $.ajax({
                            url: "/admin/listmedia",
                            type: "GET",
                            success: function (data) {
                                $("#popup-allmedia").html(data);
                            },
                            error: function (data) {
                                alert("Some Problems Occured!");
                            },
                        });
                    }
                });
            },
            error: function (data) {
                alert("Some Problems Occured!");
            },
        });
    });

    $("#" + $mediaID + "Model").on("hidden.bs.modal", function () {
        $("#" + $mediaID + "files  #mediamodals").remove();
    });
}

function gallery($mediaID) {
    $(document).ready(function () {
        var gals = [];
        $(document).on(
            "click",
            "#" + $mediaID + "files .thumbnails",
            function (e) {
                var id = $(this).attr("data-id");

                if ($(".image_card" + id).hasClass("card_check selected")) {
                    $(".image_card" + id).removeClass("card_check selected");
                    const index = gals.indexOf($(this).attr("data-id"));
                    gals.splice(index, 1);
                    $("#" + $mediaID + "-image-value").attr("data-value", gals);

                    $("#" + $mediaID + "-image-close").click(function () {
                        var imgvalue = $("#" + $mediaID + "-image-value").attr(
                            "data-value"
                        );

                        $("#" + $mediaID + "_id").val("");

                        if (imgvalue.length != 0) {
                            $("#" + $mediaID + "_id").val(imgvalue);
                            var idValue = imgvalue;
                            $.ajax({
                                url: "/admin/gallerylistmedia/" + idValue,
                                type: "GET",
                                success: function (data) {
                                    $(
                                        "#" + $mediaID + "simg .thumbnails"
                                    ).remove();
                                    $("#" + $mediaID + "simg").html(data);
                                },
                                error: function (data) {
                                    alert("Some Problems Occured!");
                                },
                            });
                        }

                        if ($("#" + $mediaID + "_id").val()) {
                            $("#" + $mediaID + "_remove").removeClass("d-none");
                            $("#" + $mediaID + "_img").removeClass(
                                "custom-width"
                            );
                        } else {
                            $("#" + $mediaID + "_remove").addClass("d-none");
                        }
                        gals = [];
                    });

                    if ($("#" + $mediaID + "_id").val()) {
                        $("#" + $mediaID + "_remove").removeClass("d-none");
                        $("#" + $mediaID + "_img").removeClass("custom-width");
                    } else {
                        $("#" + $mediaID + "_remove").addClass("d-none");
                    }
                } else {
                    $(".image_card" + id).addClass("card_check selected");

                    gals.push($(this).attr("data-id"));

                    $("#" + $mediaID + "-image-value").attr("data-value", gals);

                    $("#" + $mediaID + "-image-close").click(function () {
                        var imgvalue = $("#" + $mediaID + "-image-value").attr(
                            "data-value"
                        );

                        $("#" + $mediaID + "_id").val("");

                        if (imgvalue.length != 0) {
                            $("#" + $mediaID + "_id").val(imgvalue);
                            var idValue = imgvalue;
                            $.ajax({
                                url: "/admin/gallerylistmedia/" + idValue,
                                type: "GET",
                                success: function (data) {
                                    $(
                                        "#" + $mediaID + "simg .thumbnails"
                                    ).remove();
                                    $("#" + $mediaID + "simg").html(data);
                                },
                                error: function (data) {
                                    alert("Some Problems Occured!");
                                },
                            });
                        }

                        if ($("#" + $mediaID + "_id").val()) {
                            $("#" + $mediaID + "_remove").removeClass("d-none");
                            $("#" + $mediaID + "_img").removeClass(
                                "custom-width"
                            );
                        } else {
                            $("#" + $mediaID + "_remove").addClass("d-none");
                        }
                        gals = [];
                    });
                }
            }
        );

        if ($("#" + $mediaID + "_id").val()) {
            $("#" + $mediaID + "_remove").removeClass("d-none");
            $("#" + $mediaID + "_img").removeClass("custom-width");
        } else {
            $("#" + $mediaID + "_img").addClass("custom-width");
            $("#" + $mediaID + "_remove").addClass("d-none");
        }

        $("#" + $mediaID + "_remove").click(function () {
            $("#" + $mediaID + "_id").val("");

            $("#" + $mediaID + "simg .thumbnails").remove();
            $("#" + $mediaID + "simg").html(
                '<div class="col thumbnails media-wrapper d-flex justify-content-center align-items-center"><img id="gallery_img" src="/admin/assets/images/upload.png" class="custom-width" alt="upload-image"></div>'
            );
        });
    });

    $("#" + $mediaID + "Model").on("show.bs.modal", function () {
        $.ajax({
            url: "/admin/popupmedia",
            type: "GET",
            success: function (data) {
                $("#" + $mediaID + "files").html(data);

                Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone("form#popupdropzone", {
                    maxFiles: 120,
                    dictInvalidFileType: "This form only accepts images.",
                    dictDefaultMessage: "Drag or click here to upload",
                    maxFilesize: 10000,
                    timeout: 180000,
                });

                myDropzone.on("complete", function (file) {
                    if (
                        this.getUploadingFiles().length === 0 &&
                        this.getQueuedFiles().length === 0
                    ) {
                        toastr.success("Images Upload Successfully!", {
                            fadeAway: 1500,
                        });

                        $("#popup-allmedia  .thumb-image").remove();

                        $.ajax({
                            url: "/admin/listmedia",
                            type: "GET",
                            success: function (data) {
                                $("#popup-allmedia").html(data);
                            },
                            error: function (data) {
                                alert("Some Problems Occured!");
                            },
                        });
                    }
                });
            },
            error: function (data) {
                alert("Some Problems Occured!");
            },
        });
    });

    $("#" + $mediaID + "Model").on("hidden.bs.modal", function () {
        $("#" + $mediaID + "files  #mediamodals").remove();
    });
}

media("banner");
media("feature");
media("map");
media("icon");
media("home");
media("footer");
media("fimage");
media("home_contact");
media("about_contact");

gallery("gallery");
