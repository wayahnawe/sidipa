const wrapperAll = document.querySelectorAll(".select-btn");

wrapperAll.forEach((wrapper) => {
    const selectedContainer = wrapper.parentElement;
    const optionsContainer = wrapper.nextElementSibling;
    const optionList = optionsContainer.firstElementChild;

    wrapper.addEventListener("click", () => {
        if (selectedContainer.classList.contains("active")) {
            selectedContainer.classList.toggle("active");
            optionList.classList.toggle("active");
        } else {
            let currentActive = document.querySelector(
                ".select-control-btn.active"
            );
            if (currentActive) {
                currentActive.classList.toggle("active");
                let OptionActive = document.querySelector(".options.active");
                if (OptionActive) {
                    OptionActive.classList.toggle("active");
                }
            }
            selectedContainer.classList.toggle("active");
            optionList.classList.toggle("active");
        }
        // console.log(optionList);
    });

    // optionList.addEventListener("click", () => {
    //     let CurrentOptionList = document.querySelector(".options.active");
    //     console.log(CurrentOptionList);
    // });
    function addOptionLi(selectedLetter) {
        let CurrentOptionList = document.querySelector(".options.active");
        let letters = ["A", "B", "C", "D"];

        optionList.innerHTML = "";
        letters.forEach((letter) => {
            let li = `<li onclick="updateName(this)">${letter}</li>`;
            optionList.insertAdjacentHTML("beforeend", li);
        });
        if (CurrentOptionList) {
            CurrentOptionList.innerHTML = "";
            letters.forEach((letter) => {

                let li = `<li onclick="updateName(this)">${letter}</li>`;
                CurrentOptionList.insertAdjacentHTML("beforeend", li);
            });
        }


        if (wrapper.firstElementChild.innerHTML != "Pilih Salah Satu"){
            // optionList.classList.toggle("active");
            console.log(optionList);
        };

    }
    addOptionLi();
    updateName = function (selectedLi) {
        let SelectActive = document.querySelector(".select-control-btn.active");
        let OptionsActive = document.querySelector(".options.active");
        addOptionLi(selectedLi.innerText);

        SelectActive.firstElementChild.firstElementChild.innerText =
            selectedLi.innerText;

        SelectActive.classList.toggle("active");
        OptionsActive.classList.toggle("active");
    };

    window.addEventListener("click", function (e) {
        let SelectActive = document.querySelector(".select-control-btn.active");
        let OptionsActive = document.querySelector(".options.active");
        if (wrapper.contains(e.target)) {
        } else {
            if (selectedContainer.classList.contains("active") == true) {
                selectedContainer.classList.toggle("active");
            }
            if (optionList.classList.contains("active") == true) {
                optionList.classList.toggle("active");
            }
        }
    });
});
