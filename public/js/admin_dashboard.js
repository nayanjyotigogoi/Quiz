document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("quizChart").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Categories", "Subcategories", "Quizzes", "Users"],
            datasets: [{
                label: "Total Count",
                data: [15, 30, 50, 120], 
                backgroundColor: ["#3498db", "#2ecc71", "#e74c3c", "#f39c12"],
            }]
        }
    });
});
