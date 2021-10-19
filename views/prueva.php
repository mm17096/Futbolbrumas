<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/prueva.scss" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pruava</title>
</head>

<body>
    <div class="login_form">
        <setion class="login-wrapper">

            <div class="logo">
                <a target="_blank" rel="noopener">
                    <img src="https://unrealnavigation.com/_themes/unrealnavigation/img/unreal-navigation-logo.png?v=1474018625"
                        alt=""></a>
            </div>

            <form id="login" method="post" action="#">

                <label for="username">User Name</label>
                <input required name="login[username]" type="text" autocapitalize="off" autocorrect="off" />

                <label for="password">Password</label>
                <input class="password" required name="login[password]" type="password" />
                <div class="hide-show">
                    <span>Show</span>
                </div>
                <button type="submit">Sign In</button>
            </form>

            </section>
    </div>
</body>
<script src="../js/prueva.js"></script>

</html>