// Main page loading sequence.
$(document).ready(function() {
    console.log("\nApp JS loaded.");
    getUsers();
});

// Get the form values for the POST request to the server.
function getFormValues() {
    var values = {};
    $("input").each(function() {
        values[this.name] = this.value;
    });
    // if (values["include-numbers"] === "false") { values["quantity-numbers"] = "0"; }
    // if (values["include-special"] === "false") { values["quantity-special"] = "0"; }
    console.log("\nPOST:", values);
    return values;
}

// Set the password request and modal display functionality.
function getUsers() {
    
    // Set up the CSRF token.
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
    
    // AJAX request for a new password.
    // $("#generate-button").on("click", function generatePasswordRequest() {
        // showLoadingGIF(); 
        $.ajax({
            type: "POST",
            url: "/users",
            data: "", // getFormValues(),
            success: function(response) {
                console.log("\nResponse:", response);
                // var users = atob(response.users);
                // console.log("\nDecoded:", users);
                if (response.users) {
                    // showSuccessMessage(users);
                } else {
                    // showErrorMessage();
                }
                // hideLoadingGIF();
            },
            error: function(error) {
                console.log("\nError:", error);
                // showErrorMessage();
                // hideLoadingGIF();
            }
        });
    // });

    // Remove the password from the page HTML when the modal is closed.
    // $("a.close-reveal-modal").on("click", function closeModal() {
    //     window.setTimeout(function() { $(".password").html(""); }, 500);
    // });
}