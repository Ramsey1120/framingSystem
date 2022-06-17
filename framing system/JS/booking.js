document.addEventListener("DOMContentLoaded", () => {

    function sanitise(text) {
        var map = {
          '&': '&amp;',
          '<': '&lt;',
          '>': '&gt;',
          '"': '&quot;',
          "'": '&#039;'
        };

        text.trim();

        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }

    const order_form = document.querySelector(".trackntrace");
    const fname =  document.querySelector('[name="fname"]'); 
    const lname =  document.querySelector('[name="sname"]'); 
    const phoneno =  document.querySelector('[name="phone_no"]'); 
    const date =  document.querySelector('[name="date"]'); 
    const time =  document.querySelector('[name="time"]'); 

    order_form.addEventListener("submit", e => {

        sanitise(fname.value);
        sanitise(lname.value);
        sanitise(phoneno.value);
        sanitise(date.value);
        sanitise(time.value);

        let err_counter = 0;

        if  (fname.value.length > 0) {

            if (fname.value.length > 100) {

                fname.classList.add("form-input-error");
                fname.previousElementSibling.innerHTML = "First name must be between 1 and 100 characters .";
                err_counter++;

            } else {

                fname.previousElementSibling.innerHTML = "";
                fname.classList.remove("form-input-error");
            }

        } else {

            fname.classList.add("form-input-error");
            fname.previousElementSibling.innerHTML = "You must insert your firstname.";
            err_counter++;
        }




        if  (lname.value.length > 0) {

            if (lname.value.length > 100) {

                lname.classList.add("form-input-error");
                lname.previousElementSibling.innerHTML = "Surname must be between 1 and 100 characters.";
                err_counter++;

            } else {

                lname.previousElementSibling.innerHTML = "";
                lname.classList.remove("form-input-error");
            }

        } else {

            lname.classList.add("form-input-error");
            lname.previousElementSibling.innerHTML = "You must insert your surname.";
            err_counter++;
        }


        if  (phoneno.value.length > 0) {

            if (phoneno.value.length > 11 || isNaN(phoneno.value)) {
                phoneno.classList.add("form-input-error");
                phoneno.previousElementSibling.innerHTML = "UK Phone number must be in the format (0xxxxxxxxxx)";
                err_counter++;

            } else {
                phoneno.previousElementSibling.innerHTML = "";
                phoneno.classList.remove("form-input-error");
            }
       
        } else {
            phoneno.classList.add("form-input-error");
            phoneno.previousElementSibling.innerHTML = "You must input your phone number.";
            err_counter++;

        }



        if  (date.value.length > 0) {
            
            date.previousElementSibling.innerHTML = "";
            date.classList.remove("form-input-error");

        } else {

            date.classList.add("form-input-error");
            date.previousElementSibling.innerHTML = "You must input a date.";
            err_counter++;
        }
            
        
        if  (time.value.length > 0) {

            time.previousElementSibling.innerHTML = "";
            time.classList.remove("form-input-error");
       
        } else {

            time.previousElementSibling.innerHTML = "You must input a visit time.";
            time.classList.add("form-input-error");
            err_counter++;
        }


        if (err_counter > 0)  {
            e.preventDefault();
        }

    })




})