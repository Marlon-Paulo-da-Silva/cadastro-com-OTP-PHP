const otp =  document.querySelectorAll('.otp_field');

otp[0].focus();

otp.forEach((field, index) => {
  field.addEventListener('keydown', (e) => {
    if(e.key >= 0 && e.key <= 9){
      otp[index].value = "";
      setTimeout(() => {
        if(index < 3){
          otp[index + 1].focus(); 
        }
        console.log(index)
      }, 4);
    } else if (e.key == 'Backspace'){
      setTimeout(() => {
        if(index > 0){
          otp[index - 1].focus(); 
        }
        console.log(index)
        
      }, 4);
    }
  });
});

form = document.querySelector('#form');

submitbtn = document.querySelector('button[type="submit"]');

errortext = document.querySelector('.error-text');

$("form").on("submit", function (event) { 
  event.preventDefault();
  // console.log("cliquei!");
});

submitbtn.onclick = () => {
  console.log("cliquei!");
  // let xhr = new XMLHttpRequest();

  // xhr.open("POST", "./php/signup.php", true);
  // xhr.onload = () => {
  //   if(xhr.readyState === XMLHttpRequest.DONE){
  //     if(xhr.status == 200){
  //       let data = xhr.response;
  //       if(data == "Success"){
  //         location.href = "./verify.php"
  //       } else {
  //         errortext.textContent = data;
  //         errortext.style.display = "block";
  //       }
  //     }
  //   }
  // }

  // let formData = new FormData(form);
  // xhr.send(formData)



}