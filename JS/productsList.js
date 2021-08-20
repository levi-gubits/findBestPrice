const cart = document.querySelector('.cart');
const favorite = document.querySelector('.favorite');

const btnUpdate = document.querySelectorAll('.update');
const modal = document.querySelector('.modal');
const body = document.body;


btnUpdate.forEach(btn => {
    btn.addEventListener('click', () => {
        modal.style.display = "block";
        priceForProduct(btn.value)
    })
});

body.addEventListener('click', (event) => {
    if (event.target == modal) {
        modal.style.display = "none";
    }
})

const close = document.querySelector('.center .close');
close.addEventListener('click', () => {
    modal.style.display = "none";
})

function priceForProduct(val) {
    const url = "PHP/moduls/search-module/endPoints/showOnlyTheBestPriceResults.php";
    const proID = val;
    const span = favorite.querySelector('span');
    const logo = favorite.querySelector('img');
    const a = cart.querySelector('a');
    a.href = `?page=itemPage&proid=${val}`;

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
            span.textContent = `${json.price}.00₪`;
            logo.src = json.logo;
        });
}