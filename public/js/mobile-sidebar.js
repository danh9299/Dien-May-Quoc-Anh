/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openSidebar() {
    document.getElementById("mobileSidebar").style.width = "70%";

    document.getElementById("closeSidebar").style.display = "block";
    document.getElementById("openSidebar").style.display = "none";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeSidebar() {
    document.getElementById("mobileSidebar").style.width = "0";
    document.getElementById("openSidebar").style.left = "0";
    document.getElementById("closeSidebar").style.display = "none";
    document.getElementById("openSidebar").style.display = "block";
}
