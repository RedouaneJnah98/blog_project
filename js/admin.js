const infos = document.querySelector(".infos");

const API_KEY = process.env.API_KEY;

function success(position) {
  let crd = position.coords;
  let { latitude, longitude } = crd;

  fetch(
    `https://api.openweathermap.org/data/2.5/onecall?lat=${latitude}&lon=${longitude}&exclude=hourly,minutely&units=metric&appid=${process.env.API_KEY}`
  )
    .then((resp) => resp.json())
    .then((data) => {
      const CurrentData = [];
      const { current } = data;
      CurrentData.push(current);

      const { timezone } = data;
      const { feels_like } = current;
      const { weather } = current;

      const desc = weather.map((item) => item.description);
      const icon = weather.map((item) => item.icon);

      // Render data
      infos.innerHTML = `
            <h5 class="zone">${timezone}</h5>
            <div class="d-flex mt-3">
                <img src=" http://openweathermap.org/img/wn/${icon}.png"  alt="icon">
                <div class="ms-2">
                    <h5><span class="degree">${feels_like}</span><span class="degree-c">°c</span></h5>
                    <h6 class="weather-desc">${desc}</h6>
                </div>
            </div>
     `;
    })
    .then((err) => {
      console.log(err);
    });
}

navigator.geolocation.getCurrentPosition(success);
