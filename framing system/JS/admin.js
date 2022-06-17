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

    const admin_form = document.querySelector("#admin_panel");
    const password = document.querySelector("#password");        

const newpainting = document.querySelector('#newpainting');
    const art_name =  document.querySelector('[name="name"]'); 
    const thumbnail = document.querySelector('[name="thumbnail"]');
    const width =  document.querySelector('[name="width"]'); 
    const height =  document.querySelector('[name="height"]'); 
    const price =  document.querySelector('[name="price"]'); 
    const desc =  document.querySelector('[name="desc"]'); 


    if (admin_form !== null) {
        admin_form.addEventListener("submit", e => {

            if  (password.value.length > 0) {
    
                if (password.value != "caraART21") {
                    password.classList.add("form-input-error");
                    password.previousElementSibling.innerHTML = "Incorrect password.";
                    e.preventDefault();
                }
    
            } else {
                password.classList.add("form-input-error");
                password.previousElementSibling.innerHTML = "You must input your password.";
                e.preventDefault();
            }
    
        })
    }
 

    let err_counter = 0;

    newpainting.addEventListener("submit", e => {

        sanitise(art_name.value);
        sanitise(width.value);
        sanitise(height.value);
        sanitise(price.value);
        sanitise(desc.value);

        if  (art_name.value.length > 0) {

            if (art_name.value.length > 100) {

                art_name.classList.add("form-input-error");
                art_name.previousElementSibling.innerHTML = "Name cannot exceed 100 characters.";
                err_counter++;

            } else {

                art_name.previousElementSibling.innerHTML = "";
                art_name.classList.remove("form-input-error");
            }

        } else {

            art_name.classList.add("form-input-error");
            art_name.previousElementSibling.innerHTML = "You must input the art name.";
            err_counter++;
        }



        if  (width.value > 0) {

            if (isNaN(width.value)) {

                width.classList.add("form-input-error");
                width.previousElementSibling.innerHTML = "The width must be a numeric value.";
                err_counter++;

            } else {

                width.previousElementSibling.innerHTML = "";
                width.classList.remove("form-input-error");
            }

        } else {

            width.classList.add("form-input-error");
            width.previousElementSibling.innerHTML = "Width must be greater than 0.";
            err_counter++;
        }



        if  (height.value > 0) {

            if (isNaN(height.value)) {

                height.classList.add("form-input-error");
                height.previousElementSibling.innerHTML = "The height must be a numeric value.";
                err_counter++;

            } else {

                height.previousElementSibling.innerHTML = "";
                height.classList.remove("form-input-error");
            }

        } else {

            height.classList.add("form-input-error");
            height.previousElementSibling.innerHTML = "Height must be greater than 0.";
            err_counter++;
        }

        if  (price.value > 0) {

            if (isNaN(price.value)) {

                price.classList.add("form-input-error");
                price.previousElementSibling.innerHTML = "The price must be a numeric value.";
                err_counter++;

            } else {

                price.previousElementSibling.innerHTML = "";
                price.classList.remove("form-input-error");
            }

        } else {

            price.classList.add("form-input-error");
            price.previousElementSibling.innerHTML = "Price must be greater than 0£.";
            err_counter++;
        }


        if  (desc.value.length > 0) {

            if (desc.value.length > 50) {

                desc.classList.add("form-input-error");
                desc.previousElementSibling.innerHTML = "Description cannot exceed 50 characters.";
                err_counter++;

            } else {

                desc.previousElementSibling.innerHTML = "";
                desc.classList.remove("form-input-error");
            }

        } else {

            desc.classList.add("form-input-error");
            desc.previousElementSibling.innerHTML = "You must input the art description.";
            err_counter++;
        }
        
        
        if (err_counter > 0)  {
            e.preventDefault();
        }

    })

})