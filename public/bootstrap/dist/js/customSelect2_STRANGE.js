const wrapperAll = document.querySelectorAll(".select-control-btn");

wrapperAll.forEach((wrapper) => {
    selectBtn = wrapper.firstElementChild;
    options = wrapper.lastElementChild.firstElementChild;

    selectBtn.addEventListener("click", () => {
        wrapper.classList.toggle("active");
        let currentActive = document.querySelector(
            ".select-control-btn.active"
        );
        currentOptions = currentActive.lastElementChild.firstElementChild;
        let letters = ["A", "B", "C", "D"];
        console.log(currentOptions);

        // options2 = currentActive.lastElementChild.firstChild;
        // let letters = ["A", "B", "C", "D"];
        function addLetter(selectedLetter) {
            currentOptions.innerHTML = "";
            letters.forEach((letter) => {
                let isSelected = letter == selectedLetter ? "selected" : "";
                let li = `<li onclick="updateName(this)" class="${isSelected}">${letter}</li>`;
                // let li = `<li onclick="updateName(this)">${letter}</li>`;
                currentOptions.insertAdjacentHTML("beforeend", li);
            });
        }
        addLetter();
        updateName = function (selectedLi) {
            addLetter(selectedLi.innerText);
            let currentActive = document.querySelector(
                ".select-control-btn.active"
            );
            CurrentSelectButton = currentActive.firstElementChild;
            currentActive.firstElementChild.firstElementChild.innerText =
                selectedLi.innerText;

            currentActive.classList.toggle("active");
            console.log(
                currentActive.firstElementChild.firstElementChild.innerText
            );
            //  selectBtn.firstElementChild.innerText = selectedLi.innerText;
        };

        // if (wrapper.classList.contains("active") == true) {
        //     wrapper.classList.remove("active");
        //     options.innerHTML = "";
        // } else {
        //     wrapper.classList.add("active");
        //     function addLetter(selectedLetter) {
        //         options.innerHTML = "";
        //         letters.forEach((letter) => {
        //             //    let isSelected = letter == selectedLetter ? "selected" : "";
        //             // let li = `<li onclick="updateName(this)" class="${isSelected}">${letter}</li>`;
        //             let li = `<li onclick="updateName(this)">${letter}</li>`;
        //             options.insertAdjacentHTML("beforeend", li);
        //         });
        //     }
        //     addLetter();
        // }
    });

    // if (wrapper.classList.contains("active") == true) {
    //     let letters = ["A", "B", "C", "D"];
    //     function addLetter(selectedLetter) {
    //         options.innerHTML = "";
    //         letters.forEach((letter) => {
    //             //    let isSelected = letter == selectedLetter ? "selected" : "";
    //             // let li = `<li onclick="updateName(this)" class="${isSelected}">${letter}</li>`;
    //             let li = `<li onclick="updateName(this)">${letter}</li>`;
    //             options.insertAdjacentHTML("beforeend", li);
    //         });
    //     }
    //      addLetter();
    // }

    // if(wrapper.classList.contains("active")){
    //     let letters = ["A", "B", "C", "D"];
    //     function addLetter(selectedLetter) {
    //         options.innerHTML = "";
    //         letters.forEach((letter) => {
    //             //    let isSelected = letter == selectedLetter ? "selected" : "";
    //             // let li = `<li onclick="updateName(this)" class="${isSelected}">${letter}</li>`;
    //             let li = `<li onclick="updateName(this)">${letter}</li>`;
    //             options.insertAdjacentHTML("beforeend", li);
    //         });
    //     }
    //     addLetter();
    // }

    // selectBtn.addEventListener("click", () => {

    //     wrapper.classList.toggle("active");

    // });

    // addLetter();

    // updateName = function (selectedLi) {
    //     addLetter(selectedLi.innerText);
    //     let currentActive = document.querySelector(
    //         ".select-control-btn.active"
    //     );
    //     CurrentSelectButton = currentActive.firstElementChild;
    //     currentActive.firstElementChild.firstElementChild.innerText =
    //         selectedLi.innerText;

    //     currentActive.classList.toggle("active");
    //     console.log(
    //         currentActive.firstElementChild.firstElementChild.innerText
    //     );
    //     //  selectBtn.firstElementChild.innerText = selectedLi.innerText;
    // };

    window.addEventListener("click", function (e) {
        if (wrapper.contains(e.target)) {
        } else {
            if (wrapper.classList.contains("active") == true) {
                wrapper.classList.toggle("active");
            }
        }
    });
});
