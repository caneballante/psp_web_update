
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display JSON Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="filter-buttons">
    <button onclick="filterTable('Goal1')">Goal1</button>
    <button onclick="filterTable('Goal2')">Goal2</button>
    <button onclick="filterTable('Goal3')">Goal3</button>
    <button onclick="filterTable('Goal4')">Goal4</button>
    <button onclick="filterTable('Goal5')">Goal5</button>
    <button onclick="filterTable('')">Show All</button>
</div>

<h2>JSON Data Display</h2>
<table id="jsonTable">
    <thead>
        <tr>
            <th>Sponsor</th>
            <th>Entity</th>
            <th>Date</th>
            <th>Title</th>
            <th>Grant</th>
            <th>Description</th>
            <th>Goal1</th>
            <th>Goal2</th>
            <th>Goal3</th>
            <th>Goal4</th>
            <th>Goal5</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    // Function to display JSON data in a table
    function displayJSONData(data) {
        const tableBody = document.querySelector('#jsonTable tbody');
        data.Sheet1.forEach(item => {
            const row = document.createElement('tr');
            for (const key in item) {
                const cell = document.createElement('td');
                cell.textContent = item[key];
                row.appendChild(cell);
            }
            tableBody.appendChild(row);
        });
    }

    // Fetch JSON data from the file
    async function fetchJSONData() {
        try {
            const response = await fetch('testdata.json'); // Ensure the path is correct
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const jsonData = await response.json();
            displayJSONData(jsonData);
        } catch (error) {
            console.error('Error fetching JSON data:', error);
        }
    }

    // Load data on page load
    window.onload = fetchJSONData;
</script>

</body>
</html>
