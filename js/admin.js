const sidebar = document.querySelector(".sidebar")
const sidebarBtn = document.querySelector(".sidebar-btn")

sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("active")
})
