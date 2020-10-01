var productsText;
var groupesText;
var statsText;

productsText = document.getElementById('productText');
groupesText = document.getElementById('groupesText');
statsText = document.getElementById('statsText');

function productSelected() {
    currentUrl = window.location.href;

    if (currentUrl = "http://localhost:8080/produits"){
        this.productText.style.color = "#EB212E !important";
    }
    
}