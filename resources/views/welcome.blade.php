<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel test</title>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <fb:login-button scope="public_profile,email" id="facebook_button">
    </fb:login-button>
   </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '',
                    autoLogAppEvents: true,
                    xfbml: true,
                    version: 'v15.0'
                });
                FB.login(function (response) {
                    if (response.authResponse) {
                        console.log('Welcome!  Fetching your information.... ');
                        FB.api('/me', function (response) {
                            console.log('Good to see you, ' + response.name + '.');
                        });
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                });
                FB.AppEvents.logPageView();
                checkLoginState()
                (function(d, s, id){
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.id = id;
                    js.src = "https://connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            };
            function checkLoginState() {
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }
            function statusChangeCallback(response) {
                console.log(response);
                if (response.status === "connected") {
                    console.log("logged in!")
                    testAPI();
                } else {
                    console.log("please login")
                }
            }
        });
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>



</html>
