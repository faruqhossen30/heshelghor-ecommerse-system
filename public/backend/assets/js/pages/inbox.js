/*
Template Name: Minton - Admin & Dashboard Template
Author: CoderThemes
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Inbox init js
*/

$('input:checkbox').change(function(){
    if($(this).is(":checked")) {
        $(this).parent().parent().parent().addClass("mail-selected");
    } else {
        $(this).parent().parent().parent().removeClass("mail-selected");
    }
});