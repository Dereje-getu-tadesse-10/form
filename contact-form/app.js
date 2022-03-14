const modal = document.getElementById("myModal");

const btn = document.getElementById("isValide");

const close = document.getElementsByClassName("close")[0];

const form = document.querySelector('form');
const nom = document.querySelector('#nom');
const email = document.querySelector('#email');
const sujet = document.querySelector('#sujet');
const message = document.querySelector('#message');

// Erreurs

const erreurNom = document.querySelector('.erreurNom');
const erreurEmail = document.querySelector('.erreurEmail');
const erreurSujet = document.querySelector('.erreurSujet');
const erreurMessage = document.querySelector('.erreurMessage');

form.addEventListener('submit', (e) => {

  let valNom = nom.value;
  let valEmail = email.value;
  let valSujet = sujet.value;
  let valMessage = message.value;

  // regex 



  e.preventDefault();
  let formData = new FormData(form);
  let url = 'submit.php';

  fetch (url,{
    method: 'POST',
    body: formData
  })
  .then((response) => {
    return response.json()
  })
  .then((data) => {
    console.log(data)
  })

  if(valNom == ""){
    erreurNom.textContent = "champ incorrect";
  }
  else if(valEmail == ''){
    erreurEmail.textContent = "champ incorrect";
  }
  else if(valSujet == ""){
    erreurSujet.textContent = "champs incorrect";
  }
  else if(valMessage == ""){
    erreurMessage.textContent = "champ incorrect";
  }else{

    erreurNom.textContent = "";
    erreurEmail.textContent = "";
    erreurSujet.textContent = "";
    erreurMessage.textContent = "";

    modal.style.display = "block";
  
      close.addEventListener('click', () => {
      modal.style.display = "none";
      });
  
      window.addEventListener('click', (event) => {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });

    form.reset();
  }







  
 

})

