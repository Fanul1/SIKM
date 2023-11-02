<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SIKM - Login</title>
    <style>
        body {
            background-image: url('{{ asset("assets/beautiful-golden-field-with-amazing-cloudy.jpg") }}');
            background-size: cover;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Apply the fadeIn animation to the .Group2 */
        .fadeIn {
            animation: fadeIn 1.5s ease-in-out forwards;
        }

        
        .CloseButton {
        width: 39px;
        height: 35px;
        left: 436px;
        top: 15px;
        position: absolute;
        cursor: pointer;
        transition: background-color 0.3s; /* Efek transisi untuk perubahan latar belakang */
    }

    .CloseButton:hover {
        background-color: #FF0000; /* Warna latar belakang saat hover (ganti sesuai keinginan) */
    }

    .Rectangle30 {
        width: 39px;
        height: 35px;
        left: 0px;
        top: 0px;
        position: absolute;
        background: #07294D;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .XIcon {
        width: 24px;
        height: 24px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #D9D9D9;
        font-size: 24px;
        line-height: 1;
        font-weight: bold;
    }
        
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    
<form action="/sikm/login" method="post">
        @csrf
        <div class="Group2 fadeIn" style="width: 486px; height: 606px; position: relative">
            <div class="Rectangle23" style="width: 486px; height: 604.89px; left: 0px; top: 0px; position: absolute; background: rgba(255, 255, 255, 0.10); border-radius: 20px; border: 9.76px rgba(255, 255, 255, 0.20) solid; backdrop-filter: blur(65.07px)"></div>
            <div class="Frame5" style="width: 486px; height: 70.77px; padding-top: 20px; padding-bottom: 20px; left: 0px; top: 535.23px; position: absolute; background: #E8F3F2; border-radius: 20px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
                <div class="BelumMempunyaiAkunDaftar"><span style="color: #999999; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Belum Mempunyai Akun? </span><a href="{{ url('sikm/register') }}"><span style="color: #07294D; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Daftar</span></a></div>
            </div>
            <div class="Frame4" style="width: 388.57px; height: 64.14px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 48.71px; top: 328.43px; position: absolute; background: linear-gradient(180deg, #0F21C5 0%, rgba(1, 2.23, 13.31, 0.07) 93%, rgba(0, 0, 0, 0) 100%); border-radius: 20px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
        <button type="submit" class="Masuk" style="color: white; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Masuk</button>
    </div> 
            <div class="Frame7" style="width: 388.57px; height: 64.14px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 48.71px; top: 230.01px; position: absolute; background: #FFFFFF; border-radius: 20px; border: 2px #FFFFFF; solid; display: flex; align-items: center;">
    <div class="LockIcon" style="width: 24px; height: 24px; padding-left: 2px; padding-right: 2px; padding-top: 4px; padding-bottom: 4px; justify-content: center; align-items: center; display: flex">
        <img src="../feather/lock.svg" alt="" style="width: 16px; height: 21px; ">
    </div>
    <input type="password" id="password" name="password" placeholder="Kata Sandi" style="flex: 1; padding: 10px; color: #000000; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
    <div class="HideIcon" style="width: 24px; height: 24px; cursor: pointer;">
    </div>
</div>

<div class="Frame2" style="width: 388.57px; height: 64.14px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 48.71px; top: 131.59px; position: absolute; background: #FFFFFF; border-radius: 20px; border: 2px #FFFFFF solid; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
    <div class="IcOutlineEmail" style="width: 24px; height: 24px; padding-left: 2px; padding-right: 2px; padding-top: 4px; padding-bottom: 4px; justify-content: center; align-items: center; display: flex">
        <img src="../feather/mail.svg" alt="" style="width: 16px; height: 21px;">
    </div>
    <input type="email" id="email" name="email" placeholder="Email" style="width: 100%; color: #000000; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
</div>

            <div class="LogoTerang" style="width: 157.47px; height: 49.76px; padding-right: 32.47px; left: 164.27px; top: 33.18px; position: absolute; border-radius: 20px; justify-content: flex-start; align-items: center; display: inline-flex">
                <div class="LogIn" style="color: black; font-size: 45px; font-family: Poppins; font-weight: 700; word-wrap: break-word">Login</div>
            </div>
            <div class="CloseButton" style="width: 39px; height: 35px; left: 436px; top: 15px; position: absolute; cursor: pointer;">
    <div class="Rectangle30" style="width: 39px; height: 35px; left: 0px; top: 0px; position: absolute; background: #07294D; border-top-left-radius: 15px; border-top-right-radius: 15px;">
    </div>
    <a href="/">
        <div class="XIcon" style="width: 24px; height: 24px; position: absolute; top: 50%; left: 60%; transform: translate(-50%, -50%); color: #D9D9D9; font-size: 24px; line-height: 1; font-weight: bold;">X</div>
    </a>
</div>
        </div>
    </form>

</body>
</html>