<?php

class CaptchaValidator {
    public function validate($captcha, $userInput) {
        $status = '';
        if (strcasecmp($captcha, $userInput) != 0) {
            $status = "<p style='color:#FFFFFF; font-size:20px'>
            <span style='background-color:#FF0000;'>Entered captcha code does not match! 
            Kindly try again.</span></p>";
            return [false, $status];
        } else {
            $status = "<p style='color:#FFFFFF; font-size:20px'>
            <span style='background-color:#46ab4a;'>Your captcha code is match.</span>
            </p>";
            return [true, $status];
        }
    }
}

// 使用範例
// $captcha = $_SESSION['captcha'];
// $userInput = $_POST['captcha'];

// $validator = new CaptchaValidator();
// [$isValid, $status] = $validator->validate($captcha, $userInput);

// if ($isValid) {
//     echo "Captcha validation successful. " . $status;
// } else {
//     echo "Captcha validation failed. " . $status;
// }

?>