<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SIKM - Register</title>
    <style>
        body {
            background-image: url('{{ asset('assets/beautiful-golden-field-with-amazing-cloudy.jpg') }}');
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


    <div class="Group3" style="width: 486px; height: 606px; position: relative">
        <div class="Rectangle23"
            style="width: 485.10px; height: 606px; left: 0.90px; top: 0px; position: absolute; background: rgba(255, 255, 255, 0.10); border-radius: 20px; border: 9.76px rgba(255, 255, 255, 0.20) solid; backdrop-filter: blur(65.07px)">
        </div>
        <div class="Frame5"
            style="width: 485.10px; height: 70.90px; padding-top: 20px; padding-bottom: 20px; left: 0px; top: 533.99px; position: absolute; background: #E8F3F2; border-radius: 20px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
            <div class="SudahMempunyaiAkunMasuk"><span
                    style="color: #999999; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Sudah
                    Mempunyai Akun? </span><a href="{{ url('sikm/login') }}"><span
                        style="color: #07294D; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                        Masuk</span></div></a>
        </div>
        <form action="/sikm/register" method="post">
            @csrf
            <div class="Frame4"
                style="width: 387.85px; height: 64.26px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 48.62px; top: 393.82px; position: absolute; background: linear-gradient(180deg, #0F21C5 0%, rgba(1, 2, 13, 0) 100%); border-radius: 20px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
                <button type="submit">
                    <div class="Daftar"
                        style="color: white; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word; width:inherit;">
                        Daftar</div>
                </button>
            </div>
            <div class="Frame7"
    style="width: 387.85px; height: 64.26px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 49px; top: 291.22px; position: absolute; background: #FFFFFF; border-radius: 20px; border: 2px #FFFFFF solid; display: flex; align-items: center;">
    <div class="LockIcon" style="width: 24px; height: 24px; padding-left: 2px; padding-right: 2px; padding-top: 4px; padding-bottom: 4px; justify-content: center; align-items: center; display: flex">
        <img src="../feather/lock.svg" alt="" style="width: 16px; height: 21px;">
    </div>
    <input type="password" placeholder="Kata Sandi" name="password" id="password" style="width:inherit; color: #000000; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
    <div id="togglePassword" style="cursor: pointer;">
    </div>
</div>
            <div class="Frame2"
                style="width: 387.85px; height: 64.26px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 49px; top: 206px; position: absolute; background: #FFFFFF; border-radius: 20px; border: 2px #FFFFFF solid; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
                <div class="IcOutlineEmail"
                    style="width: 24px; height: 24px; padding-left: 2px; padding-right: 2px; padding-top: 4px; padding-bottom: 4px; justify-content: center; align-items: center; display: flex">
                    <img src="../feather/mail.svg" alt="" style="width: 16px; height: 21px;">
                </div>
                <input type="email" id="email" name="email" placeholder="Email" style="width:inherit; color: #000000; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
            </div>
            
            <div class="Name" style="width: 387.85px; height: 64.26px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 49px; top: 118px; position: absolute; background: #FFFFFF; border-radius: 20px; border: 2px #FFFFFF solid; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
              <div class="UserLight" style="width: 24px; height: 24px; padding-top: 4px; padding-left: 4px; padding-right: 4px; flex-direction: column; justify-content: flex-end; align-items: center; gap: 4px; display: inline-flex">
              <img src="../feather/user.svg" alt="" style="width: 20px; height: 30px;">
              </div>
              <input type="text" id="name" name="name" placeholder="Name" style="width:inherit; color: #; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word;">
          </div>
          
        </form>
        <div class="CloseButton" style="width: 39px; height: 35px; left: 436px; top: 15px; position: absolute; cursor: pointer;">
    <div class="Rectangle30" style="width: 39px; height: 35px; left: 0px; top: 0px; position: absolute; background: #07294D; border-top-left-radius: 15px; border-top-right-radius: 15px;">
    </div>
    <a href="/">
        <div class="XIcon" style="width: 24px; height: 24px; position: absolute; top: 50%; left: 60%; transform: translate(-50%, -50%); color: #D9D9D9; font-size: 24px; line-height: 1; font-weight: bold;">X</div>
    </a>
</div>
</div>

        <div class="LogoTerang"
            style="width: 197px; height: 50px; padding-right: 5px; left: 600px; top: 32px; position: absolute; border-radius: 20px; justify-content: flex-start; align-items: center; display: inline-flex">
            <div class="LogIn"
                style="color: black; font-size: 45px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                Register</div>
        </div>
    </div>


</body>

</html>
