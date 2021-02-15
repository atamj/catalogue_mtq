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

        /** Post */
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        $.ajax({
            method: "POST",
            url: $("#email-form").attr("action"),
            data: data
        })
            .done((data) => {
                if (data == "ok"){
                    postSuccess()
                }else {
                    postSuccess("Vous êtes déjà inscrit")
                }
            })
            .fail((error) => {
                fail(error)
            });
    }

    /**
     * Get content in Sheet
     * */
}

/** Connect to GSheet API */
document.addEventListener('DOMContentLoaded', () => {

    let url = $("#email-form").attr('action')
    let sheet = new GSheet(url)

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

