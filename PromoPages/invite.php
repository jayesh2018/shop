<?php
session_start();
require('./../connection.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT referral_code code FROM referral_codes WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_array($result);
    $code = "http://" . $_SERVER['SERVER_NAME'] . "/Register.php?code=" . $result['code'];
} else {
    $code =  " Failed !";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Friends</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/18dd5346aa.js" crossorigin="anonymous"></script>

    <style>
        html {
            height: 100%;
        }

        body {
            height: 100%;
            background-image: -webkit-linear-gradient(65deg, rgb(6, 71, 68), rgb(7, 145, 155));
            color: white;
            text-align: center;
        }

        .qr-container {
            width: 300px;
            height: 300px;
            background-color: white;
            border-radius: 50%;
        }

        .qr-container img {
            width: 200px;
            height: 200px;
        }

        .row {
            margin: 0;
        }

        .code-container {
            padding: 10px 0;
        }

        .code-container span {
            padding: 10px 50px;
            font-size: x-large;
            border-radius: 50px;
            background-color: white;
            color: black;
        }
    </style>

</head>

<body>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1 class="py-3">Invite Friends</h1>
            <div class="d-flex justify-content-center">
                <div class="mt-3 qr-container d-flex justify-content-center align-items-center">
                    <img src="images/demoQr.png" alt="">
                </div>
            </div>
            <div class="mt-3 code-container">
                <h4 class="mb-5">Scan QR code above or use Invite Code below</h4>
                <input id="copyTarget" type="text" value=<?php echo $code ?> >
            </div>
            <div class="mt-3 code-container">
                <button id="copyButton">Click To Copy</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script>
        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch (e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }

            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
        $(document).ready(function() {
            $("#copyButton").click(function() {
                copyToClipboard(document.getElementById("copyTarget"));
            });
        });
    </script>
</body>

</html>