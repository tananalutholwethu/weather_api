# Weather App

This is a simple weather app that fetches real-time weather data using the [OpenWeatherMap API](https://openweathermap.org/api). 
This project was created while learning about how APIs work, specifically focusing on how to interact with an API to retrieve and display data on a webpage.


 Features

- Enter a city name to get current weather details.
- Displays:
  - Temperature (Celsius)
  - Weather condition (e.g., sunny, cloudy)
  - Humidity percentage
- Styled with [Tailwind CSS](https://tailwindcss.com/) for a clean, responsive layout.

Setup

1. Clone the repository:
 
   git clone https://github.com/your-username/weather-app.git


2. Navigate to the project directory:

   cd weather-app


3. Ensure PHP is installed on your system.

4. Get an API key from [OpenWeatherMap](https://openweathermap.org/api). Then, replace the `api_key` variable in the PHP file with your key:

   $api_key = "YOUR_API_KEY";


5. Serve the project on a local web server (e.g., XAMPP, WAMP, or any PHP server).

6. Open the app in your browser and start checking the weather.

 How it Works
1. The user enters a city name in the input form.
2. The form sends the city name to the PHP script.
3. The PHP script fetches weather data from OpenWeatherMap.
4. The data is displayed in a clean card layout.

Technologies Used
- **PHP** for backend API interaction.
- **OpenWeatherMap API** for weather data.
- **Tailwind CSS** for frontend styling.

Future Improvements
- Allow users to toggle between Celsius and Fahrenheit.
- Show additional details like wind speed and pressure.
- Handle errors (e.g., invalid city names).

License
This project is open-source and available under the [MIT License](LICENSE).
