const priceList = document.querySelector('.best_price');
const listOfPrice = document.querySelector('.list_of_price');
const accordion = document.querySelector('.accordion');
const cart = document.querySelector('.cart');
const favorite = document.querySelector('.favorite');
const modal = document.querySelector('.modal');
const center = document.querySelector('.center');
const cencelBtn = document.querySelector('.cencel');

const images = ['images/logo/ebay-logo.png', 'images/logo/application-logo.png', 'images/logo/mobileland-logo.png', 'images/logo/shufersal-logo.png', 'images/logo/zap-logo.png', 'images/logo/touchstore-logo.png', 'images/logo/i-cell-logo.png', 'images/logo/gomobile-logo.png', 'images/logo/amazon-logo.png', 'images/logo/alltech-logo.png', 'images/logo/ksp-logo.png', 'images/logo/banggood-logo.png'];

priceList.addEventListener('click', () => {
    if (!priceList.classList[1]) {
        priceList.classList.add('active');
        accordion.style.height = `${listOfPrice.childElementCount+1}50px`;
    } else {
        priceList.classList.remove('active');
        accordion.style.height = `110px`;
    }
})


function searchForNewResults() {
    const price = 0;

    //View a search process
    cart.innerHTML = '';
    for (let image of images) {
        searchingComponent(image);
    }

    const url = "PHP/moduls/search-module/endPoints/addSearchingRequest.php";

    const data = {
        userID: userID,
        proID: proID,
        price: price,
    };

    const options = {
        method: "post",
        body: JSON.stringify(data)
    };

    fetch(url, options)
        .then((result) => {
            showResults();
        });
}

function showResults() {

    const url = "PHP/moduls/search-module/endPoints/searchingResult.php";

    const data = {
        proID: proID,
    };

    const options = {
        method: "post",
        body: JSON.stringify(data)
    };

    fetch(url, options)
        .then((result) => {
            return result.json();
        })
        .then((json) => {
            cart.style.display = "none";
            listOfPrice.style.display = "block";

            listOfPrice.innerHTML = '';
            for (let [index, js] of json.entries()) {
                setTimeout(() => {
                    priceComponent(js);
                    accordion.style.height = `${listOfPrice.childElementCount+2}50px`;

                    if (index == json.length - 1) {
                        listOfPrice.firstElementChild.children[0].innerHTML = `<h2>BEST<br>PRICE:</h2><h2 class="first-price"><span>₪</span>${json[0].price}</h2>`;
                    }

                }, 1000 * index + 1);
            }
        });
}

function searchingComponent(logo) {

    cart.innerHTML += `<div class="price" style="border-bottom: none;">
        <div class="title_and_price">
            <h2>THE SYSTEM IS SEARCHING IN:</h2><img src="${logo}" width="80" alt="logo">
            <div class="circular">
                <div class="inner">
                </div>
                <div class="outer">
                </div>
                <div class="numb">
                    0%</div>
                <div class="circle">
                    <div class="dot"><span></span></div>
                    <div class="bar left">
                        <div class="progress">
                        </div>
                    </div>
                    <div class="bar right">
                        <div class="progress">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;

    const numb = document.querySelectorAll(".numb");
    const left = document.querySelectorAll(".circle .left .progress");
    const right = document.querySelectorAll(".circle .right .progress");
    const dot = document.querySelectorAll(".dot");
    for (let i = 0; i < numb.length; i++) {
        let counter = 0;
        setInterval(() => {
            if (counter == 100) {
                clearInterval();
            } else {
                counter += 1;
                dot[i].style.animationDuration = `${18+i*2}s`;
                left[i].style.animationDuration = `${i+9}s`;
                right[i].style.animationDuration = `${i+9}s`;
                right[i].style.animationDelay = `${i+9}s`;
                numb[i].textContent = `${counter}%`;
            }
        }, 180 + 20 * i);
    }
}

function priceComponent(json) {
    listOfPrice.innerHTML +=
        `<div class="price">
        <div class="title_and_price">
            <h2>PRICE:</h2>
            <h2><span>₪</span>${json.price}</h2>
        </div>
        <a href="${json.link}" class="link_to_buy">BUY NOW</a>
        <img src="${json.logo}" width="80" alt="logo">
    </div>`;
}

function searchForTheUserPrice() {
    const h2 = center.querySelector('h2');
    const cencel = document.querySelector('.cencel');

    const url = "PHP/moduls/search-module/endPoints/addSearchingRequest.php";
    const price = favorite.querySelector('input').value;

    if (userID == 0) {
        error();
        return;
    }

    if (price == "" || price == "0" || !Number(price)) {
        h2.textContent = `Error: Invalid value Try again`;
        favorite.querySelector('input').value = '';
        cencel.style.display = "none";
        return;
    }

    h2.innerHTML = `The system is looking for you for ₪ ${price}. You can see results on the <a href='?page=priceUpdate'>Price update page</a>`;
    cencel.style.display = "block";
    favorite.querySelector('input').value = '';

    const data = {
        userID: userID,
        proID: proID,
        price: Number(price),
    };

    const options = {
        method: "post",
        body: JSON.stringify(data)
    };

    fetch(url, options)
        .then((result) => {
            newUpdates();
        });
}

function stopSearching() {

    const url = "PHP/moduls/search-module/endPoints/stopSearching.php";

    const data = {
        proID: proID,
        userID: userID,
    };

    const options = {
        method: "post",
        body: JSON.stringify(data)
    };

    fetch(url, options)
        .then((result) => {
            location.reload();
        });
}

function error() {
    modal.style.display = "block";
    const h2 = center.querySelector('h2');
    center.querySelector('button').style.display = "none";
    h2.innerHTML = `For a system to be able to search for you please <button class="btn" onclick="foundation.classList.add('show');logIn_card();">log in</button> first,
    <br>or if you do not have an account <button class="btn" onclick="foundation.classList.add('show');signUp_card();">sign up</button>`
}

function newUpdates() {
    const newUpdate = document.querySelector('ul .newUpdate');
    newUpdate.style.display = "block";
}

const searchNowButton = document.querySelector('.search-now');
searchNowButton.addEventListener('click', searchForNewResults);


const searchMyPriceButton = document.querySelector('.search-my-price');
searchMyPriceButton.addEventListener('click', () => {
    searchForTheUserPrice();
    modal.style.display = "block";
});

cencelBtn.addEventListener('click', () =>{
    stopSearching();
})
const close = center.querySelector('.close');
close.addEventListener('click', () => { modal.style.display = "none" })