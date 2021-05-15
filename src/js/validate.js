const validate = require("validate.js");
const $ = require( "jquery" );

const contactFromConstraints = {
    name: {
        presence: { allowEmpty: false }
    },
    email: {
        presence: { allowEmpty: false },
        email: true
    },
    token: {
        presence: { allowEmpty: false }
    },
};

const contactForm = document.getElementById('contact-form');

contactForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const contactFormValues = {
        name: contactForm.elements.name.value,
        email: contactForm.elements.email.value,
        token: contactForm.elements.token.value
    };

    const errors = validate(contactFormValues, contactFromConstraints);
    if (errors) {

        console.log(errors)

    } else {
        $.post('/validate.php', contactFormValues)

            .then(function (response) {
            console.log(response);
        })
            .catch(function (error) {
            console.log(error);
        });
    }

}, false);