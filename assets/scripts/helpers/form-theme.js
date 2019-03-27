export const formTheme = (function() {

  var inputs = document.querySelectorAll("input[type='text'], input[type='email'], input[type='number'], textarea");

  function inputNotEmpty(curent) {
    curent.nextElementSibling.classList.add("not-empty");
  }
  function inputEmpty(curent) {
    curent.nextElementSibling.classList.remove("not-empty");
  }
  function inputEmptyOrNot(curent) {
    if (curent.value != "") {
      inputNotEmpty(curent);
    }
    else {
      inputEmpty(curent);
    }
  }
  
  for(var i = 0; i < inputs.length; i++){
    var input = inputs[i];
    
    inputEmptyOrNot(input);
  
    input.addEventListener('focus', function() {
      inputNotEmpty(this);
    })
  
    input.addEventListener('focusout', function() {
      inputEmptyOrNot(this);
    });
  }
})()