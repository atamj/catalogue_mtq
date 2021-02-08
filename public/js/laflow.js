var total_sections = 0;
var num_section = 0;
var active_section = 1;
$(document).ready(function () {

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
                .css("display", "none")
                .removeClass("active left right")
                .addClass("inactive left right");
        }

    });

    var initSections = setTimeout(initializeSections, 50000);

    if (active_section > 1) {
        $("#prev")
            .removeClass("nav-inactive")
            .addClass("nav-active");
    }
    if (num_section < total_sections) {
        $("#next")
            .removeClass("nav-inactive")
            .addClass("nav-active");
    }

    $("#next").click(function () {

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

    $("#prev").click(function () {

        if ($(".active").attr("data-num") == active_section) {

            $(".active")
                .css("display", "block")
                .removeClass("active left right")
                .addClass("inactive right");

            $(".section-wrapper").each(function () {
                if ($(this).attr("data-num") == (active_section - 1)) {
                    $(this)
                        .css("display", "block")
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

    function initializeSections() {
        $(".section-wrapper").each(function () {
            $(this)
                .css("display", "block");
        });
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

});
