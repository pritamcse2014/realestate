<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <style type="text/css">
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #edf1f2;
            padding: 0 10px;
        }
        .wrapper {
            background: #79b530;
            max-width: 450px;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                        0 32px 64px -48px rgba(0, 0, 0, 0.5)
        }
        .form {
            padding: 25px 30px;
        }
        .form header {
            font-size: 25px;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #e6e6e6;
        }
        .form form {
            margin: 20px 0;
        }
        .form form .field {
            display: flex;
            margin-bottom: 10px;
            flex-direction: column;
            position: relative;
        }
        .form form .field label {
            margin-bottom: 2px;
        }
        .form form .input input {
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .form form .field input {
            outline: none;
        }
        .form form .button input {
            height: 45px;
            border: none;
            color: #fff;
            font-size: 17px;
            background: #e40046;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 13px;
        }
        .form .link {
            text-align: center;
            margin: 10px 0;
            font-size: 17px;
        }
        .form .link a {
            color: #e40046;
        }
        .form .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <section class="form login">
            <header style="color: white;">Reset Password</header>
            <form action="{{ url('setNewPassword/' .$token) }}" method="POST">
                {{ csrf_field() }}
                <div class="field input">
                    <label></label>
                    <input type="password" name="password" id="password" placeholder="Enter Your New Password" required>
                    <span style="color: red;">{{ $errors->first('password') }}</span>
                </div>
                <div class="field input">
                    <label></label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter Your Confirm Password" required>
                    <span style="color: red;">{{ $errors->first('confirm_password') }}</span>
                </div>
                <div class="field button">
                    <input style="margin-top: 23px;" type="submit" value="Reset Password">
                </div>
            </form>
        </section>
    </div>
</body>
</html>