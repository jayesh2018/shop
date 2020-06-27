var minute = 0;
var second = 0;
function timer() {
    setInterval(() => {
        if (second % 10 == 0) {
            $.get("getLatestTime.php", function (data) {
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
                location.reload();
            }
        }
        if (minute == 0 && second <= 30) {
            $('.jClass').each(function () {
                $(this).attr("disabled", "true");
            });
        } else {
            $('.jClass').each(function () {
                $(this).removeAttr("disabled", "true");
            });
        }
        document.querySelector(".timer").textContent = ("0" + minute).slice(-2) + " : " + ("0" + second).slice(-2);

    }, 1000);
}
$(document).ready(function () {

    $.get("getLatestTime.php", function (data) {
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

