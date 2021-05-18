const validate = require("validate.js");
let $ = require("jquery");

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

$( function () {

    $("#contact-form").on("submit", function(event) {
        
        event.preventDefault();

        // for the next submission
        if (!$("#name-error").hasClass("hidden")) {
            $("#name-error").addClass("hidden");
        }
        if (!$("#email-error").hasClass("hidden")) {
            $("#email-error").addClass("hidden");
        }
        if (!$("#email-success").hasClass("hidden")) {
            $("#email-success").addClass("hidden");
            $("#send").removeClass("hidden");
        }
        if (!$("#email-failed").hasClass("hidden")) {
            $("#email-failed").addClass("hidden");
            $("#send").removeClass("hidden");
        }

        const contactFormValues = {
            name: $("#name").val(),
            email: $("#email").val(),
            token: $("#token").val()
        };
    
        const errors = validate(contactFormValues, contactFromConstraints);
        if (errors) {
            if (errors.name) {
                $("#name-error").removeClass("hidden");
            }
            if (errors.email) {
                $("#email-error").removeClass("hidden");
            }
        } else {
            $("#send").addClass("hidden");
            $("#spinner").removeClass("hidden");

            $.post('/NewEmail.php', contactFormValues)
    
            .then(function (response) {
                const message = JSON.parse(response)
                if (message.success) {
                    $("#spinner").addClass("hidden");
                    $("#email-success").removeClass("hidden");
                }
                if (message.error) {
                    $("#spinner").addClass("hidden");
                    $("#email-failed").removeClass("hidden");
                }
            });
        }
    
    });
});