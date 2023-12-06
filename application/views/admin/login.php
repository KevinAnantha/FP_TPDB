<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

body{
    background-color: #B3BEB9;
}
.form-container{
    font-family: 'Mukta', sans-serif;
    padding: 0 20px 20px 0;
}
.form-container .form-horizontal{
    background: repeating-linear-gradient(45deg,#fff,#fff 10px,#f9f9f9 10px,#f9f9f9 20px);
    padding: 70px 40px 40px;
    border-radius: 0;
    border: 2px solid rgba(0,0,0,0.1);
    box-shadow: 20px 20px 0 rgba(0,0,0,0.1);
    position: relative;
}
.form-horizontal .title{
    color: #222;
    font-size: 80px;
    font-weight: 700;
    margin: 0 0 8px 0;
}
.form-horizontal .description{
    color: #222;
    font-size: 18px;
    font-weight: 600;
    margin: 0 0 30px 0;
    display: block;
}
.form-horizontal .form-group{ margin: 0 0 30px; }
.form-horizontal .form-group:nth-child(3){ margin-bottom: 20px; }
.form-horizontal .form-control{
    color: #446DCA;
    font-size: 16px;
    letter-spacing: 1px;
    height: 40px;
    padding: 2px 15px;
    border: 1px solid #e7e7e7;
    border-top-width: 2px;
    border-left-width: 2px;
    box-shadow: none;
    border-radius: 0;
    transition: all 0.3s ease 0s;
}
.form-horizontal .form-control:focus{
    box-shadow: none;
    border-color: #446DCA;
}
.form-horizontal .form-control::placeholder{
    color: #222;
    font-size: 15px;
}
.form-horizontal .btn{
    color: #fff;
    background-color: #446DCA;
    font-size: 18px;
    font-weight: 600;
    text-align: left;
    width: 180px;
    padding: 10px 30px;
    margin: 0 25px 0 0;
    border-radius: 30px;
    border: none;
    display: inline-block;
    overflow: hidden;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.form-horizontal .btn:hover,
.form-horizontal .btn:focus{
    color: #fff;
    background-color: #222;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    outline: none;
}
.form-horizontal .btn:after{
    content: '';
    height: 70%;
    width: 110%;
    border-top: 5px solid #fff;
    border-bottom: 5px solid #fff;
    transform: rotate(-50deg);
    position: absolute;
    right: -105px;
    top: -65px;
    transition: all 0.5s ease 0s;
}
.form-horizontal .btn:hover:after{
    right: -70px;
    top: -30px;
}
.form-horizontal .signup{
    color: #222;
    font-size: 18px;
    font-weight: 600;
    margin: 0 0 35px 0;
    vertical-align: text-top;
    display: inline-block;
}
.form-horizontal .signup a{
    color: #446DCA;
    text-decoration: underline;
    margin: 0 0 0 25px;
}
.form-horizontal .signup a:hover{
    color: #000;
    transition: all 0.3s ease 0s;
}
.form-horizontal .forgot{
    color: #446DCA;
    text-decoration: underline;
    display: block;
}
.form-horizontal .forgot a{
    color: #446DCA;
    transition: all 0.3s ease 0s;
}
.form-horizontal .forgot a:hover{ color: #222; }
@media only screen and (max-width:479px){
    .form-container .form-horizontal{
        padding-left: 20px;
        padding-right: 20px;
    }
    .form-horizontal .title{ font-size: 55px; }
    .form-horizontal .description{ font-size: 16px; }
    .form-horizontal .form-control::placeholder{ font-size: 14px; }
    .form-horizontal .btn{
        display: block;
        margin: 0 auto 20px;
    }
    .form-horizontal .signup{
        text-align: center;
        margin: 0 auto 20px;
        display: block;
    }
    body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            font-family: 'Mukta', sans-serif;
            padding: 0 20px 20px 0;
            position: relative;
            max-width: 400px; /* Sesuaikan lebar form jika diinginkan */
            width: 100%;
        }

        .form-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    .form-horizontal .forgot{ text-align: center; }
}

    </style>
</head>
<body>
<br>
<br>
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 mx-auto">
                <div class="form-container">
                    <form class="form-horizontal" action="<?php echo base_url()?>admin/aksi_login_admin" method="POST">
                        <h3 class="title">Hi there.</h3>
                        <span class="description">Welcome to admin panel</span>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter your Username" id="username_admin" name="username_admin">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Enter your Password" id="password_admin" name="password_admin">
                        </div>
                        <button class="btn signin">Login</button>
                        <span class="signup">or <a href="#">Sign up</a></span>
                        <span class="forgot"><a href="">Forgot Password?</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>