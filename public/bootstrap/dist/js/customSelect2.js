const wrapper = document.querySelector(".select-control-btn");

selectBtn = wrapper.firstElementChild;
options = options = document.querySelector(".options");

 selectBtn.addEventListener("click", () => {
        wrapper.classList.toggle("active");
 });

let letters = ["A", "B", "C", "D"];

function addLetter(selectedLetter) {
    options.innerHTML = "";
    letters.forEach((letter) => {
        let isSelected = letter == selectedLetter ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${letter}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}
addLetter();

 updateName = function (selectedLi) {
    addLetter(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.innerText = selectedLi.innerText;
 };
window.addEventListener("click", function (e) {
    if (wrapper.contains(e.target)) {
    } else {
        if (wrapper.classList.contains("active") == true) {
            wrapper.classList.toggle("active");
        }
    }
});
