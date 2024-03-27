// Collapsible for Glossary

// GET END DATE
var days = -30; // days after current date
var date = new Date();
var first = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
var day=first.getDate();
var month=first.getMonth()+1;
var year=first.getFullYear();

thirtyDaysAhead = year + '-' + month + '-' + day;

// GENERATE START DATE - 11 months ago
// Get the current date
var currentDate = new Date();
// Calculate the date 11 months ago
var elevenMonthsAgo = new Date(currentDate);
elevenMonthsAgo.setMonth(currentDate.getMonth() - 11);
// Format the date to YYYY-MM-DD
var formattedDate = elevenMonthsAgo.toISOString().slice(0,10);


// GET CALENDAR HEIGHT
var midSectionHeight = document.getElementById("middle").clientHeight;
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
      startDatetime: elevenMonthsAgo,
      endDatetime: timelineEndDate,
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


  function closeGlossary() {

    function mobRightSidebar(x) {
      if (x.matches) { // If media query matches
        document.getElementById("rightSidebar").style.width = "4em";
        // document.getElementById("center").style.marginRight = "4em";
        document.getElementById("closeRight").style.display = "none";
        document.getElementById("openRight").style.display = "block";
        document.getElementById("glossary-content").style.display = "none";
      } else {
        document.getElementById("rightSidebar").style.width = "4em";
        document.getElementById("rightSidebar").style.minWidth = "0px";
        // document.getElementById("center").style.marginRight = "4em";
        document.getElementById("closeRight").style.display = "none";
        document.getElementById("openRight").style.display = "block";
        // document.getElementById("center").style.width = "calc(100vw - 4em)";
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
        document.getElementById("rightSidebar").style.width = "calc(100vw - 4em)";
        // document.getElementById("center").style.marginRight = "4em";
        document.getElementById("closeRight").style.display = "block";
        document.getElementById("openRight").style.display = "none";
        document.getElementById("glossary-content").style.display = "block";
      } else {
        document.getElementById("rightSidebar").style.width = "20vw";
        document.getElementById("rightSidebar").style.minWidth = "300px";
        // document.getElementById("center").style.marginRight = "20vw";
        document.getElementById("closeRight").style.display = "block";
        document.getElementById("openRight").style.display = "none";
        // document.getElementById("center").style.width = "calc(80vw - 4em)";
        document.getElementById("glossary-content").style.display = "block";
      }
    }

    var x = window.matchMedia("(max-width: 720px)")
    mobRightSidebar(x) // Call listener function at run time
    x.addListener(mobRightSidebar) // Attach listener function on state changes
  }