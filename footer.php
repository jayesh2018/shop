
<script src="sweetaleart2.min.js"></script>
<?php
  if (isset($_GET['message'])) {
    $message = $_GET['message'];
    if (!($message == "")) {

  ?>
      <script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: '<?php echo $message ?>'
        })
      </script>
  <?php
    }
  }
  ?>
<?php
  if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if (!($error == "")) {

  ?>
      <script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'error',
          title: '<?php echo $error ?>'
        })
      </script>
  <?php
    }
  }
  ?>
</body>
</html>