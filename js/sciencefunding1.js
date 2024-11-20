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
    const goals = Array.from(new Set(data.flatMap(item => [item['Primary goal'], item['Secondary goal']]).filter(goal => goal && goal.trim() !== '')));

    // Create an 'All' button to show all items
    const allButton = document.createElement('button');
    allButton.textContent = 'All';
    allButton.addEventListener('click', () => displayData(data));
    filterContainer.appendChild(allButton);

    // Create buttons for each goal
    goals.forEach(goal => {
        const button = document.createElement('button');
        button.textContent = goal;
        button.addEventListener('click', () => filterData(goal, data));
        filterContainer.appendChild(button);
    });
}

// Function to filter data by primary or secondary goal
function filterData(goal, data) {
    const filteredData = data.filter(item => item['Primary goal'] === goal || item['Secondary goal'] === goal);
    displayData(filteredData);
}

// Function to display data in the HTML table
function displayData(data) {
    const tableBody = document.querySelector('#data-table tbody');
    tableBody.innerHTML = '';

    data.forEach(item => {
        const row = document.createElement('tr');
        
        const linkCell = item['Link to project factsheet'] ? `<a href="${item['Link to project factsheet']}">Link</a>` : '';
        
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
