// GET START DATE
var days = 30; // days before current date
var date = new Date();
var first = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
var day=first.getDate();
var month=first.getMonth()+1;
var year=first.getFullYear();

timelineStartDate = year + '-' + month + '-' + day;


// TIMELINE OPTIONS
$(function () {
  $("#myTimeline").Timeline({
    type: "bar",
    scale: "day",
    rows: 6,
    minGridSize: 27,
    startDatetime: timelineStartDate,
    weekday: "short",
    minuteInterval: 30,
    minGridPer: 2,
    bgColor: '#ffffff',
    headline: { display: false },
    effects: {
      presentTime: true,
      hoverEvent:  true,
      stripedGridRow: false,
      horizontalGridStyle: "none",
      verticalGridStyle: "dotted",
    },
    ruler: {
      top: {
          lines: [ 'month', 'day' ],
          format: {
              month: 'long',
              day:   'numeric',
          }
      },
    },
  });
})

// SIDE BARS

  function closeNav() {
    // document.getElementById("leftSidebar").style.width = "4em";
    // document.getElementById("center").style.marginLeft = "4em";
    // document.getElementById("closeLeft").style.display = "none";
    // document.getElementById("openLeft").style.display = "block";
    // document.getElementById("center").style.width = "calc(100vw - 8em)";

    function mobLeftSidebar(x) {
      if (x.matches) { // If media query matches
        document.getElementById("leftSidebar").style.width = "4em";
        document.getElementById("center").style.marginLeft = "4em";
        document.getElementById("closeLeft").style.display = "none";
        document.getElementById("openLeft").style.display = "block";
      } else {
        document.getElementById("leftSidebar").style.width = "4em";
        document.getElementById("center").style.marginLeft = "4em";
        document.getElementById("closeLeft").style.display = "none";
        document.getElementById("openLeft").style.display = "block";
        document.getElementById("center").style.width = "calc(100vw - 4em)";
      }
    }

    var x = window.matchMedia("(max-width: 720px)")
    mobLeftSidebar(x) // Call listener function at run time
    x.addListener(mobLeftSidebar) // Attach listener function on state changes
  }

  function openNav() {
    // document.getElementById("leftSidebar").style.width = "20vw";
    // document.getElementById("center").style.marginLeft = "20vw";
    // document.getElementById("closeLeft").style.display = "block";
    // document.getElementById("openLeft").style.display = "none";
    // document.getElementById("center").style.width = "calc(80vw - 4em)";

    function mobLeftSidebar(x) {
      if (x.matches) { // If media query matches
        document.getElementById("leftSidebar").style.width = "100vw";
        document.getElementById("center").style.marginLeft = "4em";
        document.getElementById("closeLeft").style.display = "block";
        document.getElementById("openLeft").style.display = "none";
      } else {
        document.getElementById("leftSidebar").style.width = "20vw";
        document.getElementById("center").style.marginLeft = "20vw";
        document.getElementById("closeLeft").style.display = "block";
        document.getElementById("openLeft").style.display = "none";
        document.getElementById("center").style.width = "calc(80vw - 4em)";
      }
    }

    var x = window.matchMedia("(max-width: 720px)")
    mobLeftSidebar(x) // Call listener function at run time
    x.addListener(mobLeftSidebar) // Attach listener function on state changes
  }
