document.addEventListener("DOMContentLoaded", () => {
  const selectDrop = document.querySelector("#countries")

  fetch("https://countriesnow.space/api/v0.1/countries/")
    .then((res) => {
      return res.json()
    })
    .then((data) => {
      let output = ""
      const { data: countries } = data
      const country = countries.map((data) => {
        const singleCountry = data.country
        output += `<option name='country'>${singleCountry}</option>`
      })

      selectDrop.innerHTML = output
    })
    .catch((err) => {
      console.log(err)
    })
})

const closeBtn = document.querySelector(".close-btn")

closeBtn.addEventListener("click", () => {
  const redirectPage = "http://localhost/blog_project/"

  return window.location.replace(redirectPage)
})

const errorMsg = document.querySelectorAll(".msg")
console.log(errorMsg)

errorMsg.forEach((message) => {
  message.classList.add("shake")
})
