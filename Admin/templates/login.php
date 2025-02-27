<?php
require_once "models/model.php";
require_once "checkupdates.php";
require_once "updates.php"; 
$model = new Model();
$icon = mysqli_fetch_assoc($model->getDatawadmin());
?>
<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
      <link rel="icon" href="<?php echo $icon['icon'] ?>" type="image/x-icon">
      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/login.css">
      
      <title>Login</title>
   </head>
   <body>
      <!--=============== LOGIN IMAGE ===============-->
      <svg class="login__blob" viewBox="0 0 566 840" xmlns="http://www.w3.org/2000/svg">
         <mask id="mask0" mask-type="alpha">
            <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
         </mask>
      
         <g mask="url(#mask0)">
            <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
      
            <!-- Insert your image (recommended size: 1000 x 1200) -->
            <image class="login__img" href="assets/img/bg-img.jpg"/>
         </g>
      </svg>      

      <!--=============== LOGIN ===============-->
      <div class="login container grid" id="loginAccessRegister">
         <!--===== LOGIN ACCESS =====-->
         <div class="login__access">
            <h1 class="login__title">Đăng nhập</h1>
            
            <div class="login__area">
               <form action="" class="login__form" method="post">
                  <div class="login__content grid">
                     <div class="login__box">
                        <input type="text" id="email" name="use" required placeholder=" " class="login__input">
                        <label for="email" class="login__label">Tên đăng nhập</label>
            
                        <i class="ri-mail-fill login__icon"></i>
                     </div>
         
                     <div class="login__box">
                        <input type="password" id="password" name="pass" required placeholder=" " class="login__input">
                        <label for="password" class="login__label">Mật khẩu</label>
            
                        <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                     </div>
                  </div>
                  <button type="submit" name="clogin" class="login__button">Đăng nhập</button>
               </form>
               <p class="login__switch">
                  Bạn chưa có tài khoản? 
                  <button id="loginButtonRegister">Tạo tài khoản</button>
               </p>
            </div>
         </div>

         <!--===== LOGIN REGISTER =====-->
         <div class="login__register">
            <h1 class="login__title">Để cho đẹp thôi không cho đang ký.</h1>

            <div class="login__area">
               <form action="" method="post" class="login__form">
                  <div class="login__content grid">
                     <div class="login__group grid">
                        <div class="login__box">
                           <input type="text" id="names" name="ten" required placeholder=" " class="login__input">
                           <label for="names" class="login__label">Tên người dùng</label>
      
                           <i class="ri-id-card-fill login__icon"></i>
                        </div>
                     </div>
   
                     <div class="login__box">
                        <input type="text" id="emailCreate" name="use" required placeholder=" " class="login__input">
                        <label for="emailCreate" class="login__label">Tên đăng nhập</label>
   
                        <i class="ri-mail-fill login__icon"></i>
                     </div>
                     
   
                     <div class="login__box">
                        <input type="password" id="passwordCreate" name="pass" required placeholder=" " class="login__input">
                        <label for="passwordCreate" class="login__label">Mật khẩu</label>

   
                        <i class="ri-eye-off-fill login__icon login__password" id="loginPasswordCreate"></i>
                     </div>
                     <div class="login__box">
                        <input type="password" id="repasswordCreate" name="repass" required placeholder=" " class="login__input">
                        <label for="repasswordCreate" class="login__label">Nhập lại mật khẩu</label>

   
                        <i class="ri-eye-off-fill login__icon login__password" id="loginrePasswordCreate"></i>
                     </div>
                  </div>
   
                  <button type="submit" class="login__button">Đăng ký</button>
               </form>
   
               <p class="login__switch">
                  Already have an account? 
                  <button id="loginButtonAccess">Log In</button>
               </p>
            </div>
         </div>
      </div>
      
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js?v=2"></script>
   </body>
</html>