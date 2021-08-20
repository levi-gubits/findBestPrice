const card_content = document.querySelector('.card_content');

//const body = document.body;
const foundation = document.querySelector('.foundation');
const closeBtn = foundation.querySelector('.close_card');

function signUp_card() {
    card_content.innerHTML = `<div class="signup_card">
        <h1>Signup</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="full_name" id="full_name">
                <span></span>
                <label> name</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password">
                <span></span>
                <label>password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="confirmPassword" id="confirmPassword">
                <span></span>
                <label>confirm password</label>
            </div>
            <div class="txt_field">
                <input type="email" name="email" id="email">
                <span></span>
                <label>email</label>
            </div>
            <input name="submit" type="button" value="Register" onclick="register()"><br>
            <div class="status"><span class="registerStatus"></span></div>
            <div class="link">Already have an account? <a href="#" class="login_link">Log in</a></div>
        </form>
    </div>`

    const login_link = document.querySelector('.login_link');
    login_link.addEventListener('click', () => {
        logIn_card();
    })
}

function logIn_card() {

    card_content.innerHTML = `<div class="login_card">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="email" name="email" id="loginEmail">
                <span></span>
                <label>email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="loginPassword"></label>
                <span></span>
                <label>password</label>
            </div>
            <div class="pass"><a href="#" class="forgot_password_link">forgot password?</a></div>
            <input name="submit" type="button" value="Login" onclick="login()"><br>
            <div class="status"><span class="loginStatus"></span></div>
            <div class="link">Not a member? <a href="#" class="signup_link">Signup</a></div>
        </form>
    </div>`;

    const signup_link = document.querySelector('.signup_link');
    signup_link.addEventListener('click', () => {
        signUp_card();
    })

    const forgot_password = document.querySelector('.forgot_password_link');
    forgot_password.addEventListener('click', () => {
        forgotPassword();
    })

}

function forgotPassword() {
    card_content.innerHTML = `<div class="forgot_password">
        <h1>Forgot password</h1>
        <form method="post">
            <div class="txt_field">
                <input type="email" name="email" id="emailToRessetPassword">
                <span></span>
                <label>email</label>
            </div>
            <input name="submit" type="button" value="Password reset" onclick="resetPassword()"><br>
            <div class="status"><span class="ressetPasswordStatus"></span></div>
            <div class="link">Not a member? <a href="#" class="signup_link">Signup</a></div>
        </form>
    </div>`;
}

function update_card(name, password, email, session) {
    card_content.innerHTML = `<div class="update_card">
        <h1>Update account</h1>
        <form method="post" style="margin-bottom: 20px;">
            <div class="txt_field">
                <input type="text" name="full_name" id="full_name" value='${name}'>
                <span></span>
                <label>name</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="UpdatePassword">
                <span></span>
                <label>password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="confirmPassword" id="confirmPassword">
                <span></span>
                <label>confirm password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="currentPassword" id="currentPassword">
                <span></span>
                <label>current password</label>
            </div>
            <div class="txt_field">
                <input type="email" name="email" id="email" value='${email}'>
                <span></span>
                <label>email</label>
            </div>
            <input name="submit" type="button" value="Update details"><br>
            <div class="status"><span class="updateStatus"></span></div>
        </form>
    </div>`;

    const updateButton = document.querySelector('input[type="button"]');
    updateButton.addEventListener('click', () => { update_info(name, password, email, session) })
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

function register() {

    const status = document.querySelector('.status');
    const registerStatus = document.querySelector('.registerStatus');
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password != confirmPassword) {
        status.style.display = "block";
        registerStatus.textContent = "Please ensure the password and the confirmation are the same.";
        return;
    }

    postData('PHP/moduls/user-module/endPoints/sign_up.php', {
            "full_name": document.getElementById('full_name').value,
            "password": password,
            "email": document.getElementById('email').value
        })
        .then(data => {
            status.style.display = "block";
            registerStatus.textContent = data.status; // JSON data parsed by `data.json()` call
            if (registerStatus.textContent == "You have successfully registered!") {
                status.style.borderColor = "green";
                status.style.background = "aliceblue";
                status.style.color = "green";
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        });
}

function login() {

    const status = document.querySelector('.status');
    const loginStatus = document.querySelector('.loginStatus');
    const email = document.getElementById('loginEmail');
    const password = document.getElementById('loginPassword');
    const mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{8,})");

    if (password.value == "" || email.value == "" || !mediumRegex.test(password.value)) {
        status.style.display = "block";
        loginStatus.textContent = "Missing or invalid fields.";
        return;
    }

    postData('PHP/moduls/user-module/endPoints/log_in.php', {
        "email": email.value,
        "password": password.value,
    })

    .then(data => {
        status.style.display = "block";
        loginStatus.textContent = data.status;
        if (loginStatus.textContent == "You've logged in successfully!") {
            status.style.borderColor = "green";
            status.style.background = "aliceblue";
            status.style.color = "green";
            setTimeout(() => {
                location.reload();
            }, 1000);
        }
    });
}

function resetPassword() {

    const email = document.getElementById('emailToRessetPassword');
    const status = document.querySelector('.status');
    const ressetPasswordStatus = document.querySelector('.ressetPasswordStatus');

    if (email.value == "") {
        status.style.display = "block";
        ressetPasswordStatus.textContent = "Missing or invalid fields.";
        return;
    }

    postData('PHP/moduls/user-module/endPoints/forgot_password.php', {
        "email": email.value,
    })

    .then(data => {
        status.style.display = "block";
        ressetPasswordStatus.textContent = data.status;

        if (ressetPasswordStatus.textContent == "Check your email to renew a password") {
            status.style.borderColor = "green";
            status.style.background = "aliceblue";
            status.style.color = "green";
        }
    });
}


function update_info(name_value, password_value, email_value, session) {
    const status = document.querySelector('.status');
    const updateStatus = document.querySelector('.updateStatus');
    const mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{8,})");

    let name = document.getElementById('full_name').value;
    let password = document.getElementById('UpdatePassword').value;
    let confirmpassword = document.getElementById('confirmPassword').value;
    let prePassword = document.getElementById('currentPassword').value;
    let email = document.getElementById('email').value;

    if (password != confirmpassword) {
        status.style.display = "block";
        updateStatus.textContent = "Please ensure the password and the confirmation are the same.";
        return;
    }

    if (!mediumRegex.test(password) && password != "") {
        status.style.display = "block";
        updateStatus.textContent = "Missing or invalid fields.";
        return;
    }

    if (prePassword != password_value && password != "") {
        status.style.display = "block";
        updateStatus.textContent = "Incorrect current password.";
        return;
    }

    if (name == "") { name = name_value }
    if (password == "") { password = password_value }
    if (email == "") { email = email_value }

    postData('PHP/moduls/user-module/endPoints/edit_user_data.php', {
        "name": name,
        "password": password,
        "email": email,
        "session": session,
    })

    .then(data => {
        status.style.display = "block";
        updateStatus.textContent = data.status;
        status.style.borderColor = "green";
        status.style.background = "aliceblue";
        status.style.color = "green";
        setTimeout(() => {
            location.reload();
        }, 1000);
    });
}

document.body.addEventListener('click', (event) => {
    if (event.target == foundation) {
        foundation.classList.remove('show');
    }
})

closeBtn.addEventListener('click', () => {
    foundation.classList.remove("show");
})