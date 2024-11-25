// script.js

console.log('Script loaded'); // Initialization log to check if the script runs

document.addEventListener("DOMContentLoaded", () => {
    console.log('DOM fully loaded and parsed'); // Log to ensure DOM is ready
    const jsonUrl = '../JSON/scienceRFI.json'; // The path to your JSON file
    
    const tableTitleDiv = document.getElementById('custom-table-title');
    if (tableTitleDiv) {
        console.log('Found #custom-table-title element'); // Log if element is found
        // Force display in case it is hidden by CSS
        tableTitleDiv.style.display = 'block';
        tableTitleDiv.style.visibility = 'visible';
        tableTitleDiv.style.opacity = '1';
        tableTitleDiv.innerHTML = "<h2><strong>Currently Displaying: </strong> All</h2>"; // Set initial content to display "All"
    } else {
        console.error('Did not find #custom-table-title element'); // Log if element is missing
    }

    fetch(jsonUrl)
        .then(response => {
            console.log('Fetching JSON data...');
            return response.json();
        })
        .then(data => {
            console.log('JSON data loaded', data); // Log loaded data
            displayData(data.Project_Overviews);
            createFilterButtons(data.Project_Overviews);
            setupTableHeaders(data.Project_Overviews);
        })
        .catch(error => console.error('Error loading JSON data:', error));
});

// Function to create filter buttons based on the primary goal
function createFilterButtons(data) {
    console.log('Creating filter buttons...'); // Log when creating filter buttons
    const filterContainer = document.getElementById('filter-buttons');
    const goals = Array.from(new Set(data.flatMap(item => [item['Primary goal'], item['Secondary goal']]).filter(goal => goal && goal.trim() !== '')));

    // Create an 'All' button to show all items
    const allButton = document.createElement('button');
    allButton.textContent = 'All';
    allButton.classList.add('btn', 'btn-default');
    allButton.addEventListener('click', () => {
        console.log('All button clicked'); // Log when 'All' button is clicked
        setTableTitle('All');
        displayData(data);
    });
    filterContainer.appendChild(allButton);

    // Create buttons for each goal
    goals.forEach(goal => {
        const button = document.createElement('button');
        button.textContent = goal;
        button.classList.add('btn', 'btn-default');
        button.addEventListener('click', () => {
            console.log(`Button clicked for goal: ${goal}`); // Log when a specific goal button is clicked
            if (goal && typeof goal === 'string' && goal.trim() !== '') {
                console.log(`Calling setTableTitle() with goal: '${goal}'`); // Log before calling setTableTitle
                setTableTitle(goal);
            } else {
                console.warn('Goal is empty or invalid, skipping setTableTitle');
            }
            filterData(goal, data);
        });
        filterContainer.appendChild(button);
    });
}

// Function to set the table title based on the selected button
function setTableTitle(title) {
    console.log("Setting table title to:", title); // Debugging log
    const tableTitleDiv = document.getElementById('custom-table-title');

    if (!title || typeof title !== 'string' || title.trim() === '') {
        console.warn('Title is empty or invalid, setting default title');
        title = 'Unknown Goal';
    }

    if (tableTitleDiv) {
        console.log('Setting innerHTML for #custom-table-title with:', title); // Added more specific log
        tableTitleDiv.style.display = 'block'; // Ensure it is not hidden
        tableTitleDiv.style.visibility = 'visible';
        tableTitleDiv.style.opacity = '1';
        tableTitleDiv.innerHTML = `<h2><strong>Currently Displaying:</strong> ${title.trim()}</h2>`;
        console.log("Title set successfully to:", title.trim());
    } else {
        console.error("Table title div not found");
    }
}

// Function to filter data by primary or secondary goal
function filterData(goal, data) {
    console.log(`Filtering data for goal: ${goal}`); // Log when filtering data
    if (!goal || typeof goal !== 'string' || goal.trim() === '') {
        console.warn('Goal is empty or invalid, skipping filtering');
        return;
    }
    goal = goal.trim(); // Ensure the goal is properly trimmed
    const filteredData = data.filter(item => {
        const primaryGoalMatch = item['Primary goal'] && item['Primary goal'].trim() === goal;
        const secondaryGoalMatch = item['Secondary goal'] && item['Secondary goal'].trim() === goal;
        return primaryGoalMatch || secondaryGoalMatch;
    });
    console.log(`Filtered data count for goal '${goal}': ${filteredData.length}`); // Log filtered data count
    displayData(filteredData);
}

// Function to display data in the HTML table
function displayData(data) {
    console.log('Displaying data...', data); // Log when displaying data
    const tableBody = document.querySelector('#data-table tbody');
    tableBody.innerHTML = '';

    data.forEach(item => {
        // Skip rows where essential fields are undefined or empty
        if (!item['Title'] || item['Title'].trim() === '') {
            console.warn('Skipping row with missing Title');
            return;
        }

        const row = document.createElement('tr');
        
        const linkCell = item['Link to project factsheet'] ? `<a href="${item['Link to project factsheet']}">Link</a>` : '';
        
        row.innerHTML = `
            <td><strong>${item['Title']}</strong></td>
            <td>${item['Description (1-2 sentence overview to be on landing list)'] || 'N/A'}</td>
            <td>${item['Point of Contact'] || 'N/A'}</td>
            <td>${item['Affiliation'] || 'N/A'}</td>
            <td>${item['Biennium'] || 'N/A'}</td>
            <td>${item['Funding Source'] || 'N/A'}</td>
            <td>${linkCell}</td>
        `;

        tableBody.appendChild(row);
    });
}

// Function to setup clickable table headers for sorting
function setupTableHeaders(data) {
    console.log('Setting up table headers for sorting...');
    const headers = document.querySelectorAll('#data-table thead th');
    const headerKeys = [
        'Title', 
        'Description (1-2 sentence overview to be on landing list)', 
        'Point of Contact', 
        'Affiliation', 
        'Biennium', 
        'Funding Source',
        'Link to project factsheet'
    ];

    headers.forEach((header, index) => {
        let sortOrder = 1; // 1 for ascending, -1 for descending
        header.addEventListener('click', () => {
            const key = headerKeys[index];
            console.log(`Sorting by column: ${key}`);
            const sortedData = [...data].sort((a, b) => {
                const aValue = a[key] ? a[key].toString().toLowerCase() : '';
                const bValue = b[key] ? b[key].toString().toLowerCase() : '';
                if (aValue < bValue) return -1 * sortOrder;
                if (aValue > bValue) return 1 * sortOrder;
                return 0;
            });
            sortOrder *= -1; // Toggle sorting order
            displayData(sortedData);
        });
    });
}
