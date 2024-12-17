<?php
if (isset($_POST['submit'])) {
    // Validate user input
    if (empty(trim($_POST['city']))) {
        echo "Please enter a city.";
    } else {
        $city = htmlspecialchars(trim($_POST['city'])); // Sanitize input
        $api_key = "7f1b33ee7fd9092481514fe2209c78b8"; // Replace with a valid OpenWeatherMap API key
        $api_url = "https://api.openweathermap.org/data/2.5/weather?q=".urlencode($city)."&appid=$api_key";

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
                // Display weather data
                echo "<h3>Weather in " . ucfirst($city) . ":</h3>";
                echo "Temperature: " . round($weather_data['main']['temp'] - 273.15, 2) . "°C<br>";
                echo "Condition: " . $weather_data['weather'][0]['description'] . "<br>";
                echo "Humidity: " . $weather_data['main']['humidity'] . "%<br>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
</head>
<body>
    <h3>Weather App</h3>
    <form method="post" action="">
        <label for="city">Enter City:</label>
        <input type="text" name="city" id="city" placeholder="e.g., Durban" required>
        <input type="submit" name="submit" value="Check Weather">
    </form>
</body>
</html>
