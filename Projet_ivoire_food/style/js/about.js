document.addEventListener("DOMContentLoaded", function () {
    let boxes = document.querySelectorAll(".box");
    boxes.forEach((box) => {
        box.style.opacity = "0";
        box.style.transform = "translateY(30px)";
    });

    function animateOnScroll() {
        boxes.forEach((box) => {
            let rect = box.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                box.style.opacity = "1";
                box.style.transform = "translateY(0)";
                box.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            }
        });
    }

    window.addEventListener("scroll", animateOnScroll);
    animateOnScroll();
});
