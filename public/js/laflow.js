var total_sections = 0;
var num_section = 0;
var active_section = 1;
var found_section = "";
$(document).ready(function () {

    /** Show product after content is loaded */
    $(".items-wrapper").show()

    $("#next")
        .removeClass("nav-active")
        .addClass("nav-inactive");
    $("#prev")
        .removeClass("nav-active")
        .addClass("nav-inactive");
    $(".section-wrapper").each(function () {
        num_section++;
        $(this)
            .attr("data-num", num_section)
        total_sections++;

        if (("#" + $(this).attr("id")) == location.hash) {
            active_section = num_section;
            found_section = active_section;

            $(this)
                .addClass("active left");
            $(this)
                .find(".product").each(function () {
                $(this)
                    .removeClass("pdt-active-0 pdt-active-1 pdt-active-2 pdt-active-3")
                    .addClass("pdt-active-" + getRandomInt(4) + "");
            })

        } else {

            $(this)
                .removeClass("active left right")
                .addClass("inactive left right");
        }

    });

    if (active_section > 1) {
        $("#prev")
            .removeClass("nav-inactive")
            .addClass("nav-active");
    }
    if (active_section < total_sections) {
        $("#next")
            .removeClass("nav-inactive")
            .addClass("nav-active");
    }

    $("#next").click(function (e) {
        e.preventDefault()
        if ($(".active").attr("data-num") == active_section) {

            $(".active")
                .removeClass("active left right")
                .addClass("inactive left");

            $(".section-wrapper").each(function () {
                if ($(this).attr("data-num") == (active_section + 1)) {
                    $(this)
                        .removeClass("inactive left right")
                        .addClass("active left");
                    $(this).find(".product").each(function () {
                        $(this)
                            .removeClass("pdt-active-0 pdt-active-1 pdt-active-2 pdt-active-3")
                            .css({"transform": "scale(0)", "transition": "none"})
                            .addClass("pdt-active-" + getRandomInt(4) + "");
                    })

                }
            });

            active_section++;
            toggleArrows();

        }
    });

    $("#prev").click(function (e) {
        e.preventDefault()
        if ($(".active").attr("data-num") == active_section) {

            $(".active")
                .removeClass("active left right")
                .addClass("inactive right");

            $(".section-wrapper").each(function () {
                if ($(this).attr("data-num") == (active_section - 1)) {
                    $(this)
                        .removeClass("inactive left right")
                        .addClass("active right");
                    $(this).find(".product").each(function () {
                        $(this)
                            .removeClass("pdt-active-0 pdt-active-1 pdt-active-2 pdt-active-3")
                            .css({"transform": "scale(0)", "transition": "none"})
                            .addClass("pdt-active-" + getRandomInt(4) + "");
                    })

                }
            });
            active_section--;
            toggleArrows();
        }
    });

    function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
    }

    function toggleArrows() {
        if (active_section > 1) {
            $("#prev")
                .removeClass("nav-inactive")
                .addClass("nav-active");
        } else {
            $("#prev")
                .removeClass("nav-active")
                .addClass("nav-inactive");
        }
        if (active_section < total_sections) {
            $("#next")
                .removeClass("nav-inactive")
                .addClass("nav-active");
        } else {
            $("#next")
                .removeClass("nav-active")
                .addClass("nav-inactive");
        }
    }


    /** Pop up fiche produit*/
    $(".product, .spotlight").click((e) => {
        /**Product target */
        let target = e.target

        /** Get products variable*/
        $('#designation').html(target.getAttribute('data-designation'))
        $('#description_produit').html(target.getAttribute('data-description_produit'))
        $('#prix_vente_1').html(target.getAttribute('data-prix_vente_1'))
        $('#prix_vente_2').html("€" + target.getAttribute('data-prix_vente_2'))
        $('#prix_barre_1').html(target.getAttribute('data-prix_barre_1'))
        $('#prix_barre_2').html("€" + target.getAttribute('data-prix_barre_2'))
        if (target.getAttribute('data-prix_barre_1') != "0") {
            $(".product_detail .p__old_price").show()
        } else {
            $(".product_detail .p__old_price").hide()
        }
        // $('#eco_part').html(target.getAttribute('data-eco_part'))
        $('#marque').html(target.getAttribute('data-marque'))
        // $('#ean').html("EAN: " + target.getAttribute('data-ean'))
        $(".copy-link").attr('data-ean', target.getAttribute('data-ean'))
        $("#share-email").attr('href', $("#share-email").attr('data-href') + "/" + target.getAttribute('data-ean'),)
        $('#photo_principale').css('background-image', 'url(/images/' + target.getAttribute('data-photo_principale') + ')')

        /** Multi img*/
        if (target.getAttribute('data-photo_2')) {

            $('.img-gallery').show()
            let photo_1 = $('#photo_1')
            let photo_2 = $('#photo_2')
            let photo_3 = $('#photo_3')
            photo_1.attr('href', target.getAttribute('data-photo_principale'))
            photo_1.css('background-image', 'url(/images/' + target.getAttribute('data-photo_principale') + ')')
            photo_2.attr('href', target.getAttribute('data-photo_2'))
            photo_2.css('background-image', 'url(/images/' + target.getAttribute('data-photo_2') + ')')

            if (target.getAttribute('data-photo_3')) {

                photo_3.show()
                photo_3.attr('href', target.getAttribute('data-photo_3'))
                photo_3.css('background-image', 'url(/images/' + target.getAttribute('data-photo_3') + ')')

            } else {

                photo_3.hide()

            }

        } else {

            $('.img-gallery').hide()

        }
        const modal = $('.product_detail')
        modal.css('opacity', '1')
        modal.css('z-index', '999999')
        modal.show()
        disabledScroll()


    })
    $('.close_window').click((e) => {
        e.preventDefault()
        const modal = $('.product_detail')
        modal.css('opacity', '0')
        modal.css('z-index', '0')
        modal.hide()
        enabledScroll()
    })

    /** Slide multi img */
    $('.img-gallery-grid > a').click((e) => {
        e.preventDefault()
        let target = e.target
        $('#photo_principale').css('background-image', 'url(/images/' + target.getAttribute('href') + ')')

    })

    /** Share */

    const shareButton = document.querySelector('#share');
    const shareDialog = document.querySelector('.share-dialog');
    const closeButton = document.querySelector('.close-button');
    if (shareButton) {
        shareButton.addEventListener('click', event => {
            let url = $(".pen-url").attr('data-value') + "/" + $(".copy-link").attr('data-ean')
            if (navigator.share) {
                navigator.share({
                    title: 'Carefour',
                    text: 'Consulter le nouveau catalogue de Carefour Martinique',
                    url: url
                }).then(() => {
                    console.log('Thanks for sharing!');
                })
                    .catch(console.error);
            } else {
                $(".copy-link").attr('data-link', location.href)

                $('.pen-url').val(url)
                let shareFb = $('#share-fb')
                let fbShareUrl = "https://www.facebook.com/sharer/sharer.php?u="
                let fbDeeplink = fbShareUrl + url
                shareFb.attr('href', fbDeeplink)
                let shareWa = $('#share-wa')
                let waShareUrl = "https://wa.me/?text="
                let waDeeplink = waShareUrl + url
                shareWa.attr('href', waDeeplink)
                shareDialog.classList.add('is-open');
            }
        });
    }
    if (closeButton) {
        closeButton.addEventListener('click', event => {
            shareDialog.classList.remove('is-open');
        });
    }
    let copyLink = document.querySelector(".copy-link")
    if (copyLink) {
        copyLink.addEventListener("click", copy);
    }

    $(".menu_btn").click((e) => {
        e.preventDefault()
        if (!$('.menu_list').hasClass('active')) {

            $('.menu_list').addClass('active')
        }
    })
    $(".link-block-15").click(() => {
        $('.menu_list').removeClass('active')
    })
    $(".product_detail").hover(disabledScroll())
    $(".section__wrapper").hover(enabledScroll())

    /** Home menu mobile */
    $(".ctg__title").click((e)=>{
        let cible = e.target.closest('.categories').children[1]
        cible.style.display = "flex"
    })
    $(".ctg__link").click((e)=>{
        let cible = e.target.closest(".ctg__menu")
        cible.style.display = ""
    })
});

function copy() {
    var copyText = document.querySelector(".pen-url");
    copyText.select();
    document.execCommand("copy");
}

window.addEventListener('scroll', (e) => {
    let body = $('body')
    if (body.attr('scroll') == 'off') {
        window.scrollTo(0, 0);
    }
})

function enabledScroll() {
    $('body').attr('scroll', 'on')
}

function disabledScroll() {
    $('body').attr('scroll', 'off')
}
function checkIframe()
{
    if ( window.self !== window.top ) {
        $('body').addClass('in_iframe')
    }
}
