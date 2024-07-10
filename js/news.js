
   async function loadNewsReleases() {
    const response = await fetch('json/newsreleases.json');
    const data = await response.json();
    displayNewsReleases(data["news-releases"]);
}

function displayNewsReleases(releases) {
    const container = document.getElementById('news-releases');
    const table = document.createElement('table');
    table.classList.add('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    // Create table headers
    const headerRow = document.createElement('tr');
    const headers = ['Date', 'Link'];
    headers.forEach(headerText => {
        const header = document.createElement('th');
        header.textContent = headerText;
        headerRow.appendChild(header);
    });
    thead.appendChild(headerRow);

    // Create table rows
    for (const release of Object.values(releases)) {
        const row = document.createElement('tr');
        
        const dateCell = document.createElement('td');
        const dateParagraph = document.createElement('p');
        dateParagraph.textContent = release.date;
        dateCell.appendChild(dateParagraph);
        
        const linkCell = document.createElement('td');
        const linkParagraph = document.createElement('p');
        linkParagraph.innerHTML = release.link;
        linkCell.appendChild(linkParagraph);
        
        row.appendChild(dateCell);
        row.appendChild(linkCell);
        tbody.appendChild(row);
    }

    table.appendChild(thead);
    table.appendChild(tbody);
    container.appendChild(table);
}

// Load the news releases when the page loads
window.onload = loadNewsReleases;
