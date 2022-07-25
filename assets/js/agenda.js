    barba.init({
        views: [{
          namespace: 'home',
          beforeEnter({ next }) {
      
          // load your script
          let script = document.createElement('script');
          script.src = '/robida-web/assets/js/index.js';
          next.container.appendChild(script);
          }, 
      }],
      });