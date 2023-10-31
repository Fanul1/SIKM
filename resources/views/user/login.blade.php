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
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    
    <div class="Group2 fadeIn" style="width: 486px; height: 606px; position: relative">
        <div class="Rectangle23" style="width: 486px; height: 604.89px; left: 0px; top: 0px; position: absolute; background: rgba(255, 255, 255, 0.10); border-radius: 20px; border: 9.76px rgba(255, 255, 255, 0.20) solid; backdrop-filter: blur(65.07px)"></div>
        <div class="Frame5" style="width: 486px; height: 70.77px; padding-top: 20px; padding-bottom: 20px; left: 0px; top: 535.23px; position: absolute; background: #E8F3F2; border-radius: 20px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
          <div class="BelumMempunyaiAkunDaftar"><span style="color: #999999; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Belum Mempunyai Akun? </span><a href="{{ url('sikm/register') }}"><span style="color: #07294D; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Daftar</span></a></div>
        </div>
        <div class="Frame4" style="width: 388.57px; height: 64.14px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 48.71px; top: 328.43px; position: absolute; background: linear-gradient(180deg, #0F21C5 0%, rgba(1, 2.23, 13.31, 0.07) 93%, rgba(0, 0, 0, 0) 100%); border-radius: 20px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
          <div class="Masuk" style="color: white; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Masuk</div>
        </div>
        <div class="Frame7" style="width: 388.57px; height: 64.14px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 48.71px; top: 230.01px; position: absolute; background: #F8F8F8; border-radius: 20px; border: 2px #DDDDDD solid; justify-content: space-between; align-items: center; display: inline-flex">
          <div class="Group1" style="width: 121px; height: 26.50px; position: relative">
            <div class="MdiPasswordOutline" style="width: 24px; height: 24px; padding-top: 1px; padding-bottom: 2px; padding-left: 4px; padding-right: 4px; left: 0px; top: 0px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
              <div class="Vector" style="width: 16px; height: 21px; background: #B1B1B1"></div>
            </div>
            <div class="KataSandi" style="left: 34px; top: 2.50px; position: absolute; color: #C7C7C7; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Kata Sandi</div>
          </div>
          <div class="MdiHideOutline" style="height: 24px; padding-top: 4px; padding-bottom: 2px; padding-left: 1px; padding-right: 1px; justify-content: center; align-items: center; display: flex">
            <div class="Vector" style="width: 22px; height: 18px; background: #07294D"></div>
          </div>
        </div>
        <div class="Frame2" style="width: 388.57px; height: 64.14px; padding-left: 20px; padding-right: 20px; padding-top: 7px; padding-bottom: 7px; left: 48.71px; top: 131.59px; position: absolute; background: #F8F8F8; border-radius: 20px; border: 2px #DDDDDD solid; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
          <div class="IcOutlineEmail" style="width: 24px; height: 24px; padding-left: 2px; padding-right: 2px; padding-top: 4px; padding-bottom: 4px; justify-content: center; align-items: center; display: flex">
            <div class="Vector" style="width: 20px; height: 16px; background: #B1B1B1"></div>
          </div>
          <div class="Email" style="color: #C7C7C7; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Email</div>
        </div>
        <div class="LogoTerang" style="width: 157.47px; height: 49.76px; padding-right: 32.47px; left: 164.27px; top: 33.18px; position: absolute; border-radius: 20px; justify-content: flex-start; align-items: center; display: inline-flex">
          <div class="LogIn" style="color: black; font-size: 45px; font-family: Poppins; font-weight: 700; word-wrap: break-word">Login</div>
        </div>
        <div class="Group4" style="width: 39px; height: 35px; left: 437px; top: 16px; position: absolute">
          <div class="Rectangle30" style="width: 39px; height: 35px; left: 0px; top: 0px; position: absolute; background: #07294D; border-top-left-radius: 15px; border-top-right-radius: 15px"></div>
          <div class="Line3" style="width: 29.83px; height: 0px; left: 9px; top: 27.10px; position: absolute; transform: rotate(-45deg); transform-origin: 0 0; background: #D9D9D9; border: 2px white solid"></div>
          <div class="Line4" style="width: 29.83px; height: 0px; left: 9px; top: 6px; position: absolute; transform: rotate(45deg); transform-origin: 0 0; border: 2px white solid"></div>
        </div>
      </div>


</body>
</html>