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

        console.log(data);

        if(data == true){
          // location.href = "./response.php"
        } else {
          // errortext.textContent = 'Erro ao enviar e-mail';
          // errortext.style.display = "block";
        }
      }
    }
  }

  let formData = new FormData(form);
  xhr.send(formData)



}