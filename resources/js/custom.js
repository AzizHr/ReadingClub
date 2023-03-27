const open = document.getElementById("open");
const menu = document.getElementById("menu");

open.addEventListener("click", (e) => {
    e.preventDefault();
    menu.classList.toggle("hidden");
});

const openFavouritesMenu = document.getElementById("openFavouritesMenu");
const FavouritesMenu = document.getElementById("FavouritesMenu");

openFavouritesMenu.addEventListener("click", (e) => {
    e.preventDefault();
    FavouritesMenu.classList.toggle("hidden");
});

document.addEventListener("click", (e) => {
    // If the clicked element is not a descendant of the FavouritesMenu element, hide the FavouritesMenu
    if (!FavouritesMenu.contains(e.target) && !openFavouritesMenu.contains(e.target)) {
        FavouritesMenu.classList.add("hidden");
    }
});
