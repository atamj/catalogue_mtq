class GSheet {
    constructor(url) {
        /** Set sheet url*/
        this.url = url;
    }

    /**
     * Post new entry in Sheet
     * */
    post(email, success, fail) {

        /** Prepare data*/
        const data = {
            email: email,
            "Created at": new Date(),
        };

        /** Test il this email exist*/
        fetch(this.url)
            .then((response) => response.json())
            .then((res) => {

                let exist = false
                /** Check in each lines if this mail exist */
                res.forEach((elm) => {

                    if (elm['email'] == email) {
                        exist = true
                        success('Vous êtes déjà inscrit')
                    }

                })
                /** Post email */
                if (!exist) {
                    /** Post */
                    fetch(this.url, {
                        method: "POST",
                        mode: "cors",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(data),
                    })
                        .then((r) => r.json())
                        .then((data) => {

                            /** Success function*/
                            success()

                        })
                        .catch((error) => {
                            /** Error function*/
                            fail(error)
                        });
                }

            })
            .catch((error) => {
                console.error(error)
            });

    }

    /**
     * Get content in Sheet
     * */
    /*get() {
        fetch(this.url)
            .then((response) => response.json())
            .then((data) => {
                return data;
            })
            .catch((error) => {
                return false
                console.error(error)
            });
    }*/
}

/** Connect to GSheet API */
let url = 'https://sheet.best/api/sheets/c9e142cb-9528-4ecf-9838-ad9e46267af5'
let sheet = new GSheet(url)

document.addEventListener('DOMContentLoaded', () => {

    /** Get form */
    var form = $('#email-form')

    /** Event on form submit */
    form.submit((e) => {

        e.preventDefault()
        $('.w-button').hide()
        /** Add loader */
        form.append("<img id='loader' src='../images/loader.svg' width='50px'/>")

        /** Get email on form */
        let email = $("input[type=email]").val()

        /** Post on sheet */
        sheet.post(email, postSuccess, postFail)

    })
});
/** Events when form is submit with success */
function postSuccess(message = "Merci ! Votre inscription a bien été enregistrée.") {

    $(".w-form-done").html("<div>" + message + "</div>")
    /** Show success message */
    $(".w-form-done").show()

    /** Hide fail message */
    $(".w-form-fail").hide()

    /** Clear email input */
    $("input[type=email]").val("")
    $("input[type=email]").hide()

    /** Remove loader */
    $('#loader').remove()

    /** Show sbmit button */
    // $('.w-button').show()

}

/** Events when form is submit with error */
function postFail(error) {
    $(".w-form-done").html("<div>Oups! Une erreur s'est produite lors de la soumission du formulaire.</div>")
    /** SHow error message */
    $(".w-form-fail").show()

    /** Hide success message */
    $(".w-form-done").hide()

    /** Remove loader */
    $('#loader').remove()
    $("input[type=email]").hide()

    /** Show submit button*/
    // $('.w-button').show()

    /** Show error in console*/
    console.log(error);
}

/** Events when get request have success*/
function getSuccess(data) {
    console.log(data)
}

/** Envents when get request have error*/
function getError(error) {
    console.error(error)
}
