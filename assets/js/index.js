// GET START DATE
var days = 30; // days before current date
var date = new Date();
var first = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
var day=first.getDate();
var month=first.getMonth()+1;
var year=first.getFullYear();

timelineStartDate = year + '-' + month + '-' + day;
console.log(timelineStartDate)



$(function () {
  $("#myTimeline").Timeline({
    type: "bar",
    scale: "day",
    rows: 6,
    minGridSize: 27,
    startDatetime: timelineStartDate,
    weekday: "short",
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
  
  function closeNav() {
    document.getElementById("leftSidebar").style.width = "4em";
    document.getElementById("center").style.marginLeft = "4em";
    document.getElementById("closeLeft").style.display = "none";
    document.getElementById("openLeft").style.display = "block";
    document.getElementById("center").style.width = "calc(100vw - 8em)";
  }

  function openNav() {
    document.getElementById("leftSidebar").style.width = "20vw";
    document.getElementById("center").style.marginLeft = "20vw";
    document.getElementById("closeLeft").style.display = "block";
    document.getElementById("openLeft").style.display = "none";
    document.getElementById("center").style.width = "calc(80vw - 4em)";
  }