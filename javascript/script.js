const mainMenu = document.querySelector(".main-menu");
const menuBar = document.querySelector(".menu-bar");
      
menuBar.addEventListener("click", () => {
    menuBar.classList.toggle("active");
    mainMenu.classList.toggle("active");
});
document.querySelectorAll(".menu-item").forEach(n => n.addEventListener("click", () => {
    menuBar.classList.remove("active");
    mainMenu.classList.remove("active");
    
}));

