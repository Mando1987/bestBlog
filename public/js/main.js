function autoSize(textarea) {
    textarea.style.height = "5px";
    textarea.style.height = textarea.scrollHeight + "px";
}

function commentsCreate() {
    if (event.keyCode === 13) {
        document.getElementById("commentsCreateForm").submit();
    }
}

function postCreate() {
    document.getElementById("postsCreateForm").submit();
}

function deleteAction(formAction) {
    document.getElementById("formDeleteAction").action = formAction;
    $("#deleteAction").modal("show");
}

$(".likeButtonClass").on("click", function () {
    var button = this,
        divContent = $(this).parent(),
        form       = this.form,
        formdata   = new FormData(form);
    $.ajax({
        url: form.action,
        type: "POST",
        data: formdata,
        mimeTypes: "multipart/form-data",
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {

            if (data.isLiked == "yes") {
                $(button).removeClass("btn-light").addClass("btn-link");
                $("input[name='isLiked']", form).val(data.isLiked);
                $(button).children("span").text(data.count);
            } else {
                $(button).removeClass("btn-link").addClass("btn-light");
                $("input[name='isLiked']", form).val(data.isLiked);
                $(button).children("span").text(data.count);
            }
        }, error : function(reject){

            var response = $.parseJSON(reject.responseText) ;
            
            $.each (response.errors , function (key , val){

                $('#' + key + '_error').text(val[0]);
            })
        },
    });
});
