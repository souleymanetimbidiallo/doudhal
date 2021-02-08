function inputValidate(type, champ) {
  var regex = "";
  switch (type) {
    case "mail":
      regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
      break;
    case "tel":
      regex = /^(0|(00|\+)33)[0-9]{9}$/;
      break;
    case "password":
      regex = /^(?=.{8,15}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*$/;
      break;
    default:
      regex = "";
  }
  if (!regex.test(champ.value)) {
    return false;
  } else {
    return true;
  }
}

function mouseOverImage(image){
  image.src = "images/background/fond_image1.jpg";
}

function mouseOutImage(image){
  image.src = "images/background/fond_image2.png";
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
