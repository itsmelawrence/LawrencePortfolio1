import "./bootstrap";

// --- Global State ---
let isCooldown = false;

// --- DOMContentLoaded Master Handler ---
document.addEventListener("DOMContentLoaded", function () {
    initTypedIntro();
    initLoaderAndAOS();
    initScrollMagicHighlights();
    initScrollTriggerFades();
    initSmoothAnchorScroll();
    initBackToTopButton();
    initContextMenuBlock();
});

// ==========================
// SECTION: CONTACT FORM HANDLER
// ==========================

// ==========================
// SECTION: TYPED INTRO + GSAP
// ==========================
function initTypedIntro() {
    const introElement = document.getElementById("intro");
    if (!introElement) return;

    new Typed("#intro", {
        strings: ["Hey. Thanks for dropping by. I&apos;m Lawrence."],
        typeSpeed: 30,
        showCursor: false,
        onComplete: function () {
            runEaseUpAnimation();
            runEaseInAnimation();
        },
    });
}

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

// ==========================
// SECTION: LOADER + AOS + TIPPY + LIGHTBOX
// ==========================
function initLoaderAndAOS() {
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
        resizeDuration: 200,
        wrapAround: true,
    });
}

// ==========================
// SECTION: SCROLLMAGIC WORD HIGHLIGHT
// ==========================
function initScrollMagicHighlights() {
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
                        color:
                            scrollProgress >= wordProgress ? "#000" : "#d7d7d7",
                        duration: 0.2,
                    });
                });
            })
            .addTo(controller);
    });
}

// ==========================
// SECTION: SCROLLTRIGGER FADE-IN/OUT
// ==========================
function initScrollTriggerFades() {
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
            { opacity: 0 },
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
}

// ==========================
// SECTION: SMOOTH ANCHOR SCROLL
// ==========================
function initSmoothAnchorScroll() {
    function getSamePageAnchor(link) {
        return link.protocol === window.location.protocol &&
            link.host === window.location.host &&
            link.pathname === window.location.pathname &&
            link.search === window.location.search
            ? link.hash
            : false;
    }

    function scrollToHash(hash, e) {
        const elem = hash ? document.querySelector(hash) : null;
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
        a.addEventListener("click", (e) =>
            scrollToHash(getSamePageAnchor(a), e)
        );
    });

    scrollToHash(window.location.hash);
}

// ==========================
// SECTION: BACK TO TOP WITH PROGRESS
// ==========================
function initBackToTopButton() {
    const backToTopBtn = document.getElementById("backToTopBtn");
    if (!backToTopBtn) return;

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
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
}

// ==========================
// SECTION: BLOCK RIGHT CLICK ON MEDIA
// ==========================
function initContextMenuBlock() {
    document.addEventListener("contextmenu", (e) => {
        if (e.target.closest("video") || e.target.tagName === "IMG") {
            e.preventDefault();
        }
    });
}
