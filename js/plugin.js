$(document).ready(function() {
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15,
    });
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('.modal').modal();
});
