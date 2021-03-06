<?php

    require_once('include/functions/main.php');
    $title = "Activation";
    require('include/layout/header.php');
    logged_in_redirect();

    if (isset($_GET['success'])) { ?>

        <<div style="margin-bottom:50px" class="container text-center">

            <div id="activate-success-page-row" class="row">
                <h2>Congratulations. Your account has been successfully activated.</h2>
                <h5>You are advised to keep your login details private for security reasons. Data provided by our clients are 100% secure with us. <br>You can now log in to update your profile in order to keep your chances high.</h5>
                <a id="activate-success-page-a" href="index.php">continue to login page</a>
            </div>

        </div>


    <?php
    }
    else {

        if (isset($_GET['email']) && isset($_GET['email_code'])) {
            $email = trim($_GET['email']);
            $email_code = trim($_GET['email_code']);

      if (emailExist($email) === false) {
          echo $activate_email_error = "Ooops something went wrong. and we couldn't find that email account";
      }
      elseif (activateAccount($email,$email_code) === false) {
          echo $activate_email_error = "We had problems activating your account";
      }
      else {
          redirect('activate.php?success');
      }
    }
    }

    require('include/layout/page-header-footer.php');
    require('include/layout/footer.php');
?>
