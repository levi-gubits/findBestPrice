<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../CSS/login_card.css?new">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: royalblue;
        }
    </style>
</head>

<body>

    <div id="id01" class="modal show" style=" transition: none">
        <div class="center" style=" transition: none">
            <span class="close" title="Close Modal" style="opacity: 0;">&times;</span>
            <div class="card card_content" style="opacity: 1;">
            </div>
        </div>
    </div>

<?php
    include_once __DIR__ ."/../user_module.php";
    require_once __DIR__ ."/../../../data_base.php";    

    $email = $_GET['email'];
    foreach($_GET as $loc=>$item)$_GET[$loc] = base64_decode(urldecode($item));
    $password = $_GET['id'];
    $checkIfPasswordNotChangeBefore =  Database::query("SELECT * FROM `users` WHERE mail = '$email' AND password = '$password'");
?>
    <script>

    const card_content = document.querySelector('.card_content');

    function ressetPasswordCard(){
        card_content.innerHTML = `<div class="forgot_password">
            <h1>Resset password</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="password" name="newPassword" id="newPassword">
                    <span></span>
                    <label>new password</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="confirmNewPassword" id="confirmNewPassword">
                    <span></span>
                    <label>confirm your new password</label>
                </div>
                <input name="submit" type="button" value="Password reset" onclick="resetPassword()"><br>
                <div class="status"><span class="ressetPasswordStatus"></span></div>
                <div class="link">return to home page <a href="http://findbestprice.net/?page=home-page" class="signup_link">Home page</a></div>
            </form>
        </div>`;
    }

    function error(){
        card_content.innerHTML = `<div class="forgot_password">
            <h1>Error</h1>
            <form method="post">
                <div class="status" style="display:block"><span class="ressetPasswordStatus">Error: Password has been previously updated</span></div>
                <div class="link">return to home page <a href='http://findbestprice.net/?page=home-page' class="signup_link">Home page</a></div>
            </form>
        </div>`;
    }

    async function postData(url = '', data = {}) {
        // Default options are marked with *
        const response = await fetch(url, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
                'Content-Type': 'application/json'
                    // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify(data) // body data type must match "Content-Type" header
        });

        return response.json(); // parses JSON response into native JavaScript objects
    }

    function resetPassword() {

        const email = '<?php echo $email ?>';
        const password = document.getElementById('newPassword');
        const confirmPassword = document.getElementById('confirmNewPassword');
        const status = document.querySelector('.status');
        const ressetPasswordStatus = document.querySelector('.ressetPasswordStatus');
        const mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{8,})");

        if (password.value != confirmPassword.value) {
            status.style.display = "block";
            ressetPasswordStatus.textContent = "Please ensure the password and the confirmation are the same.";
            return;
        }

        if (password.value == "" || !mediumRegex.test(password.value)) {
            status.style.display = "block";
            ressetPasswordStatus.textContent = "Missing or invalid fields.";
            return;
        }

        if(password.value == `<?php echo $password?>`){
            status.style.display = "block";
            ressetPasswordStatus.textContent = "Password has previously been used.";
            return;
        }

        postData('updateNewPassword.php', {
            "email": email,
            "password": password.value,
        })

        .then(data => {
            status.style.display = "block";
            ressetPasswordStatus.textContent = data.status;
            status.style.borderColor = "green";
            status.style.background = "aliceblue";
            status.style.color = "green";

            setTimeout(() => {
                window.open(`http://findbestprice.net/?page=home-page`);
            }, 1000);
        });
    }
</script>

<?php
    if($checkIfPasswordNotChangeBefore){
        ?><script>ressetPasswordCard()</script><?php
    }else{
        ?><script>error()</script><?php
    }
?>
</body>

</html>
