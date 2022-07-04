
    $(function () {
      $("#myTimeline").Timeline({
        type: "bar",
        scale: "day",
        rows: 6,
        headline: { display: false },
        effects: {
          presentTime: true,
          hoverEvent:  true,
          stripedGridRow: false,
          horizontalGridStyle: "none",
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