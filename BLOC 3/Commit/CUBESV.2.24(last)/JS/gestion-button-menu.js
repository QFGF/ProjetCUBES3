function toggleNavigation() {
    const navbar = document.querySelector('.navbar-web');
    const menu = document.querySelector('.menu-btn-container');
  
    menu.classList.toggle('hidden');
    navbar.classList.toggle('show');
  }