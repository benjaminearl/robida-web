// // MOBILE VH

// function mobileWindow() {
//   let vh = window.innerHeight * 0.01;
//   document.documentElement.style.setProperty('--vh', `${vh}px`);
// }

// window.addEventListener("resize", mobileWindow, false);
// window.addEventListener("orientationchange", mobileWindow, false);

// GET END DATE
var days = -30; // days after current date
var date = new Date();
var first = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
var day=first.getDate();
var month=first.getMonth()+1;
var year=first.getFullYear();

thirtyDaysAhead = year + '-' + month + '-' + day;

// GENERATE START DATE - 10 months and 28 days
// Get the current date
var currentDate = new Date();

// Calculate the date 10 months and 28 days ago
var tenMonthsAndTwentyEightDaysAgo = new Date(currentDate);
tenMonthsAndTwentyEightDaysAgo.setMonth(currentDate.getMonth() - 10);
tenMonthsAndTwentyEightDaysAgo.setDate(currentDate.getDate() - 28);

// Format the date to YYYY-MM-DD
var startDateCalculation = tenMonthsAndTwentyEightDaysAgo.toISOString().slice(0, 10);

// GET CALENDAR HEIGHT
var midSectionHeight = document.getElementById("calendar").clientHeight;
var rowsHeight = midSectionHeight / 30;
var rowAmount = Math.round(rowsHeight);

  // TIMELINE OPTIONS
  $(function () {
    $("#myTimeline").Timeline({
      type: "bar",
      scale: "day",
      height: midSectionHeight + "px",
      rowHeight: 30,
      rows: rowAmount,
      minGridSize: 27,
      rangeAlign: "current",
      startDatetime: startDateCalculation,
      endDatetime: thirtyDaysAhead,
      weekday: "short",
      minuteInterval: 60,
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

    function mobLeftSidebar(x) {
      if (x.matches) { // If media query matches
        document.getElementById("menu").style.opacity = "0";
        document.getElementById("menu").style.visibility = "hidden";
        document.getElementById("left-sidebar").style.height = "3rem";
        document.getElementById("closeLeft").style.display = "none";
        document.getElementById("openLeft").style.display = "block";
      } else {
        document.getElementById("left-sidebar").style.width = "4em";
        document.getElementById("closeLeft").style.display = "none";
        document.getElementById("openLeft").style.display = "block";
        document.getElementById("center").style.width = "calc(100vw - 8em)";
      }
    }

    var x = window.matchMedia("(max-width: 720px)")
    mobLeftSidebar(x) // Call listener function at run time
    x.addListener(mobLeftSidebar) // Attach listener function on state changes
  }

  function openNav() {

    function mobLeftSidebar(x) {
      if (x.matches) { // If media query matches
        document.getElementById("menu").style.opacity = "1";
        document.getElementById("menu").style.visibility = "visible";
        document.getElementById("left-sidebar").style.width = "100vw";
        document.getElementById("left-sidebar").style.height = "calc(100vh - 8rem - 1px)";
        document.getElementById("closeLeft").style.display = "block";
        document.getElementById("openLeft").style.display = "none";
      } else {
        document.getElementById("left-sidebar").style.width = "30rem";
        document.getElementById("closeLeft").style.display = "block";
        document.getElementById("openLeft").style.display = "none";
        document.getElementById("center").style.width = "calc(100vw - 8em)";
      }
    }

    var x = window.matchMedia("(max-width: 720px)")
    mobLeftSidebar(x) // Call listener function at run time
    x.addListener(mobLeftSidebar) // Attach listener function on state changes
  }


  function closeGlossary() {

    function mobRightSidebar(x) {
      if (x.matches) { // If media query matches
        document.getElementById("right-sidebar").style.width = "4em";
        document.getElementById("right-sidebar").style.height = "3rem";
        document.getElementById("closeRight").style.display = "none";
        document.getElementById("openRight").style.display = "block";
        document.getElementById("glossary-content").style.display = "none";
      } else {
        document.getElementById("right-sidebar").style.width = "4em";
        document.getElementById("closeRight").style.display = "none";
        document.getElementById("openRight").style.display = "block";
        document.getElementById("center").style.width = "calc(100vw - 8em)";
        document.getElementById("glossary-content").style.display = "none";
      }
    }

    var x = window.matchMedia("(max-width: 720px)")
    mobRightSidebar(x) // Call listener function at run time
    x.addListener(mobRightSidebar) // Attach listener function on state changes
  }

  function openGlossary() {

    function mobRightSidebar(x) {
      if (x.matches) { // If media query matches
        document.getElementById("right-sidebar").style.width = "calc(100vw)";
        document.getElementById("right-sidebar").style.height = "calc(100vh - 8rem - 1px)";
        document.getElementById("closeRight").style.display = "block";
        document.getElementById("openRight").style.display = "none";
        document.getElementById("glossary-content").style.display = "block";
      } else {
        document.getElementById("right-sidebar").style.width = "30rem";
        document.getElementById("closeRight").style.display = "block";
        document.getElementById("openRight").style.display = "none";
        document.getElementById("center").style.width = "calc(100vw - 8em)";
        document.getElementById("glossary-content").style.display = "block";
      }
    }

    var x = window.matchMedia("(max-width: 720px)")
    mobRightSidebar(x) // Call listener function at run time
    x.addListener(mobRightSidebar) // Attach listener function on state changes
  }