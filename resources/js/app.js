import "./bootstrap";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Toggle Navbar Responsive
const toggle = document.getElementById("toggle");
toggle.addEventListener("click", function () {
    document.getElementById("navList").classList.toggle("slide");
});

// Change the width and height in the icon toggle when the screen width is that of a tablet screen.
const widthOfScreen = window.innerWidth;
if (widthOfScreen >= 768) {
    document.getElementById("iconToggle").setAttribute("width", "36");
    document.getElementById("iconToggle").setAttribute("height", "36");
}

// Scroll Navbar
document.onreadystatechange = function () {
    let lastScrollPosition = 0;
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", function (e) {
        lastScrollPosition = window.scrollY;

        if (lastScrollPosition > 50) {
            navbar.classList.add(
                "transition-all",
                "duration-500",
                "shadow-lg",
                "bg-champagne",
                "backdrop-blur"
            );
            navbar.classList.remove("bg-transparent");
        } else {
            navbar.classList.add(
                "transition-all",
                "duration-500",
                "bg-transparent"
            );
            navbar.classList.remove(
                "shadow-lg",
                "bg-champagne",
                "backdrop-blur"
            );
        }
    });
};

// OTP
document.addEventListener("DOMContentLoaded", function (event) {
    function OTPInput() {
        const inputs = document.querySelectorAll("#otp > *[id]");
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener("keydown", function (event) {
                if (event.key === "Backspace") {
                    inputs[i].value = "";
                    if (i !== 0) inputs[i - 1].focus();
                } else {
                    if (i === inputs.length - 1 && inputs[i].value !== "") {
                        return true;
                    } else if (event.keyCode > 47 && event.keyCode < 58) {
                        inputs[i].value = event.key;
                        if (i !== inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    } else if (event.keyCode > 64 && event.keyCode < 91) {
                        inputs[i].value = String.fromCharCode(event.keyCode);
                        if (i !== inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    }
                }
            });
        }
    }
    OTPInput();
});

// Text Elipsis via javascript

function shortenText(elementSelector, maxLength, elipsis) {
    let elements = document.querySelectorAll(elementSelector);

    elements.forEach(function (element) {
        let textContent = element.textContent.trim();

        if (textContent.length > maxLength) {
            if (elipsis) {
                let shortenedContent =
                    textContent.substring(0, maxLength) + " ...";
                element.textContent = shortenedContent;
            } else {
                let shortenedContent = textContent.substring(0, maxLength);
                element.textContent = shortenedContent;
            }
        }
    });
}

shortenText(".report-title", 15, true);
shortenText(".report-body", 60, true);
shortenText(".detail-title", 28, false);
