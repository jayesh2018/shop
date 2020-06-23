$(document).ready(function () {

    $("form").submit(function (e) {
        e.preventDefault();
        $.post("./php/addUser.php", $("form").serialize(),
            function (data) {
                console.log(data);
                data = JSON.parse(data);
                if (data.status == 0) {
                    alert(data.message);
                } else if (data.status == 1) {
                    console.log("cool");
                    location.href = 'login.php';
                } else {
                    console.log("else");
                }
            }
        );
    });

});