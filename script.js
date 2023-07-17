document.addEventListener("DOMContentLoaded", function () {
    // Sample data for the pie chart
    const data = {
        labels: ["Category 1", "Category 2", "Category 3"],
        datasets: [{
            data: [30, 20, 50],
            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
            hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
        }]
    };

    // Chart configuration
    const options = {
        responsive: true,
        maintainAspectRatio: false
    };

    // Create and display the pie chart
    const pieChart = new Chart(document.getElementById("pie-chart"), {
        type: "pie",
        data: data,
        options: options
    });
});
