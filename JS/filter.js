const filter = document.querySelectorAll('.list');
const accordion = document.querySelectorAll('.accordion')
const list = document.querySelectorAll('.list ul');
const filterLastChild = filter.length - 1;


for (let i = 0; i < filter.length; i++) {
    if (filter[i].children[0].textContent != "Color") {
        filter[i].addEventListener('click', () => {
            filter[i].classList.toggle('active');
            accordion[i].style.height = `${list[i].childElementCount *3}0px`;
            if (!filter[i].classList[2]) { accordion[i].style.height = `0px`; }
        })
    } else {
        filter[i].addEventListener('click', () => {
            filter[i].classList.toggle('active');
        })
    }
}


filter.forEach(fil => {
    if (fil.children[0].textContent == "color") {
        fil.remove();
    }
});



const slideVlaue = document.querySelector(".val");
const inputSlider = document.querySelector(".inputSlider");


if (inputSlider) {
    inputSlider.oninput = (() => {
        inputSlider.name = "Price";
        let value = inputSlider.value;
        slideVlaue.textContent = `${value}₪`;
        slideVlaue.style.left = `${(value / 50)}%`;
        slideVlaue.classList.add("show");
    })

    inputSlider.addEventListener("blur", () => {
        slideVlaue.classList.remove("show")
    })
}


const colorLabel = document.querySelectorAll('.color_label');
const colorName = document.querySelector('.color_name');
const colors_selcted = document.querySelector('.colors_selcted');
const array_of_value = [];

colorLabel.forEach(color => {

    color.addEventListener("mouseover", () => {
        let value = color.children[0].value;
        color.children[1].style.opacity = "0.8";
        colorName.textContent += `: ${value}`;
    })
    color.addEventListener("mouseout", () => {
        colorName.textContent = `Color`;
        color.children[1].style.opacity = "1";
    })

    color.oninput = (() => {
        let value = color.children[0].value;

        if (color.children[0].checked) {
            colors_selcted.textContent = "Colors: ";
            array_of_value.push(value);
            array_of_value.forEach(val => {
                colors_selcted.textContent += ` ${val},`;
            })

        } else {
            colors_selcted.textContent = "Colors: ";
            for (let i = 0; i < array_of_value.length; i++) {
                if (array_of_value[i] === value) {
                    array_of_value.splice(i, 1);
                }
                if (array_of_value[i] != undefined) {
                    colors_selcted.textContent += ` ${array_of_value[i]},`;
                }
            }
        }

    })
});


const showFilter = document.querySelector('.show_filter');
const aside = document.querySelector('aside');
const arrowIcon = document.querySelector('.show_filter i');

showFilter.addEventListener('click', () => {
    aside.classList.toggle('show');
    if (aside.classList == "show") {
        arrowIcon.classList.remove('fa-angle-down');
        arrowIcon.classList.add('fa-angle-up');
    } else {
        arrowIcon.classList.remove('fa-angle-up');
        arrowIcon.classList.add('fa-angle-down');
    }
})