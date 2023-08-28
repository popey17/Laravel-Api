import './bootstrap';

// Get the current URL path (excluding the base URL)
const currentURL = window.location.pathname;

// Find and add the 'active' class to the appropriate navigation item
const activePage = window.location.pathname;
console.log("activepage:",activePage);
const navLink = document.querySelectorAll('.side-nav-items a');

navLink.forEach(link => {
    const linkPath = link.pathname;
    if (activePage.includes(linkPath)) {
        console.log("linkpath:"+linkPath);
        link.parentNode.classList.add('active');
    }
});

$(document).ready(function() {
    $('.view-details').click(function() {
        var productId = $(this).data('id');
        $.get('/products/' + productId, function(data) {
            $('#detailPopup').attr('style', '');
            $('#detailPopup').html(data);
            $('#detail').show();
        });
    });
    
    $('#detailPopup').on('click', function() {
        $(this).hide();
    });
});