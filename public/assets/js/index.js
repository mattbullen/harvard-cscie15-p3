// Main page loading sequence.
$(document).ready(function() {
    highlightActiveTab();
    console.log("\nApp JS loaded.");
});

// Highlight the active menu tab
function highlightActiveTab() {
    $("#a-home").addClass("button-active");
}