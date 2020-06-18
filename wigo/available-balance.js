function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
var minute = 0;
var second = 0;
function timer() {
    setInterval(() => {
        if (second%5==0) {
            $.get("getLatestTime.php", function( data ) {
            //   alert( "Data Loaded: " + data );
            var d = new Date(data);
            var c = new Date();
            console.log(d);
            console.log(c);
            if (d < c) {
                d.setDate(d.getDate() + 1);
            }
            var diff = d - c;
            var msec = diff;
            var hh = Math.floor(msec / 1000 / 60 / 60);
            msec -= hh * 1000 * 60 * 60;
            minute = Math.floor(msec / 1000 / 60);
            msec -= minute * 1000 * 60;
            second = Math.floor(msec / 1000);
            msec -= second * 1000;
                console.log("start");
                console.log("db " +d);
                console.log("current " +c);
                console.log(second);
            });
        }
        second--;
        if (second <= 0) {
            second = 60;
            minute--;
            if (minute < 0) {
                minute = 3;
                second = 0;
                location.reload(true);
            }
        }
        if (minute == 0 && second <= 30) {
            // if (!isUpdated) {
                $('.jClass').each(function () {
                    $(this).attr("disabled", "true");
                });
                // $.get("update_wigo.php", function (data) {
                //     data = JSON.parse(data);
                //     console.log('data');
                //     $('#color').html(data.color);
                //     $('#digit').html(data.digit);
                //     $('#balance').html(data.money);
                // });
                // isUpdated = true;
            // }
        } else {
            $('.jClass').each(function () {
                $(this).removeAttr("disabled", "true");
            });
        }

        document.querySelector(".timer").textContent = minute + " : " + second;
        // setCookie('minutes', minute, 10);
        // setCookie('seconds', second, 10);
    }, 1000);
}
$(document).ready(function () {

    $.get("getLatestTime.php", function( data ) {
    //   alert( "Data Loaded: " + data );
        var d = new Date(data);
        var c = new Date();
        console.log(d);
        console.log(c);
        if (d < c) {
            d.setDate(d.getDate() + 1);
        }
        var diff = d - c;
        var msec = diff;
        var hh = Math.floor(msec / 1000 / 60 / 60);
        msec -= hh * 1000 * 60 * 60;
        minute = Math.floor(msec / 1000 / 60);
        msec -= minute * 1000 * 60;
        second = Math.floor(msec / 1000);
        msec -= second * 1000;

        // setCookie('minutes', minute, 10);
        // setCookie('seconds', second, 10);
    });

    // if (getCookie('minutes') != '' && getCookie('seconds') != '') {
    //     minute = getCookie('minutes');
    //     second = getCookie('seconds');
    //     if (minute == 0 && second <= 30) {
    //         $('.jClass').each(function () {
    //             $(this).attr("disabled", "true");
    //         });
    //     }
    // }
    timer();
});

function setCookieFast() {
    setInterval(() => {
        setCookie('minutes', minute, 10);
        setCookie('seconds', second, 10);
    }, 100);
}

// setCookieFast();
var toggleUp = (color) => {
    $(".slide-up").hide();
    $(".slide-up").removeClass("invisible");
    $(".fade-body").addClass("dark");
    if (color.length === 1) {
        $("#slide-up-heading").text("Join " + color).css("background-color", "rgb(47, 177, 209)");
    } else {
        $("#slide-up-heading").text("Join " + color).css("background-color", color);
    }
    $(".slide-up").slideDown("fast");

};

$(".close-btn").on("click", () => {
    $(".slide-up").fadeOut();
    $(".fade-body").removeClass("dark");
});

$("#three").on("click", () => {
    $("#req-value").text("3");
});
$("#five").on("click", () => {
    $("#req-value").text("5");
});
$("#ten").on("click", () => {
    $("#req-value").text("10");
});
$("#minus").on("click", () => {
    const value = $("#req-value").text();
    if (value !== "0") {
        $("#req-value").text(parseInt(value) - 1);
    }
});
$("#plus").on("click", () => {
    const value = $("#req-value").text();

    $("#req-value").text(parseInt(value) + 1);

});


