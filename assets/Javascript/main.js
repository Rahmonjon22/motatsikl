

// === Burger Menu === //
const navSlide = () => {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".nav-links");
  const navLinks = document.querySelectorAll(".nav-links li");

  burger.addEventListener("click", () => {
    // Toggle Navbar
    nav.classList.toggle("nav-active");
    // Animate Links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = "";
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7}s`;
      }
    });
    // burger animation
    burger.classList.toggle("toggle");
  });
};
navSlide();

// === DropDown SubNav === //
document.addEventListener("click", (e) => {
  const isDropdownButton = e.target.matches("[data-dropdown-button]");
  if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return;
  let currentDropdown;
  if (isDropdownButton) {
    currentDropdown = e.target.closest("[data-dropdown]");
    currentDropdown.classList.toggle("active");
  }
  document.querySelectorAll("[data-dropdown].active").forEach((dropdown) => {
    if (dropdown === currentDropdown) return;
    dropdown.classList.remove("active");
  });
});

// for scrolling
const nav = document.querySelector('nav');
window.addEventListener('scroll', () => {
    if (window.scrollY >= 80) {
        nav.classList.add('active_nav');
    } else {
        nav.classList.remove('active_nav');
    }
})

// accordion in Bikes.html
const toggles = document.querySelectorAll('.faq-toggle');
toggles.forEach(toggle => {
	toggle.addEventListener('click', () => {
		toggle.parentNode.classList.toggle('active');
	});
});

// TabPanel in bikes.html
const tabButtons = document.querySelectorAll(".tabContainer .btnContainer .btnContainer-btn span");
const tabPanels = document.querySelectorAll(".tabContainer .tabPanel");

function showPanel(panelIndex, colorCode){
  tabButtons.forEach(function(node){
    node.style.fontFamily="Avenir Next LT W01 Condensed";
    node.style.borderBottomColor="#d7d4d4";
    node.style.borderBottomStyle="";

  });
   tabButtons[panelIndex].style.borderBottomStyle="solid #f05409";
   tabButtons[panelIndex].style.borderBottomColor="#f05409";
   tabButtons[panelIndex].style.fontFamily="Avenir Next LT W01 Demi Cond";

  tabPanels.forEach(function(node){
    node.style.display="none"
  });
  tabPanels[panelIndex].style.display="block";
  tabPanels[panelIndex].style.backgroundColor=colorCode;
}
showPanel(0);
// Second Panel starts here
const tabButtons1 = document.querySelectorAll(".tabContainer1 .btnContainer1 .btnContainer-btn1 .btn1-span");
const tabPanels1 = document.querySelectorAll(".tabContainer1 .tabPanel1");

function showPanel1(panelIndex, colorCode){
  tabButtons1.forEach(function(node){
    node.style.fontFamily="Avenir Next LT W01 Condensed";
    node.style.borderBottomColor="#FF6B24";
    node.style.borderBottomStyle="";

  });
   tabButtons1[panelIndex].style.borderBottomStyle="solid";
   tabButtons1[panelIndex].style.borderBottomColor="black";

   tabButtons1[panelIndex].style.fontFamily="Avenir Next LT W01 Demi Cond";

  tabPanels1.forEach(function(node){
    node.style.display="none"
  });
  tabPanels1[panelIndex].style.display="block";
  tabPanels1[panelIndex].style.backgroundColor=colorCode;
}
showPanel1(0);




// Motors-type to zoom
const hideshowes = document.querySelectorAll('.hide-show');
hideshowes.forEach(toggle => {
	toggle.addEventListener('click', () => {
		toggle.parentNode.classList.toggle('active');
	});
});
