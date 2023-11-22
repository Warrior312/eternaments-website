window.scrollTo(0, 0);
let scrollDistance = 0;
changeBackground();
changeText();
scrollHint();

let contentHeight = (document.getElementById("content").childElementCount * 100).toString() + "vh";
document.getElementById("fake-content").style.height = contentHeight;

function getBGOpacity(distance) {
  let bg_OpacityMod = scrollDistance - ((distance + 3) * 10);
  if (bg_OpacityMod > 40) {
    bg_OpacityMod = 40;
  }
  if (bg_OpacityMod < 0) {
    bg_OpacityMod = 0;
  }
  return (bg_OpacityMod / 40);
}

function changeBackground() {
  let bg1_OpacityMod = 40 - scrollDistance;
  if (bg1_OpacityMod > 40) {
    bg1_OpacityMod = 40;
  }
  if (bg1_OpacityMod < 0) {
    bg1_OpacityMod = 0;
  }
  let bg1_Opacity = 0.4 + 0.0175 * bg1_OpacityMod;
  document.getElementById("background1").style.opacity = bg1_Opacity;

  document.getElementById("background2").style.opacity = getBGOpacity(20);
  document.getElementById("background3").style.opacity = getBGOpacity(40);
  document.getElementById("background4").style.opacity = getBGOpacity(60);
  document.getElementById("background5").style.opacity = getBGOpacity(70);
  document.getElementById("background6").style.opacity = getBGOpacity(80);
}

function getTextOpacity(distance) {
  let text_OpacityMOD = scrollDistance - distance - 15;
  if (text_OpacityMOD < 0) {text_OpacityMOD = 0}
  if (text_OpacityMOD > 25 && text_OpacityMOD < 45) {text_OpacityMOD = 25}
  if (text_OpacityMOD > 80) {text_OpacityMOD = 80}
  
  if (text_OpacityMOD <= 25) {
    text_Opacity = text_OpacityMOD / 25
  }

  if (text_OpacityMOD >= 45) {
    text_Opacity = 1 - (text_OpacityMOD - 45) / 25
  }

  return text_Opacity;
}

function changeText() {
  document.getElementById("box1").style.opacity = getTextOpacity(35);
  document.getElementById("box2").style.opacity = getTextOpacity(135);
  document.getElementById("box3").style.opacity = getTextOpacity(235);
  document.getElementById("box4").style.opacity = getTextOpacity(335);
  document.getElementById("box5").style.opacity = getTextOpacity(435);
  document.getElementById("box6").style.opacity = getTextOpacity(535);
  document.getElementById("box7").style.opacity = getTextOpacity(635);
  document.getElementById("box8").style.opacity = getTextOpacity(735);
  document.getElementById("box9").style.opacity = getTextOpacity(855);
}

function scrollHint() {
  if (scrollDistance  > 10) {
    document.getElementById("scrollText").style.display = "none";
    return
  }
  document.getElementById("scrollText").style.display = "block";
}

document.addEventListener("scroll", () => {
  let scrollDistance_px = window.scrollY;
  scrollDistance = 100 * (scrollDistance_px / window.innerHeight);

  scrollHint();
  changeBackground();
  changeText();
});
