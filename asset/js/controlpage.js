$(document).ready(function () {
    //load content first
    console.log("helo");
    $("#main-content").load("pages/dashboard.php");

    //controller of side bar
    $(".nav-link").click(function (e) { 
      e.preventDefault();

      let sidebarId = $(this).attr("id");
      console.log(sidebarId);

      $(".nav-link").removeClass("active");
      $(this).addClass("active");

      if(sidebarId == "dashboard"){
        $("#main-content").load("pages/dashboard.php");
      }
      else if(sidebarId == "statistik"){
        $("#main-content").load("pages/statistik.php");
      }
      else if(sidebarId == "log_data"){
        $("#main-content").load("pages/log_data.php");
      }     
      else if(sidebarId == "fuzzy"){
        $("#main-content").load("pages/fuzzy_page.php");
      }
    });
  });

