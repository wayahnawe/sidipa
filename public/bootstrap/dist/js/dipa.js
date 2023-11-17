const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");
const searchBox = document.querySelector(".search-box input");

const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", () => {
    optionsContainer.classList.toggle("active");
});

optionsList.forEach((o) => {
    o.addEventListener("click", () => {
        selected.innerHTML = o.querySelector("label").innerHTML;
        option.classList.add("selected");
        optionsContainer.classList.remove("active");
    });
});

searchBox.addEventListener("keyup", function(e) {
  filterList(e.target.value);
});

const filterList = (searchTerm) => {
    searchTerm = searchTerm.toLowerCase();
    console.log(searchTerm);
    optionsList.forEach((option) => {
        let label =
            option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
            console.log(label);
        }
    });
};
