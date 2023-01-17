function sloganScroll() {
  let slogan = document.getElementById("slogan");
  window.addEventListener("scroll", function () {
    let value = window.scrollY;
    slogan.style.marginTop = value * 0.7 + "px";
  });
}

function appear() {
  para1 = document.getElementById("para1");
  para2 = document.getElementById("para2");
  var myScrollFunc = function () {
    var y = window.scrollY;
    if (y >= 450) {
      para1.className = "para showPara";
    } else {
      para1.className = "para hidePara";
    }
    if (y >= 750) {
      para2.className = "para showPara";
    } else {
      para2.className = "para hidePara";
    }
  };

  window.addEventListener("scroll", myScrollFunc);
}

appear();
sloganScroll();
