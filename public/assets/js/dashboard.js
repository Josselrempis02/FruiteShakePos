const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});


document.querySelectorAll('.product-card.clickable').forEach(card => {
    card.addEventListener('click', () => {
        
        card.closest('form').submit();
    });
});



