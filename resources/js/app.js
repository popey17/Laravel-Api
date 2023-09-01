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

    fetch_customer_data();

    function fetch_customer_data(query = '') {
        $.ajax({
            url:"/action",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('tbody').html(data.table_data);
            }
        })
    }

    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });

    $("tbody").on('click','.view-details',function(){
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

    $("tbody").on('click','.edit',function(){
        var productId = $(this).data('id');
        $.get('/products/edit/' + productId, function(data) {
            $('#editPopup').attr('style', '');
            $('#editPopup').html(data);
            $('#editForm').show();
        });
    });
    $('#editPopup').on('click', function(e) {
        if(e.target === this)
        $(this).hide();
    });

    $('#editPopup').on('click','.cancelBtn', function(e) {
        console.log('hello');
        $('#editPopup').hide();
    });

    $(document).on('click','.del',function(e){
        e.preventDefault()
        var  id = $(this).data('id')
        $('#delete_id').val(id)
        $('#delModel').modal('show')

    })

    $(document).on('click','.close',function(e){
        e.preventDefault();
        $('#delModel').modal('hide')
    })

    $(document).on('click','.categoryDel',function(e){
        console.log('hello');
        e.preventDefault()
        var  id = $(this).data('id')
        $('#categoryId').val(id)
        $('#deleteCategoryModel').modal('show')

    })


});

