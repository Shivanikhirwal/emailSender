<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';

function sendPdf($name, $email, $post, $status)
{

    
   
    // Instantiate PHPMailer
    $mail = new PHPMailer(true); // Enable verbose debug output

    try {
        

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        // Set From and To addresses
        $mail->setFrom('kdhar499@gmail.com', 'CodingPoint');
        $mail->addAddress($email);         // Add a recipient

        // Email subject and body
        $mail->Subject = 'Recuirement Information';
        // $mail->Body    = 'Dear ' . $firstname . ',<br><br>Thank you for your payment of Rs. ' . $amount . '. Please find attached your payment receipt and prospectus.<br><br>Transaction ID: ' . $txn_id . ' <br>Bank Name: ' . $bank_name . '<br><br>Best regards,<br>Adduce Institute<br><br>  It IS YOUR ID FOR ADMISSION TIME - ' . $prospectus_id . '.' ;

        if($status == 'Selected'){

            $mail->Body = '
        

            <!DOCTYPE html>
             <html lang="en">
             <head>
                 <meta charset="UTF-8">
                 <meta name="viewport" conntent="width=device-width, initial-scale=1.0">
                 <title>Receipt</title>
                 <style>
                     body {
                         font-family: Arial, sans-serif;
                         background-color: #f2f2f2;
                         padding: 20px;
                     }
                     .receipt {
                         background-color: #fff;
                         border: 1px solid #ddd;
                         padding: 20px;
                         border-radius: 5px;
                         max-width: 600px;
                         margin: 0 auto;
                         box-shadow: 0 0 10px rgba(0,0,0,0.1);
                     }
                     .receipt-header {
                         text-align: center; 
                         margin-bottom: 20px;
                     }
                     .receipt-header h2 {
                         color: #333;
                     }
                     .receipt-details {
                         margin-bottom: 20px;
                     }
                    
                    
                     .thank-you {
                         text-align: center;
                         margin-top: 20px;
                         color: #666;
                     }
                 </style>
             </head>
             <body>
             
             <div class="receipt">
                 <div class="receipt-header">
                     <h2>Selection Regarding Mail</h2>
                 </div>
                 <div class="receipt-details">
            
                       <p>
                       Dear <span>' . $name . '</span>,
            
            We are pleased to inform you that you have been selected for the position of <span>' . $post . '</span>.
            
            Please reply to this email to confirm your acceptance.
            
            Best regards,
            HR Team
                       <p/>
            
                 <div class="thank-you">
                     <p>Thank you for beaing here!</p>
                 </div>
             </div>
             
             </body>
             </html>
                     ';
            

        }else{

            $mail->Body = '
        

            <!DOCTYPE html>
             <html lang="en">
             <head>
                 <meta charset="UTF-8">
                 <meta name="viewport" conntent="width=device-width, initial-scale=1.0">
                 <title>Receipt</title>
                 <style>
                     body {
                         font-family: Arial, sans-serif;
                         background-color: #f2f2f2;
                         padding: 20px;
                     }
                     .receipt {
                         background-color: #fff;
                         border: 1px solid #ddd;
                         padding: 20px;
                         border-radius: 5px;
                         max-width: 600px;
                         margin: 0 auto;
                         box-shadow: 0 0 10px rgba(0,0,0,0.1);
                     }
                     .receipt-header {
                         text-align: center; 
                         margin-bottom: 20px;
                     }
                     .receipt-header h2 {
                         color: #333;
                     }
                     .receipt-details {
                         margin-bottom: 20px;
                     }
                    
                     .thank-you {
                         text-align: center;
                         margin-top: 20px;
                         color: #666;
                     }
                 </style>
             </head>
             <body>
             
             <div class="receipt">
                 <div class="receipt-header">
                     <h2>Selection Regarding Mail</h2>
                 </div>
                 <div class="receipt-details">
            
                       <p>
                    Dear <span>' . $name . '</span>,

            Thank you for applying for the position of <span>' . $post . '</span>.

            We regret to inform you that we have decided to move forward with other candidates.

             Best regards,
                  HR Team
                       <p/>
            
                 <div class="thank-you">
                     <p>Thank you for beaing here!</p>
                 </div>
             </div>
             
             </body>
             </html>
                     ';
            


        }
      

       
       
        // Set email format to HTML
        $mail->isHTML(true);

        // Send email and check for errors 
        if ($mail->send()) {
            return 'success';
           
            // header("Location: index.php");
        } else {
            // echo 'Error sending email: ' . $mail->ErrorInfo;
            return 'Error sending email: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}

// } else {
//     echo 'Missing parameters. Please ensure all necessary parameters are passed.';
// }
