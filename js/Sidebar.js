
const body = document.querySelector('body'),
sidebar = body.querySelector('nav'),
toggle = body.querySelector(".toggle");
function OpenOrClose() {
  toggle.addEventListener("click" , () =>{

    sidebar.classList.toggle("close");

  })

}
function search() {
  searchBtn.addEventListener("click" , () =>{sidebar.classList.remove("close");})
}