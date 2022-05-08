function openSidebar() {
    var sb = document.getElementById("sidebar")
    if (sb.clientWidth > 0) {
        sb.classList.add('basis-0');
        sb.classList.remove('mr-2');
        sb.classList.remove('p-2');
    } else {
        sb.classList.remove('basis-0');
        sb.classList.add('mr-2');
        sb.classList.add('p-2');
    }
}

function openCat(el) {
    window.location.href = '?cat=' + el.innerText.replace('&', '').replace(/\s+/g, '');
}

function openBook(id) {
    console.log("open")
    window.location.href = "/book?id=" + id;
}

function addCart(el) {
    console.log("add")
}

function g(link) {
    window.location.href = link;
}