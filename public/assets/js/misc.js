document.addEventListener('DOMContentLoaded', function() {
  function initSidebar() {
      setActiveMenu();
      
      document.querySelectorAll('.menu-toggle').forEach(toggle => {
          toggle.addEventListener('click', function(e) {
              e.preventDefault();
              const target = this.getAttribute('data-target');
              const subMenu = document.querySelector(target);
              
              subMenu.classList.toggle('show');
              
              const arrow = this.querySelector('.menu-arrow');
              if (subMenu.classList.contains('show')) {
                  arrow.style.transform = 'rotate(0deg)';
              } else {
                  arrow.style.transform = 'rotate(-90deg)';
              }
              
              document.querySelectorAll('.sub-menu').forEach(menu => {
                  if (menu !== subMenu && menu.classList.contains('show')) {
                      menu.classList.remove('show');
                      const otherArrow = menu.previousElementSibling.querySelector('.menu-arrow');
                      if (otherArrow) otherArrow.style.transform = 'rotate(-90deg)';
                  }
              });
          });
      });
      
      document.addEventListener('click', function(e) {
          if (!e.target.closest('.nav-item.menu-items')) {
              document.querySelectorAll('.sub-menu').forEach(menu => {
                  menu.classList.remove('show');
                  const arrow = menu.previousElementSibling.querySelector('.menu-arrow');
                  if (arrow) arrow.style.transform = 'rotate(-90deg)';
              });
          }
      });
  }
  
  function setActiveMenu() {
      const currentPath = window.location.pathname;
      
      document.querySelectorAll('.nav-item, .nav-link').forEach(el => {
          el.classList.remove('active');
      });
      
      document.querySelectorAll('.nav-link[href]').forEach(link => {
          if (link.getAttribute('href') && currentPath.startsWith(link.getAttribute('href'))) {
              link.classList.add('active');
              
              let parent = link.closest('.nav-item');
              while (parent) {
                  parent.classList.add('active');
                  
                  const subMenu = parent.querySelector('.sub-menu');
                  if (subMenu) {
                      subMenu.classList.add('show');
                      const toggle = parent.querySelector('.menu-toggle');
                      if (toggle) {
                          const arrow = toggle.querySelector('.menu-arrow');
                          if (arrow) arrow.style.transform = 'rotate(0deg)';
                      }
                  }
                  
                  parent = parent.parentElement.closest('.nav-item');
              }

          }
      });
  }
  
  initSidebar();
  
  window.addEventListener('popstate', setActiveMenu);
});