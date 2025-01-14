<?php
// Display weather data when the form is submitted

if (isset($_POST['submit'])) {
    // Validate user input
    if (empty(trim($_POST['city']))) {
        echo "Please enter a city.";
    } else {

        $city = htmlspecialchars(trim($_POST['city']));
        $api_key = "7f1b33ee7fd9092481514fe2209c78b8";
        $api_url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=$api_key";


        // Fetch data from API
        $api_data = @file_get_contents($api_url);

        if (!$api_data) {
            echo "Unable to fetch weather data. Please check the city name or try again.";
        } else {
            $weather_data = json_decode($api_data, true); // Decode JSON response

            if (isset($weather_data['cod']) && $weather_data['cod'] != 200) {
                // Display API error message
                echo "Error: " . $weather_data['message'];
            } else {
                // Display weather data in a large centered cardS
                echo "<div class='max-w-3xl mx-auto p-8 bg-white rounded-lg shadow-lg mt-10'>";
                echo "<h3 class='text-3xl font-bold text-center text-gray-800 mb-6'>Weather in " . ucfirst($city) . ":</h3>";
                echo "<p class='text-xl text-gray-700'>Temperature: " . round($weather_data['main']['temp'] - 273.15, 2) . "°C</p>";
                echo "<p class='text-xl text-gray-700'>Condition: " . $weather_data['weather'][0]['description'] . "</p>";
                echo "<p class='text-xl text-gray-700'>Humidity: " . $weather_data['main']['humidity'] . "%</p>";
                echo "</div>";
            }
        }
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <div class="max-w-3xl mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
        <h3 class="text-3xl font-bold text-center text-blue-600 mb-6">Weather App</h3>
        
        <form method="post" action="" class="space-y-6">
            <div>
                <label for="city" class="block text-lg font-semibold">Enter City:</label>
                <input type="text" name="city" id="city" placeholder="e.g., Durban" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-lg">
            </div>

            <div>
                <input type="submit" name="submit" value="Check Weather" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-300 text-lg">
            </div>
        </form>
    </div>

</body>
</html>
