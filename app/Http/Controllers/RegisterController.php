<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\AllIndiaPincode;
use App\Models\city;
use App\Models\MailOtp;
use App\Models\state;
use App\Models\user_addres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Carbon\Carbon;

require("sendsms.php");
class RegisterController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|max:40|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|numeric|digits:10|unique:users,phone_number',
            'password' => 'required|digits:4',
        ], [
            'full_name.required' => 'Name is required.',
            'full_name.max' => 'Name should not exceed 40 characters.',
            'full_name.regex' => 'Name should only contain letters and spaces.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email already exists.',
            'phone_number.required' => 'Phone number is required.',
            'phone_number.numeric' => 'Phone number must be numeric.',
            'phone_number.digits' => 'Phone number must be 10 digits.',
            'phone_number.unique' => 'Phone number already exists.',
            'password.required' => 'Password is required.',
            'password.digits' => 'Password must be 4 digits.',
        ]);
        try {
            $currentYear = date("y");
            $lastUserId = User::max('id');
            $newUserId = sprintf('HS-%s-%05d', $currentYear, $lastUserId + 1);
            $full_name = $request->full_name;
            $email = $request->email;
            $password = $request->password;
            $phone_number = $request->phone_number;

            $mobileNumberCheck = DB::table('users')->where('phone_number', $phone_number)->count();

            if ($mobileNumberCheck > 0) {
                throw new \Exception('Phone number already exists.');
            }

            $emailCheck = DB::table('users')->where('email', $email)->count();

            if ($emailCheck > 0) {

                // return response()->json(['error' => 'Email already exists.'], 422);

            return back()->with('error1', 'Email already exists...!');
            }
            // Save data to users table
            $users = new User;
            $users->user_id = $newUserId;
            $users->name = $full_name;
            $users->first_name = $full_name;
            $users->email = $email;
            $users->password = $password;
            $users->phone_number = $phone_number;
            $users->is_guest_user = 0;

            // Save the user record
            if (!$users->save()) {
                throw new \Exception('Failed to save user record.');
            }

$code = rand(1000, 10000);
$url = 'http://sms.saitechnosolutions.net/sendsms/?token=87c13d427e12b47a9f6535878483d96a&credit=$credit&sender=$sender&message=$message&number=' . $phone_number;
$token = '65ab66d7e425fb1c47b11765760709ae';
$credit = '2';
$sender = 'STSCBE';
$message = "OTP for your Sai Techno Solutions Login Verification is $code. Do Not Share this with anyone. - Sai Techno Solutions";
$number = $phone_number; // Use $phone_number instead of $mobileNumber

// Create an instance of SendSms class (assuming it's defined and accessible)
$sendsms = new SendSms($url, $token);

// Send the SMS
$messageId = $sendsms->sendmessage($credit, $sender, $message, $number);

// Additional actions if necessary
$sendsms->checkdlr($messageId);
$sendsms->availablecredit($credit);




            $userId = $users->user_id;


            return redirect('/loginn')->with('success1', 'Register data updated successfully..!');


        } catch (\Exception $e) {

            if (strpos($e->getMessage(), 'Phone number already exists') !== false) {

                return back()->with('error1', 'This phone number has already been registered...!');

            }

            return back()->with('error1', 'Failed to update register data...!');

        }
    }



    public function city($id)
    {
        $city = DB::table('cities')
        ->select('id', 'name')
        ->where('state_id', $id)
        ->orderBy('name', 'asc')
        ->get();

    return response()->json($city);
    }



    public function login(Request $request)
    {

        $phno = $request->input('login_mblnum');
        $password = $request->input('login_passwrd');

        $credentials = [
            'phone_number' => $request['login_mblnum'],
            'password' => $request['login_passwrd'],
        ];

        if (Auth::attempt($credentials)) {
            $user = User::where('phone_number', $phno)->first();
            Auth::login($user);
            return redirect('/')->with('success', 'Logged In Successfully..!');
            // return back()->with('error', 'Logged In Successfully..!');

        } else {
            $user = User::where('phone_number', $phno)->first();

            // Check if the user exists
            if (!$user) {

                 return back()->with('error', 'Entered Mobile No. is Wrong..!');
            }

            // Check if the password is incorrect
            if ($user && !Hash::check($password, $user->password)) {

                 return back()->with('error', 'Entered Password is Wrong..!');
            }

            return response()->json(['error' => 'Invalid Credentials..!']);
        }
    }



    public function getAddressDetails(Request $request)
    {
        $pincode = $request->get('pincode');

        // Make a request to the external API using the pincode
        $databaseData = AllIndiaPincode::where('pincode', $pincode)->get();

        $cities = [];

        if ($databaseData->isNotEmpty()) {
            foreach ($databaseData as $pincodeRow) {
                $city = $pincodeRow->officename;
                $district = $pincodeRow->Districtname;
                $state = $pincodeRow->statename;

                // Add city and state details to the array
                $cities[] = "City: $city, District: $district, State: $state";
            }

            // Return the response after processing all items in the collection
            return response()->json($cities);
        }

        // If $databaseData is empty, you may want to handle this case accordingly
        // For example, return an empty array or a specific message
        return response()->json([]);
    }


//     public function sendOtpFunction(Request $request)
// {
//     // Validate input
//     $request->validate([
//         'mobile' => 'required|numeric|digits_between:10,15',
//     ]);

//     $mobileNumber = $request->input('mobile');

//     // Check if the user already exists
//     $existingUser = DB::table("users")->where("email", $mobileNumber)->first();

//     // Generate OTP
//     $code = rand(1000, 10000);

//     // Sending SMS
//     $code = rand(1000, 10000);
//         // Sending SMS
//         $url = 'http://sms.saitechnosolutions.net/sendsms/?token=65ab66d7e425fb1c47b11765760709ae&credit=$credit&sender=$sender&message=$message&number=' . $mobileNumber;
//         // $url = 'http://sms.saitechnosolutions.net/sendsms/?token=87c13d427e12b47a9f6535878483d96a&credit=$credit&sender=$sender&message=$message&number=' . $mobileNumber;
//         $token = '65ab66d7e425fb1c47b11765760709ae';
//         $credit = '2';
//         // $sender = 'STSCBE';
//         $sender = 'HOMGRO';
//         // $message = "OTP for your Sai Techno Solutions Login Verification is $code. Do Not Share this with anyone. - Sai Techno Solutions";
//         $message = "The OTP for the verification of your Home Grow Login is $code. Do not share this with anyone. - Team Home Grow";
//         $number = $mobileNumber;

//     $sendsms = new SendSms($url, $token);
//     $messageId = $sendsms->sendmessage($credit, $sender, $message, $number);
//     $sendsms->checkdlr($messageId);
//     $sendsms->availablecredit($credit);

//     // Insert OTP into the database
//     DB::table('otps')->insert([
//         'phone_number' => $number,
//         'otp' => $code,
//         'validity_time' => now()->addMinutes(2)
//     ]);

//     // Check if the user exists, and if not, register the user
//     if (!$existingUser) {
//         $currentyear = date("y");
//         $lastUserId = DB::table('users')->max('id');
//         $newUserId = sprintf('HS-%s-%05d', $currentyear, $lastUserId + 1);

//         // Insert the new user
//         DB::table("users")->insert([
//             "phone_number" => $number,
//             "from_app" => 0,
//             "user_id" => $newUserId
//         ]);
//     }

//     return response("Otp Sent Successfully to $mobileNumber");
// }


    public function checkOtp(Request $request)
{
    $enteredOtp = $request->input('otp');
    $mobile = $request->input('mobile');

    // Get entered OTP from the request
    $expectedOtp = Otp::where('otp', $enteredOtp)->first();

    if ($expectedOtp !== null) {
        // OTP is correct

        // Check if the user already exists
        $user = User::where('phone_number', $mobile)->first();

        if (!$user) {
            // User with this phone number does not exist, create a new user
            $user = new User();
            $user->phone_number = $mobile;
            // Add other fields as needed
            $user->save();

            // Generate a user ID if not already present
            if (!$user->id) {
                $currentYear = date("y");
                $lastUserId = User::max('id');
                $newUserId = sprintf('HS-%s-%05d', $currentYear, $lastUserId + 1);
                $user->user_id = $newUserId; // Use the generated user ID
                $user->save();
            }

            // Log in the user
            Auth::login($user);

            return response()->json(['success' => true, 'user_id' => $user->user_id]);
        } else {
            // User already exists, log them in
            Auth::login($user);

            return response()->json(['success' => true, 'user_id' => $user->user_id]);
        }
    } else {
        // OTP is incorrect
        return response()->json(['error' => 'Incorrect OTP. Please try again.'], 400);
    }
}


public function forgotsendOtpfunction33(Request $request)
  {
    $email = $request->input('email');
    $existingUser = DB::table("users")->where("email", $email)->first();
    if ($existingUser) {
        // Generate OTP
        $code = rand(1000, 10000);
        try {
            $mail = new PHPMailer(true);

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'muruganannadurai0104@gmail.com';
            $mail->Password = 'tfgyfufbktivcmla';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set sender and recipient
            $mail->setFrom('muruganannadurai0104@gmail.com', 'Your Name');
            $mail->addAddress($email);

            // Set email content format to HTML
            $mail->isHTML(true);

            // Set email subject and body
            $mail->Subject = 'Customer Details';
            $mail->Body = "<html>
                <head>
                    <title>HEALSYNS</title>
                    <style>
                        table, td, th {
                            border: 1px solid black;
                            text-align: center;
                            padding: 5px;
                        }
                        th {
                            background-color: beige;
                        }
                        td:hover {
                            background-color: #E7E8EA;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                    </style>
                </head>
                <body>
                    <h2>Hello Sir / Madam</h2>

                    <h4 style='padding: 5px;'>HEALSYNS:</h4>
                    <table>
                        <tr>
                            <th><h4>OTP</h4></th>
                        </tr>
                        <tr>
                            <td>" . $code . "</td>
                        </tr>
                    </table>
                </body>
                </html>";

            // Send the email
            $mail->send();

            // Save OTP details in the database
            DB::table('mail_otps')->insert([
                'email' => $email,
                'otp' => $code,
                'validity_time' => now()->addMinutes(2)
            ]);

            return back()->with("success", "Email has been sent.");

        }
        catch (Exception $e)
        {
            return back()->with('error', 'Message could not be sent');
        }

    }
    else {
        return response("Email not found: $email. Cannot send OTP.", 400);
    }
  }


// public function forgotcheckOtpfunction33(Request $request)
//     {
//         $enteredOtp = $request->input('otp');
//         $email = $request->input('email');

//         // Get entered OTP from the request

//         $expectedOtp = MailOtp::where('otp', $enteredOtp)->first();


//         if ($expectedOtp !== null) {

//             $user = User::where('email', $email)->first();

//             if (!$user) {
//                 $user = new User();
//                 $user->email = $email;
//                 // Add other fields as needed
//                 $user->save();

//                 // Generate a user ID if not already present
//                 if (!$user->id) {
//                     $currentYear = date("y");
//                     $lastUserId = User::max('id');
//                     $newUserId = sprintf('HS-%s-%05d', $currentYear, $lastUserId + 1);
//                     $user->user_id = $newUserId; // Use the generated user ID
//                     $user->save();
//                 }

//                 return response()->json(['success' => true, 'user_id' => $user->user_id]);
//             } else {

//                 return response()->json(['success' => true, 'user_id' => $user->user_id]);
//             }
//         } else {
//             // OTP is incorrect
//             return response()->json(['error' => 'Incorrect OTP. Please try again.'], 400);

//         }
//     }
public function forgotcheckOtpfunction33(Request $request)
{
    $enteredOtp = $request->input('otp');
    $email = $request->input('email');

    // Get entered OTP from the request
    $expectedOtp = MailOtp::where('otp', $enteredOtp)->first();

    if ($expectedOtp !== null) {
        $currentTime = now();
        $validityTime = Carbon::parse($expectedOtp->validity_time);

        // Check if OTP is still valid (within 2 minutes)
        if ($currentTime->diffInMinutes($validityTime) <= 1) {
            $user = User::where('email', $email)->first();

            if (!$user) {
                $user = new User();
                $user->email = $email;
                // Add other fields as needed
                $user->save();

                // Generate a user ID if not already present
                if (!$user->id) {
                    $currentYear = date("y");
                    $lastUserId = User::max('id');
                    $newUserId = sprintf('HS-%s-%05d', $currentYear, $lastUserId + 1);
                    $user->user_id = $newUserId; // Use the generated user ID
                    $user->save();
                }

                return response()->json(['success' => true, 'user_id' => $user->user_id]);
            } else {
                return response()->json(['success' => true, 'user_id' => $user->user_id]);
            }
        } else {
            // OTP has expired
            return response()->json(['error' => 'expired', 'message' => 'OTP has expired. Please request a new one.']);
        }
    } else {
        // Incorrect OTP
        return response()->json(['error' => 'incorrect', 'message' => 'Incorrect OTP. Please try again.']);
    }
}

public function savepassword33(Request $request)
{

        $frgot_enter_paswrd = $request->input('frgot_enter_paswrd');
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        $user->password = $frgot_enter_paswrd;
        if ($user->save()) {
            return response()->json(['success' => 'User updated successfully']);
        } else {
            return response()->json(['error' => 'Error updating user'], 500);
        }
}


public function logout()
{
    Auth::logout();
    return redirect('/');
}


}





