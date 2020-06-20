$(document).ready(function () {

  console.log("ready!");
  $("form").submit(function (e) {
    e.preventDefault();
    $.post("updateBalance.php", $('#myForm').serialize(), function () {
      //   alert( "success" );
    }).done(function () {
      // alert( "second success" );
      // location.href="result.php";
    }).fail(function () {
      // alert( "error" );
      // location.href="result.php";
    }).always(function () {
      // alert( "finished" );
      // location.href="result.php";
    });

  });

});