form = document.querySelector('#form');

submitbtn = document.querySelector('button[type="submit"]');

errortext = document.querySelector('.error-text');

$("form").on("submit", function (event) { 
  event.preventDefault();
  // console.log("cliquei!");
});

submitbtn.onclick = () => {
  console.log("cliquei!");
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "./php/signup.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status == 200){
        let data = xhr.response;
        if(data == "Success"){
          location.href = "./verify.php"
        } else {
          errortext.textContent = data;
          errortext.style.display = "block";
        }
      }
    }
  }

  let formData = new FormData(form);
  xhr.send(formData)



}