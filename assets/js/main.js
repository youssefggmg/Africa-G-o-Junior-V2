function filterBy(filter) {

    let towns = document.querySelectorAll('.town');
    let capital = document.querySelectorAll('.capital');

    if (filter === 'capital') {
        towns.forEach(town => town.classList.add('d-none'));
        capital.forEach(capital => capital.classList.remove('d-none'));
    } else if (filter === 'town') {
        towns.forEach(town => town.classList.remove('d-none'));
        capital.forEach(capital => capital.classList.add('d-none'));
    } else {
        towns.forEach(town => town.classList.remove('d-none'));
        capital.forEach(capital => capital.classList.remove('d-none'));
    }
}

function search() {

    let searchBar = document.getElementById('searchBar');

    let searchBarValue = searchBar.value.toLowerCase();

    console.log(searchBarValue);


    let towns = document.querySelectorAll('.town');
    let capital = document.querySelectorAll('.capital');


}



// dropDown menu


let dropDown = document.getElementById('dropdown_language');
let dropdownContent = document.getElementById('dropdown_content');

dropDown.addEventListener('click', () => {

    dropdownContent.classList.toggle('hide');
})


// hide dropdown when click outside
document.addEventListener('click', (e) => {
    if (e.target !== dropDown) {
        dropdownContent.classList.add('hide');
    }
})


navbarCollapse.addEventListener('click', (e) => {
    if (!e.target.closest('#dropdown_language')) {
        dropdownContent.classList.add('hide');
    }
})

togglecollapse.addEventListener('click', () => {

    navbarCollapseNav.classList.toggle('hide');
})