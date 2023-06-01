let sidebar = document.querySelector(".sidebar")
let sidebarBtn = document.querySelector(".btn-sidebar")

sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close")
})
