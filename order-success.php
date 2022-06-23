  <?php include 'header.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/SMTP.php';


  ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--spaceship-ledge-height"></div>
            <div class="block order-success">
                <div class="container">
                    <div class="order-success__body">
                        <div class="order-success__header">
                            <div class="order-success__icon">
                                <svg width="100" height="100">
                                    <path d="M50,100C22.4,100,0,77.6,0,50S22.4,0,50,0s50,22.4,50,50S77.6,100,50,100z M50,2C23.5,2,2,23.5,2,50
        s21.5,48,48,48s48-21.5,48-48S76.5,2,50,2z M44.2,71L22.3,49.1l1.4-1.4l21.2,21.2l34.4-34.4l1.4,1.4L45.6,71
        C45.2,71.4,44.6,71.4,44.2,71z" />
                                </svg>
                            </div>
                            <h1 class="order-success__title">Thank you</h1>
                            <div class="order-success__subtitle">Your order has been received</div>
                            <div class="order-success__actions">
                                <a href="index" class="btn btn-sm btn-secondary">Go To Homepage</a>
                            </div>
                        </div>
                        <?php 
              if (isset($_GET['success'])) {
         $id = $_SESSION['id'];
                       
        $sele = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
        if (mysqli_num_rows($sele)>0) {
           
                  $resu = mysqli_fetch_assoc($sele);
            $total_quantity = $resu['total_quantity'];
            $sub_total = $resu['sub_total'];
            $total = $resu['total'];
            $quantity = $resu['quantity'];
            $product_id = $resu['product_id'];
            $status = 'pending';
             $reference = "1234567890";
            $sub=str_shuffle($reference);
            $sub = '#'.substr($sub, 5); 
            $tracking_code= $sub;
            $time = date('h:mi');
            $date = date('D:M:Y');
           
              $insert = mysqli_query(connection(),"INSERT INTO ordered(product_id,user_id,total,sub_total,quantity,total_quantity,status,tm,dy,tracking_code) VALUES('$product_id','$id','$total','$sub_total','$quantity','$total_quantity','$status','$time','$date','$tracking_code')");
              if ($insert) {
                  $delete = mysqli_query(connection(),"DELETE FROM added_items WHERE user_id = '$id'");
                  if ($delete) {
                $mail = new PHPMailer(true);
              
                try {
                //Server settings
                $mail->SMTPDebug = false;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'mwtech56@gmail.com';                     // SMTP username
                $mail->Password   = 'fearlesswitness';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom($email, $name);
                $mail->addAddress($email);     // Add a recipient

                $body = "<div style='background: cornflowerblue; height: 400px; width: 40%; padding: 4%'>
                <div style='background: white; height: 500px; width: 100%; text-align: center;'>
                <p style='border: 1px solid lightgray; border-radius: 50%; padding: 2%;   color: seagreen;'>
                <strong> ".ucwords($name)." from <br>E-Shopper.com</strong><br>
                main message: ".$message."
                </p>
                </div>
                </div>";

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);

                $mail->send();
                $msg = "<div class='status alert alert-success'>Message has been sent</div>";
                } catch (Exception $e) {
                $msg = "<div class='status alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
                }
                }
              }
          }
          }

                $sele = mysqli_query(connection(),"SELECT * FROM ordered WHERE user_id='$id'");
                  $result = mysqli_fetch_assoc($sele);
                          ?>
                        <div class="card order-success__meta">
                            <ul class="order-success__meta-list">
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Order number:</span>
                                    <span class="order-success__meta-value"><?php echo $result['tracking_code']; ?></span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Created At:</span>
                                    <span class="order-success__meta-value"><?php echo $result['dy']; ?></span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Total:</span>
                                    <span class="order-success__meta-value">NGN <?php echo number_format($result['sub_total']+9500); ?></span>
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title">Payment Method:</span>
                                    <span class="order-success__meta-value">payStack</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
        <?php include 'footer.php'; ?>