//homepage auto update for boards dates
document.addEventListener('DOMContentLoaded', () => {
    const divs = [
        document.getElementById('calendar1'),
        document.getElementById('calendar2'),
        document.getElementById('calendar3'),
		document.getElementById('calendar4')
    ];

    const currentDate = new Date();

    fetch('../json/2024-hp-calendar.json')
        .then(response => response.json())
        .then(jsonData => {
          
            const upcomingMeetings = jsonData['2024 PSP Public Boards Calendar']
                .filter(entry => new Date(entry['Meeting Date']) > currentDate)
                .slice(0, 4);

           upcomingMeetings.forEach((entry, index) => {
                const content = `
                    <div class="calbox-date">${entry['Meeting Date.1']}</div>
					<divclass="calbox-text">${entry['Board']}</div> 
                `;
                divs[index].innerHTML += content;
            });

        })
        .catch(error => {
            alert('Error loading data: ' + error);
        });
});// JavaScript Document