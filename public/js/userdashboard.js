document.addEventListener("DOMContentLoaded", function () {
    console.log("Dashboard Loaded!");

    // Logout Confirmation
    const logoutForms = document.querySelectorAll(".logout-form");

    logoutForms.forEach(form => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to log out?")) {
                this.submit();
            }
        });
    });

    // Sidebar Toggle for Mobile
    const sidebar = document.querySelector(".sidebar");
    const toggleSidebarBtn = document.createElement("button");
    toggleSidebarBtn.innerText = "☰";
    toggleSidebarBtn.classList.add("sidebar-toggle");

    toggleSidebarBtn.addEventListener("click", function () {
        sidebar.classList.toggle("show-sidebar");
    });

    document.body.prepend(toggleSidebarBtn);
});
