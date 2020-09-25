window.addEventListener("load", function () {
  // store tabs variables
  var tabs = document.querySelectorAll("ul.nav-tabs > li");

  for (i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", switchTab);
  }

  function switchTab(event) {
    event.preventDefault();

    document.querySelector("ul.nav-tabs li.active").classList.remove("active");
    document.querySelector(".tab-pane.active").classList.remove("active");

    var clickedTab = event.currentTarget;
    var anchor = event.target;
    var activePaneID = anchor.getAttribute("href");

    clickedTab.classList.add("active");
    document.querySelector(activePaneID).classList.add("active");
  }
});
function myFunction() {
  var checkBox = document.getElementsByClassName("myCheck");
  //   var checkBox1 = document.getElementById("myCheck1");
  console.log(checkBox[0]);
  //   console.log(checkBox1);
  var text = document.getElementsByClassName("text");
  if (checkBox[0].checked == true) {
    //|| checkBox1.checked == true) {
    text[0].style.display = "block";
  } else {
    text[0].style.display = "none";
  }
}
