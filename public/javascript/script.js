// Get all dropdown buttons
var dropdownButtons = document.querySelectorAll(".sidebar__dropdown");

// Loop through each dropdown button
dropdownButtons.forEach(function(button) {
    // Add click event listener to each dropdown button
    button.addEventListener("click", function() {
        // Toggle the active class on the clicked button
        this.classList.toggle("active");
        
        // Find the closest parent <li> element
        var parentListItem = this.closest("li");

        // Find the child element with the class .sidebar__submenu
        var submenu = parentListItem.querySelector(".sidebar__submenu");

        // Toggle the display of the submenu
        if (submenu.style.display === "block") {
            submenu.style.display = "none";
        } else {
            submenu.style.display = "block";
        }
    });
});
