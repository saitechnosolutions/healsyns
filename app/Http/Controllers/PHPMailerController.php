<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller
{
    public function contactmail(Request $request)
    {
        require base_path("vendor/autoload.php");

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $messge = $request->input('message');

        $mail = new PHPMailer(true);

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'muruganannadurai0104@gmail.com';   //  sender username
            $mail->Password = 'tfgyfufbktivcmla';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom($request['email'], $request['name']);
            $mail->addAddress('gowsalya.sts@gmail.com');
            // $mail->addReplyTo($request['email'], $request['name']);

            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'Customer Details';
            $mail->Body    = "<html>
            <head>
            <title>Customers detail</title>
            <style>
            table, td, th {
                border: 1px solid black;
                text-align:center;
                padding:5px;
              }
              th{
                background-color:beige;
            }
            td:hover{
                background-color:#E7E8EA;
            }
              table{
                width: 100%;
               border-collapse: collapse;
              }
            </style>
            </head>
            <body>
            <h2>Hello Sir / Madam</h2>
            <p style='font-size:16px;'>Kindly find below the  Enquiry from
            </p>
            <h4 style='background-color:#e0e0eb;padding: 5px;'>Healsyns:</h4>
            <table>
            <tr>
            <th ><h4>Name</h4></th>
            <th ><h4>Email</h4></th>
            <th ><h4>Phone Number</h4></th>
            <th ><h4>Message</h4></th>
            </tr>
            <tr>
            <td >" . $name . "</td>
            <td >" . $email . "</td>
            <td >" . $phone . "</td>
            <td >" . $messge . "</td>
            </tr>
            </table>


            </body>
            </html>";

            if (!$mail->send()) {
                echo "<script>alert('Email could not be sent.');</script>";
            } else {
                echo "<script>alert('Email sent successfully.');</script>";
                return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent');
        }
    }
}
