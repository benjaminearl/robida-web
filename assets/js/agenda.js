    barba.init({
        views: [{
          namespace: 'home',
          beforeEnter({ next }) {
      
          // load your script
          let script = document.createElement('script');
          script.src = 'https://r0bida.bnjmnearl.eu/assets/js/index.js';
          next.container.appendChild(script);
          }, 
      }],
      });