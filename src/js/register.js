$(document).ready(function () {

    $("form").submit(function (e) {
        e.preventDefault();
        var pass1 = $('input[name ="pass"]').val();
        var pass2 = $('input[name ="cpass"]').val();
        if (pass1 != pass2) {
            alert("password does not match");
            console.log(pass1);
            console.log(pass2);
        } else {
            $.post("./php/sendOTP.php", $("form").serialize(),
                function (data) {
                    console.log(data);
                    data = JSON.parse(data);
                    if(data.status==0) {
                        alert(data.message);
                    } else if(data.status==1) {
                        location.href = 'verifyOTP.php';
                    } else {
                        location.href = 'verifyOTP.php';
                    }
                }
            );
        }
    });
});