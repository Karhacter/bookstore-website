const listitem = document.querySelectorAll(".item-sub");
listitem.forEach((hdlitem) => {
    hdlitem.addEventListener("click", function (e) {
        hdlitem.classList.toggle("active");
    });
});
