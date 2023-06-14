document.addEventListener("DOMContentLoaded", function() {
    const button = document.querySelector(".popup-button");
    const popup = document.querySelector(".popup");
  
    button.addEventListener("click", function() {
      popup.classList.toggle("open");
    });
  });