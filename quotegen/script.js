const quoteContainer = document.getElementById('quote');
const authorContainer = document.getElementById('author');

function fetchQuote() {
    fetch('/learn-PHP/quotegen/api.php') 
        .then(response => response.json())
        .then(data => {
            // ! change the background of the div
            const quoteBody = document.querySelector('.quote-container');
            console.log(data);
            quoteBody.style.backgroundColor = data.color1;  // Fix typo in "backgroundColor"
            quoteContainer.innerHTML = data.quote;
            authorContainer.innerHTML = data.author;
            // Apply text color for the quote text
            quoteContainer.style.color = data.text_color;
        })
        .catch(error => {
            console.error('Error fetching quote:', error);
            // Handle error, e.g., display an error message
        });
}

// Initial fetch and subsequent periodic fetches
fetchQuote();
setInterval(fetchQuote, 10000); // Fetch every 10 seconds
