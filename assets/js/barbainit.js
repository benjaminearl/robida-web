    barba.init({
        views: [{
          namespace: 'home',
          beforeEnter({ next }) {

          // load your script
          let script = document.createElement('script');
          // script.src = 'https://robidacollective.com/assets/js/index.js';
          next.container.appendChild(script);

          var coll = document.getElementsByClassName("collapsible");
          var i;
            
          for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
              var content = this.nextElementSibling;
              if (content.style.display === "block") {
                content.style.display = "none";
              } else {
                content.style.display = "block";
              }
            });
          }

          },
      }],
      });
