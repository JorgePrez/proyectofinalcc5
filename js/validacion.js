(function() {

  function agregarcero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }

  function mesUno(i) {
   
    return i+1;
  }
 

  function checkTime() {
    var diactual = new Date(),
      
        h = diactual.getHours(),
        min =diactual.getMinutes(),
        seg = diactual.getSeconds();

    document.getElementById("cfecha").innerHTML = "<span>" + agregarcero(diactual.getDate()) + "/" + agregarcero(mesUno(diactual.getMonth())) + "/" +  agregarcero(diactual.getFullYear()) + "</span>"; 
    document.getElementById("chora").innerHTML = "<span>" + agregarcero(h) + ":" + agregarcero(min)+ "<span>"+ ":" +agregarcero(seg) + "</span> <span>";
  
    var d = setTimeout(function() {checkTime()}, 500);};
 
  checkTime();
})();




(function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  

