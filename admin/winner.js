$(document).ready(function () {

  console.log("ready!");
  $("form").submit(function (e) {
    e.preventDefault();
    $.post("./php/updateBalance.php", $('#myForm').serialize(), function (data) {
      console.log(data);
      // alert( "finished" );
      location.href = "result.php";
    });
  });
});