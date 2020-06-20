$(document).ready(function () {
    console.log("connected");
    $.get("./../php/invited_friends.php", function( data ) {
        console.log(data);
    });
});