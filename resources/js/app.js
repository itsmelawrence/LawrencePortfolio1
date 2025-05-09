import "./bootstrap";

// Libraries loaded via HTML tags in index.html or equivalent:
// - GSAP + plugins
// - ScrollMagic + indicators
// - Tippy.js
// - AOS
// - Lightbox2
// - Typed.js
// - jQuery

// --- Contact Form Handler ---
let isCooldown = false;

$("#contactForm").on("submit", function (e) {
    e.preventDefault();

    if (isCooldown) {
        $("#responseMessage").html(
            '<div class="alert alert-warning">Please wait before submitting again.</div>'
        );
        setTimeout(() => {
            $("#responseMessage").fadeOut("slow", function () {
                $(this).html("").show();
            });
        }, 3000);
        return;
    }

    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: "{{ url('/') }}",
        method: "POST",
        data: $(this).serialize() + "&_token=" + csrfToken,
        beforeSend: function () {
            $("#submitBtn").prop("disabled", true);
        },
        success: function (response) {
            $("#nameError, #emailError, #phoneError, #messageError").text("");
            $("#responseMessage").html(
                '<div class="alert alert-success">' +
                    response.message +
                    "</div>"
            );
            $("#contactForm")[0].reset();
            setTimeout(() => {
                $("#responseMessage").fadeOut("slow", function () {
                    $(this).html("").show();
                });
            }, 5000);

            isCooldown = true;
            setTimeout(() => {
                isCooldown = false;
                $("#submitBtn").prop("disabled", false);
            }, 10000);
        },
        error: function (response) {
            let errors = response.responseJSON?.errors;
            $("#nameError, #emailError, #phoneError, #messageError").text("");
            if (errors) {
                if (errors.name) $("#nameError").text(errors.name[0]);
                if (errors.email) $("#emailError").text(errors.email[0]);
                if (errors.phone) $("#phoneError").text(errors.phone[0]);
                if (errors.message) $("#messageError").text(errors.message[0]);
            } else {
                $("#responseMessage").html(
                    '<div class="alert alert-danger">Something went wrong. Please try again.</div>'
                );
            }
            $("#submitBtn").prop("disabled", false);
        },
    });
});

// --- Typed.js Intro + GSAP Animations ---
var typed = new Typed("#intro", {
    strings: ["Hey. Thanks for dropping by. I&apos;m Lawrence."],
    typeSpeed: 30,
    showCursor: false,
    onComplete: function () {
        runEaseUpAnimation();
        runEaseInAnimation();
    },
});

function runEaseUpAnimation() {
    gsap.to(".nav-text", {
        duration: 1,
        opacity: 1,
        y: 0,
        stagger: 0.3,
        ease: "power2.out",
    });
}

function runEaseInAnimation() {
    gsap.to(".scroll-down-t", {
        duration: 2,
        opacity: 1,
        y: 0,
        stagger: 0.3,
    });
}

// --- Disable Right Click for Images & Videos ---
document.addEventListener("contextmenu", (e) => {
    if (e.target.closest("video") || e.target.tagName === "IMG") {
        e.preventDefault();
    }
});

// --- On DOM Load ---
window.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById("loader");
    setTimeout(() => {
        loader.classList.add("fade-out");
        setTimeout(() => loader.remove(), 600);
    }, 500);

    tippy(".links-container-icons", {
        animation: "fade",
        placement: "top",
        delay: [100, 50],
    });

    AOS.init({
        duration: 1000,
        once: true,
    });

    lightbox.option({
        disableScrolling: true,
    });
});

// --- ScrollMagic for Highlighting Words ---
const controller = new ScrollMagic.Controller();
document.querySelectorAll(".right-info-holder").forEach((section) => {
    const words = section.querySelectorAll(".desc-text");
    const totalWords = words.length;
    new ScrollMagic.Scene({
        triggerElement: section,
        triggerHook: 0.8,
        duration: "50%",
    })
        .on("progress", (event) => {
            const scrollProgress = event.progress;
            words.forEach((word, index) => {
                const wordProgress = (index + 1) / totalWords;
                gsap.to(word, {
                    opacity: 1,
                    color: scrollProgress >= wordProgress ? "#000" : "#d7d7d7",
                    duration: 0.2,
                });
            });
        })
        .addTo(controller);
});

// --- ScrollTrigger Fade Effects ---
gsap.registerPlugin(ScrollTrigger);

gsap.to(".fade-out-container", {
    opacity: 0,
    stagger: 0.8,
    duration: 1,
    scrollTrigger: {
        trigger: ".fade-out-container",
        start: "top 10%",
        end: "top 50%",
        scrub: 1,
        markers: false,
    },
});

gsap.utils.toArray(".fade-in-viewc").forEach((el) => {
    gsap.fromTo(
        el,
        {
            opacity: 0,
        },
        {
            opacity: 1,
            scrollTrigger: {
                trigger: el,
                start: "top 80%",
                end: "top 30%",
                scrub: true,
                toggleActions: "play none none reverse",
            },
        }
    );
});

// --- Anchor Scroll Animation ---
function getSamePageAnchor(link) {
    if (
        link.protocol !== window.location.protocol ||
        link.host !== window.location.host ||
        link.pathname !== window.location.pathname ||
        link.search !== window.location.search
    )
        return false;
    return link.hash;
}

function scrollToHash(hash, e) {
    const elem = hash ? document.querySelector(hash) : false;
    if (elem) {
        if (e) e.preventDefault();
        gsap.to(window, {
            scrollTo: elem,
            duration: 2.5,
            ease: "power2.out",
        });
    }
}

document.querySelectorAll("a[href]").forEach((a) => {
    a.addEventListener("click", (e) => scrollToHash(getSamePageAnchor(a), e));
});
scrollToHash(window.location.hash);

// --- Back to Top Button with Scroll Progress ---
const backToTopBtn = document.getElementById("backToTopBtn");
window.addEventListener("scroll", () => {
    const scrollTop =
        document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight =
        document.documentElement.scrollHeight -
        document.documentElement.clientHeight;
    const scrollPercent = (scrollTop / scrollHeight) * 100;

    if (scrollPercent > 5) {
        backToTopBtn.classList.add("show");
    } else {
        backToTopBtn.classList.remove("show");
    }
    backToTopBtn.style.background = `conic-gradient(#7b4f2d ${scrollPercent}%, #2a2a2a ${scrollPercent}%)`;
});

backToTopBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});
