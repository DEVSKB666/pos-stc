function alertMsg(msg, type) {
    $("#alert").removeClass("d-none");
    $("#txt").text(msg);
    $("#alert").addClass("alert-"+type);
    $("#alert").animate({ right: "1px"},"slow");
    setTimeout(() => {
        $("#alert").addClass("d-none");
    }, 2000);
}

function formSubmit(e, link) {
    const form = $(e.target);
    if(!form[0].checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
    }else{
        let url = $(form).attr("action");
        let data = new FormData(form[0]);
        $.ajax({
            url: url,
            type: $(form).attr("method"),
            dataType: "json",
            data: data,
            processData: false,
            contentType: false,
            success:function (data) {
                if(data.status) {
                    alertMsg(data.msg, data.type);
                    setTimeout(() => {
                        if(data.role !== undefined) {
                            window.location.replace(data.role+"/index.php");
                        }else if(link) {
                            window.location.replace(link);
                        }else{
                            window.location.reload();
                        }
                    }, 2000);
                }else{
                    console.log(data);
                }
            },error:function(err) {
                console.log(err);
            }
        })
    }
    form.addClass("was-validated");
}

function showpass() {
    let pass = document.getElementById("password");
    if(pass.type === "password") {
        pass.type = "text";
    }else{
        pass.type = "password";
    }
}

function loader(){
    $("#content").addClass("d-none");
    setTimeout(() => {
        $("#loader").addClass("d-none");
        $("#content").removeClass("d-none");
    }, 400);
}