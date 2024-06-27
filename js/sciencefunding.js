let jsonData;

// Function to display JSON data in a table
function displayJSONData(data) {
    const tableBody = document.querySelector('#jsonTable tbody');
    tableBody.innerHTML = ''; // Clear the table body
    data.Sheet1.forEach(item => {
        const row = document.createElement('tr');
        for (const key in item) {
            const cell = document.createElement('td');
            cell.textContent = item[key];
            if (key.startsWith('Goal')) {
                cell.classList.add('hidden');
            }
            row.appendChild(cell);
        }
        tableBody.appendChild(row);
    });
}

// Fetch JSON data from the file
async function fetchJSONData() {
    try {
        const response = await fetch('../json/testdata.json'); // Ensure the path is correct
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        jsonData = await response.json();
        displayJSONData(jsonData);
    } catch (error) {
        console.error('Error fetching JSON data:', error);
    }
}

// Filter table based on goal
function filterTable(goal) {
    if (!jsonData) return;

    if (goal === '') {
        displayJSONData(jsonData);
        return;
    }

    const filteredData = {
        Sheet1: jsonData.Sheet1.filter(item => item[goal] === 'yes')
    };
    displayJSONData(filteredData);
}

// Load data on page load
window.onload = fetchJSONData;