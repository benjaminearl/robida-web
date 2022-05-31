
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

  function closeRight() {
    document.getElementById("rightSidebar").style.width = "4em";
    document.getElementById("closeRight").style.display = "none";
    document.getElementById("openRight").style.display = "block";
  }

  function openRight() {
    document.getElementById("rightSidebar").style.width = "20vw";
    document.getElementById("closeRight").style.display = "block";
    document.getElementById("openRight").style.display = "none";
  }
