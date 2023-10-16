
// Fetch all the necessary data when the page loads
window.addEventListener('load', () => {
    fetch('/api/v1/static-data')
        .then(response => response.json())
        .then(data => {
            localStorage.setItem('staticData', JSON.stringify(data))
            localStorage.setItem('staticDataTimestamp', Date.now())
        })
        .catch(error => console.error("Error!", error))
})

