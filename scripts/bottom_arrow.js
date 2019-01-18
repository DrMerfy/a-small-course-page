const arrow = document.getElementById('bottom-arrow');

// Disable the arrow
arrow.classList = 'none';

// Show the arrow for going to the top only when it is needed
document.getElementsByTagName('body')[0].onscroll = (event) => {
    if (window.scrollY > 100)
        arrow.classList = '';

    if (window.scrollY < 100)
        arrow.classList = 'none';
}

// Scroll the viwport back to the top
function scrollToTop() {
    window.scrollTo({
        behavior: "smooth",
        top: 0
    });
}