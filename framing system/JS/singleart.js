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

    // https://stackoverflow.com/questions/1787322/what-is-the-htmlspecialchars-equivalent-in-javascript

    const order_form = document.querySelector(".order");
    const fname =  document.querySelector('[name="fname"]'); 
    const lname =  document.querySelector('[name="sname"]'); 
    const phoneno =  document.querySelector('[name="phone_no"]'); 
    const email =  document.querySelector('[name="email"]'); 
    const street_name =  document.querySelector('[name="street_name"]'); 
    const city =  document.querySelector('[name="city"]'); 
    const postcode =  document.querySelector('[name="postcode"]');
    
    const art_details = document.querySelector(".magnified_art");

    document.querySelector("header").remove();

    order_form.style.display = "none";

    document.querySelector(".order_button").addEventListener("click", () => {

        order_form.style.display = "block";
        art_details.style.display = "none";

    })


    order_form.addEventListener("submit", e => {

        sanitise(fname.value);
        sanitise(lname.value);
        sanitise(phoneno.value);
        sanitise(email.value);
        sanitise(street_name.value);
        sanitise(postcode.value);
        sanitise(city.value);

        let err_counter = 0;    

        if  (fname.value.length > 0) {

            if (fname.value.length > 100) {

                fname.classList.add("form-input-error");
                fname.previousElementSibling.innerHTML = "First name must be between 1 and 100 characters";
                err_counter++;

            } else {

                fname.previousElementSibling.innerHTML = "";
                fname.classList.remove("form-input-error");
            }

        } else {

            fname.classList.add("form-input-error");
            fname.previousElementSibling.innerHTML = "Please insert your firstname";
            err_counter++;
        }


        if  (lname.value.length > 0) {

            if (lname.value.length > 100) {

                lname.classList.add("form-input-error");
                lname.previousElementSibling.innerHTML = "Surname must be between 1 and 100 characters";
                err_counter++;

            } else {

                lname.previousElementSibling.innerHTML = "";
                lname.classList.remove("form-input-error");
            }

        } else {

            lname.classList.add("form-input-error");
            lname.previousElementSibling.innerHTML = "Please insert your surname";
            err_counter++;
        }


        if  (phoneno.value.length > 0) {

            if (phoneno.value.length !== 11|| isNaN(phoneno.value) || phoneno.value.charAt(0) !== "0") {
                phoneno.classList.add("form-input-error");
                phoneno.previousElementSibling.innerHTML = "UK Phone number must be in the format (0xxxxxxxxxx)";
                err_counter++;

            } else {

                phoneno.previousElementSibling.innerHTML = "";
                phoneno.classList.remove("form-input-error");
            }
        
        } else {
            phoneno.classList.add("form-input-error");
            phoneno.previousElementSibling.innerHTML = "Please input your phone number";
            err_counter++;

        }


        if  (email.value.length > 0) {

            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value) === false) {
                email.classList.add("form-input-error");
                email.previousElementSibling.innerHTML = "Email must contain '@' and '.com' at the end";
                err_counter++;
            } else {
                                
                email.previousElementSibling.innerHTML = "";
                email.classList.remove("form-input-error");
            }


        } else {

            email.classList.add("form-input-error");
            email.previousElementSibling.innerHTML = "Please input an email";
            err_counter++;
        }
            
        
        if  (street_name.value.length > 0) {

            street_name.previousElementSibling.innerHTML = "";
            street_name.classList.remove("form-input-error");
        
        } else {
            
            street_name.previousElementSibling.innerHTML = "Please input a street name";
            street_name.classList.add("form-input-error");
            err_counter++;
        }


        if  (postcode.value.length > 0) {

            if (postcode.value.length !== 6) {
                postcode.previousElementSibling.innerHTML = "Postcode must be 6 digits";
                postcode.classList.add("form-input-error");
                err_counter++;


                if (postcode.value ) {
                    
                }
                
            } else {
                postcode.previousElementSibling.innerHTML = "";
                postcode.classList.remove("form-input-error");
            }
        
        } else {
            
            postcode.previousElementSibling.innerHTML = "Please input your Postcode";
            postcode.classList.add("form-input-error");
            err_counter++;
        }


        if  (city.value.length > 0) {

            if (city.value.length >  20) {
                city.previousElementSibling.innerHTML = "City name cannot exceed 20 characters";
                city.classList.add("form-input-error");
                err_counter++;
                
            } else {
                city.previousElementSibling.innerHTML = "";
                city.classList.remove("form-input-error");
            }
        
        } else {
            
            city.previousElementSibling.innerHTML = "Please input a city's names";
            city.classList.add("form-input-error");
            err_counter++;
        }


        if (err_counter > 0)  {
            e.preventDefault();
        } 

    })
})