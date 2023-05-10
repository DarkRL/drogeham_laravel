/* Custom scroll fade animation */
function scrollFunction(classname, repeat) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (repeat == true) {
                if (entry.isIntersecting) {
                    $(entry.target).addClass('custom_show');
                } else {
                    $(entry.target).removeClass('custom_show');
                }
            } else {
                if (entry.isIntersecting) {
                    $(entry.target).addClass('custom_show');
                }
            }
        })
    }
    )

    $(classname).each((_, el) => observer.observe(el));
}

scrollFunction('.custom_hidden_repeat', true)
scrollFunction('.custom_hidden_stay', false)
/* ------------- */