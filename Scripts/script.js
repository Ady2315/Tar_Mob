function OpenMenu() {
    var burger = document.getElementById('mobile');
    burger.style.display = "block";
    document.getElementById('menu-mobile').style.display = "flex";
    document.getElementById('menu-btn').style.display = "none";
    document.body.style.overflow = "hidden";
}

function CloseMenu() {
    var close = document.getElementById('mobile');
    close.style.display = "none";
    document.getElementById('menu-mobile').style.display = "none";
    document.getElementById('menu-btn').style.display = "block";
    document.body.style.overflow = "visible";
}

document.getElementById('menu-btn').onclick = OpenMenu;
document.getElementById('close-button').onclick = CloseMenu;
