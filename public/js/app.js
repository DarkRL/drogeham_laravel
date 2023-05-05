/* Custom scroll fade animation */
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting){
            $(entry.target).addClass('custom_show');
        } else {
            $(entry.target).removeClass('custom_show');
        }
    })
}
)

$('.custom_hidden').each((_, el) => observer.observe(el));
/* --- */