<?php
/** Author: Uti Mac
* Email: utiegbai@gmail.com
*/

header("Access-Control-Allow-Origin: *");
require_once('../core/init.php');


require '../Mailer/src/Exception.php';
require '../Mailer/src/PHPMailer.php';
require '../Mailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action'])) {
            try {
                $username = $_GET['recipient_username'];
                $mail_subject = $_GET['subject'];
                $get_msg_body = $_GET['message_body'];
                $user_email = $_GET['recipient_email'];
                $mail_body = '
                <table border="0" cellpadding="0" cellspacing="0" class="body">
                    <tr>
                        <td>&nbsp;</td>
                        <td class="container">
                            <div class="content">

                            <!-- START CENTERED WHITE CONTAINER -->
                            <span class="preheader">Company Name</span>
                            <table class="main">

                              <!-- START MAIN CONTENT AREA -->
                              <tr>
                                <td class="wrapper">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <p>Hi '.$username.',</p>
                                            <p>'.$get_msg_body.'</p>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- END MAIN CONTENT AREA -->
                            </table>
                             <!-- START FOOTER -->
                            <div class="footer">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td class="content-block">
                                    <span class="apple-link">&copy; Company Name '.date('Y').'</span>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="content-block powered-by">
                                    Powered by <a href="https://www.example.com">Company Name</a>.
                                  </td>
                                </tr>
                              </table>
                            </div>
                            <!-- END FOOTER -->

                            <!-- END CENTERED WHITE CONTAINER -->
                            </div>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';

                $mail_body = Utility::mail_template($mail_body);

                Utility::send_mail($mail_subject, $mail_body, $user_email);

                echo json_encode(['success' => 1]);
                http_response_code(200);
            } catch (Exception $e) {
                echo json_encode(['success' => 0]);
                http_response_code(200);
            }
        }
} else {
    http_response_code(405);
}
?>