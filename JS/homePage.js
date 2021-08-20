const searchBtn = document.querySelector('.search-btn');
const category_link = document.querySelector('.category_link');
const category_modal = document.querySelector('.category_modal');

category_link.addEventListener('click', () => {
    category_modal.style.display = "block";
})


document.body.addEventListener('click', (event) => {
    if (event.target == category_modal) {
        category_modal.style.display = "none";
    }
})


const searchValue = document.querySelector('#search');
searchValue.addEventListener('input', () => {
    searchingProduct();
})

searchBtn.addEventListener('click', () => {
    if (searchValue.value != "") {
        window.open(`?page=products&search=${searchValue.value}`);
    }
});


function searchingProduct() {
    const url = "PHP/moduls/search-module/endPoints/searchProductToUser.php";
    const searchingResults = document.querySelector('.searching-results');
    const ul = searchingResults.querySelector('ul');

    if (searchValue.value == "") {
        searchingResults.style.display = "none";
        searchValue.style.borderRadius = "0px 20px 20px 0px";
        return;
    }

    const data = {
        searchValue: searchValue.value,
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

            ul.innerHTML = '';
            searchValue.style.borderRadius = "0 20px 0 0";
            searchingResults.style.display = "block";

            if (json.error) {
                ul.innerHTML += `
                <p>${json.error}</p>`;
                return;
            }

            if (searchValue.value != "") {
                json.forEach(js => {
                    ul.innerHTML += `<li class="product-name">
                    <a href="?page=itemPage&proid=${js.id}">${js.name}</a>
                    <img src="${js.image}"></img></li>`;
                });
            }
        });
}