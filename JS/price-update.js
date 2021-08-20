const body = document.body;
const modal = document.querySelector('.modal');
const favorite = modal.querySelector('.favorite');
const cart = modal.querySelector('.cart');


function priceForProduct(val) {
    modal.style.display = "block";

    const url = "PHP/moduls/search-module/endPoints/showOnlyTheBestPriceResults.php";
    const proID = val;
    const span = favorite.querySelector('span');
    const logo = favorite.querySelector('img');
    const itemPage = cart.querySelector('.item-page');
    const linkToBuy = cart.querySelector('.link-to-buy');
    cart.querySelector('button').value = val;
    itemPage.href = `?page=itemPage&proid=${val}`;

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
            span.textContent = `${json.price}₪`;
            logo.src = json.logo;
            linkToBuy.href = json.link;
        });
}

function stopSearching(val) {

    const url = "PHP/moduls/search-module/endPoints/stopSearching.php";
    const proID = val;


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

const deleteSearchingButton = cart.querySelector('button');
deleteSearchingButton.addEventListener('click', () => {
    stopSearching(deleteSearchingButton.value);
})


body.addEventListener('click', (event) => {
    if (event.target == modal) {
        modal.style.display = "none";
    }
})

const close = document.querySelector('.center .close');
close.addEventListener('click', () => {
    modal.style.display = "none";
})