<br>
<label>Enter Captcha:</label>
<input type="text" name="captcha" />
<p><br />
<img src="/captcha/captchaImage?rand=<?php echo rand(); ?>" id='captcha_image'>
</p>
<p>Can't read the image?
<a href='javascript: refreshCaptcha();'>click here</a>
to refresh</p>

<script>
//Refresh Captcha
function refreshCaptcha(){
    var img = document.images['captcha_image'];
    img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random()*1000;
}
</script>