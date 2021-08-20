const title = document.querySelector('input.title');
const textarea = document.querySelector('textarea');
const submitBtn = document.querySelector('.submit-btn');
const status = document.querySelector('.status');
const updateStatus = status.querySelector('.updateStatus');

function contact() {

    if(emailForMessage == null || userID == 0){
        updateStatus.textContent = "Error: Messages can only be sent after you are logged in"

        status.style.display = "block";
        status.style.borderColor = "red";
        status.style.background = "antiquewhite";
        status.style.color = "red";
        title.value = "";
        textarea.value = "";
    }

    const url = "PHP/moduls/notifications-module/endPoints/getUserMessage.php";

    const data = {
        title: title.value,
        message: textarea.value,
        email: emailForMessage,
        userID: userID
    };

    const options = {
        method: "post",
        body: JSON.stringify(data)
    };

    fetch(url, options)
        .then((data) => {
            status.style.display = "block";
            title.value = "";
            textarea.value = "";
        });
}


submitBtn.addEventListener('click', () => { contact() });

textarea.addEventListener('input', () => {
    textarea.classList.add('valid');
    if (textarea.value === "") {
        textarea.classList.remove('valid');
    }
})