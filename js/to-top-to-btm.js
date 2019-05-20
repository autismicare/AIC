// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("topBtn").style.display = "block";
    document.getElementById("bottomBtn").style.display = "none";
  } else {
    document.getElementById("topBtn").style.display = "none";
    document.getElementById("bottomBtn").style.display = "block";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function bottomFunction() {
  window.scrollTo(0, document.body.scrollHeight);
}