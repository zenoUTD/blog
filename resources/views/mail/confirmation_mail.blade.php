<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    @font-face {
    font-family: 'Special Elite';
    font-style: normal;
    font-weight: 400;
    src: local('Special Elite'), local('SpecialElite-Regular'), url(https://fonts.gstatic.com/s/specialelite/v6/9-wW4zu3WNoD5Fjka35JmwYWpCd0FFfjqwFBDnEN0bM.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
    }



    .email {
    display: block;
    width: 470px;
    padding: 60px 100px;
    margin: 50px auto;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    }

    .signature-name 	{
    text-align:initial;
    font:16px;
    color:#666;
    padding: 0 20px;
    line-height: 24px;
    }

    .signature-title 	{
    font-size:14px;
    color:#666;

    }

    .signature-contact 	{
    color: #999;
    font-size: 14px;
    text-align:initial;
    padding: 20px 20px;

    }
    .signature-contact a  {
    color: #999;
    text-decoration: none;
    line-height: 24px;
    }

    p {
    font-size: 18px;
    margin-bottom: 1.5em;
    line-height: 1.6;
    color:#444;
    }

    .bigger-font{
      font-size: 70px;
      font-weight: 700;
    }
    </style>
  </head>
  <body>
  <div class="email">
  <p>Dear {{$name}} ,</p>
  <p>Here is confirmation code <br> <span class="bigger-font"> [ {{$confirmation_code}} ] </span></p>
  <p> Click <a href="http://localhost:8000/mail-confirmation/" target="_blank"> here </a> to confirm your process.</p>
  <p>Sincerly,</p>
  <!-- EMAIL SIGNATURE STARTS HERE -->
  <span class="signature-contact">ITVisionHub Feed Zone</span>
  <!-- EMAIL SIGNATURE ENDS HERE -->
  </div>
  </body>

</html>
