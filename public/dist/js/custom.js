$( document ).ready(function() {
    alert("1");
    $(".nav-sidebar").click(function(){
        alert("2");
        $('.nav-sidebar nav-link active').toggleClass('active');
    });


});