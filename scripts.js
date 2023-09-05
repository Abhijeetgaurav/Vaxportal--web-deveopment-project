// Get the district dropdown element
var districtDropdown = document.getElementById('districtDropdown');

// Define the districts for each state
var districtOptions = {
    'Andhra Pradesh': ['District 1', 'District 2', 'District 3'],
    'Arunachal Pradesh': ['District A', 'District B', 'District C']
    // Add more states and their respective districts here
};

// Add an event listener to detect changes in the state dropdown selection
stateDropdown.addEventListener('change', function() {
    // Enable or disable the district dropdown based on the selected state
    if (stateDropdown.value) {
        districtDropdown.disabled = false;
    } else {
        districtDropdown.disabled = true;
    }

    // Clear existing district options
    districtDropdown.innerHTML = '';

    // Get the selected state value
    var selectedState = stateDropdown.value;

    // Perform an action based on the selected state
    if (selectedState && districtOptions[selectedState]) {
        populateDistricts(districtOptions[selectedState]);
    } else {
        districtDropdown.disabled = true;
    }
});

// Function to populate the district options
function populateDistricts(districts) {
    for (var i = 0; i < districts.length; i++) {
        var option = document.createElement('option');
        option.text = districts[i];
        option.value = districts[i];
        districtDropdown.appendChild(option);
    }
}

// Rest of your code...
// Get the search box element and the state dropdown element
var searchBox = document.getElementById('searchBox');
var stateDropdown = document.getElementById('stateDropdown');

// Add an event listener to detect changes in the state dropdown selection
stateDropdown.addEventListener('change', function() {
    // Get the selected state value
    var selectedState = stateDropdown.value;

    // Perform an action based on the selected state
    if (selectedState) {
        // Replace this code with your desired action, such as making an API call or displaying information
        console.log('Selected state:', selectedState);
    }
});

// Add an event listener to detect the form submission
document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get the search query and selected state
    var searchQuery = searchBox.value;
    var selectedState = stateDropdown.value;

    // Perform an action based on the search query and selected state
    if (searchQuery && selectedState) {
        // Replace this code with your desired action, such as making an API call or displaying search results
        console.log('Search query:', searchQuery);
        console.log('Selected state:', selectedState);
    }
});
