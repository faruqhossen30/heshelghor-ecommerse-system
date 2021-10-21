/*
Template Name: Minton - Admin & Dashboard Template
Author: CoderThemes
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Analytics Dashboard
*/

// active counts
window.setInterval(function() {
    var ac = Math.floor(Math.random() * 352 + 142);
    $("#active-users-count").text(ac);
    $("#active-views-count").text(Math.floor(Math.random() * ac + 86));
}, 2000);

var colors = ["#3bafda"];
var dataColors = $("#usa-vectormap").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}
$('#usa-vectormap').vectorMap({
    map: 'us_merc_en',
    backgroundColor: 'transparent',
    regionStyle: {
        initial: {
            fill: colors
        }
    }
});
