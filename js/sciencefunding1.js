// script.js

document.addEventListener("DOMContentLoaded", () => {
    const jsonUrl = '../JSON/scienceRFI.json'; // The path to your JSON file
    
    fetch(jsonUrl)
        .then(response => response.json())
        .then(data => {
            displayData(data.Project_Overviews);
            createFilterButtons(data.Project_Overviews);
        })
        .catch(error => console.error('Error loading JSON data:', error));
});

// Function to create filter buttons based on the primary goal
function createFilterButtons(data) {
    const filterContainer = document.getElementById('filter-buttons');
    const goals = Array.from(new Set(data.map(item => item['Primary goal']).filter(goal => goal && goal.trim() !== '')));

    goals.forEach(goal => {
        const button = document.createElement('button');
        button.textContent = goal;
        button.addEventListener('click', () => filterData(goal, data));
        filterContainer.appendChild(button);
        filterContainer.appendChild(button);
    });
}

// Function to filter data by primary goal
function filterData(goal, data) {
    const filteredData = data.filter(item => item['Primary goal'] === goal);
    displayData(filteredData);
}

// Function to display data in the HTML table
function displayData(data) {
    const tableBody = document.querySelector('#data-table tbody');
    tableBody.innerHTML = '';

    data.forEach(item => {
        const row = document.createElement('tr');
		
		const linkCell = item['Link to products if available'] ? `<a href="${item['Link to products if available']}">Link</a>` : '';
		
        row.innerHTML = `
            <td>${item['Point of Contact']}</td>
            <td>${item['Affiliation']}</td>
            <td>${item['Biennium']}</td>
            <td>${item['Title']}</td>
            <td>${item['Funding Source']}</td>
            <td>${item['Description (1-2 sentence overview to be on landing list)']}</td>
             <td>${linkCell}</td>
        `;

        tableBody.appendChild(row);
    });
}
