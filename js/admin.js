const sidebar = document.querySelector(".sidebar")
const sidebarBtn = document.querySelector(".sidebar-btn")
const zone = document.querySelector(".zone")
const degree = document.querySelector(".degree")
const WeaterDesc = document.querySelector(".weather-desc")

sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("active")
})

const API_KEY = "eff509ee2736ba895d780a864316c08a"

function sucess(position) {
  let crd = position.coords
  let { latitude, longitude } = crd

  fetch(
    `https://api.openweathermap.org/data/2.5/onecall?lat=${latitude}&lon=${longitude}&exclude=hourly,minutely&units=metric&appid=${API_KEY}`
  )
    .then((resp) => resp.json())
    .then((data) => {
      const CurrentData = []
      const { current } = data
      CurrentData.push(current)

      const { timezone } = data
      const { feels_like } = current
      const { weather } = current

      const desc = weather.map((item) => item.description)

      // Render data
      degree.innerHTML = feels_like
      zone.innerHTML = timezone
      WeaterDesc.innerHTML = desc

      addElement(timezone, feels_like, desc)
    })
}

navigator.geolocation.getCurrentPosition(sucess)
