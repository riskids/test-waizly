import React, { useState, useEffect } from 'react';
import axios from 'axios';

const WeatherIcons = {
    '01d': <img src="https://img.icons8.com/fluency/96/000000/sun.png"/>,
    '01n': <img src="https://img.icons8.com/fluency/96/000000/full-moon.png"/>,
    '02d': <img src="https://img.icons8.com/fluency/96/000000/partly-cloudy-day.png"/>,
    '02n': <img src="https://img.icons8.com/fluency/96/000000/partly-cloudy-night.png"/>,
    '03d': <img src="https://img.icons8.com/fluency/96/000000/moderate-rain.png"/>,
    '03n': <img src="https://img.icons8.com/fluency/96/000000/moderate-rain.png"/>,
    '04d': <img src="https://img.icons8.com/fluency/96/000000/clouds.png"/>,
    '04n': <img src="https://img.icons8.com/fluency/96/000000/partly-cloudy-night.png"/>,
    '09d': <img src="https://img.icons8.com/fluency/96/000000/partly-cloudy-rain.png"/>,
    '09n': <img src="https://img.icons8.com/fluency/96/000000/rainy-night.png"/>,
    '10d': <img src="https://img.icons8.com/fluency/96/000000/partly-cloudy-rain.png"/>,
    '10n': <img src="https://img.icons8.com/fluency/96/000000/rainy-night.png"/>,
    '11d': <img src="https://img.icons8.com/fluency/96/000000/chance-of-storm.png"/>,
    '11n': <img src="https://img.icons8.com/fluency/96/000000/stormy-night.png"/>
};

const WeatherCard = ({ city }) => {
  const [weather, setWeather] = useState();
  const API_KEY = '1472a4311f4141765f9da6846d5edbf1';

  const fetchWeather = async () => {
    try {
      const response = await axios.get(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${API_KEY}`);
      setWeather(response.data);
    } catch (error) {
      console.error('Error fetching weather data:', error.message);
    }
  };

  useEffect(() => {
    fetchWeather();
  }, [city]);

  return (
    <div className='weather-wp'>
      <div className='title-weather'>{weather?.name} -</div>
      <div className='weather-temp'>{`${Math.floor(weather?.main?.temp - 273)}°C`}</div>
      <div className='description-weather'>{weather?.weather[0]?.description}</div>
      <div className='weather-icon'>{WeatherIcons[weather?.weather[0].icon]}</div>
    </div>
  );
};

export {WeatherCard};
