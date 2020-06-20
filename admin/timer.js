var minute = 0;
var second = 0;
function timer() {
    setInterval(() => {
        if (second%10==0) {
            $.get("getLatestTime.php", function( data ) {
            //   alert( "Data Loaded: " + data );
            var d = new Date(data);
            var c = new Date();
            console.log("ddd" + d);
            console.log("ccc" + c);
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

            });
        }
        second--;
        if (second <= 0) {
            second = 60;
            minute--;
            if (minute < 0) {
                minute = 3;
                second = 0;
                // window.location.href = "http://example.com/new_url";
            }
        }
        if (minute == 0 && second <= 3) {
            // if (!isUpdated) {
                // $('.jClass').each(function () {
                //     $(this).attr("disabled", "true");
                // });
            // }
        } else {
            $('.jClass').each(function () {
                $(this).removeAttr("disabled", "true");
            });
        }
        document.querySelector(".timer").textContent = minute + " : " + second;

    }, 1000);
}
$(document).ready(function () {

    $.get("getLatestTime.php", function( data ) {
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

    });

    timer();
});

function setCookieFast() {
    setInterval(() => {
        setCookie('minutes', minute, 10);
        setCookie('seconds', second, 10);
    }, 100);
}

