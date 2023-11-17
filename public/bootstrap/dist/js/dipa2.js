const wrapper = document.querySelector(".currency-wrapper");
const selectBtn = wrapper.querySelector(".select-btn");
const searchInp = wrapper.querySelector("input");
const options = document.querySelector(".options");

let currencies = [
    "AED",
    "AFN",
    "ALL",
    "AMD",
    "AOA",
    "ARS",
    "AUD",
    "AZN",
    "BAM",
    "BBD",
    "BDT",
    "BGN",
    "BHD",
    "BIF",
    "BND",
    "BOB",
    "BRL",
    "BSD",
    "BTN",
    "BWP",
    "BYN",
    "BZD",
    "CAD",
    "CDF",
    "CHF",
    "CLP",
    "CNY",
    "COP",
    "CRC",
    "CUP",
    "CVE",
    "CZK",
    "DJF",
    "DKK",
    "DOP",
    "DZD",
    "EGP",
    "ERN",
    "ETB",
    "EUR",
    "FJD",
    "GBP",
    "GEL",
    "GHS",
    "GMD",
    "GNF",
    "GTQ",
    "GYD",
    "HNL",
    "HTG",
    "HUF",
    "IDR",
    "ILS",
    "INR",
    "IQD",
    "IRR",
    "ISK",
    "JMD",
    "JOD",
    "JPY",
    "KES",
    "KGS",
    "KHR",
    "KMF",
    "KPW",
    "KRW",
    "KWD",
    "KZT",
    "LAK",
    "LBP",
    "LKR",
    "LRD",
    "LSL",
    "LYD",
    "MAD",
    "MDL",
    "MGA",
    "MKD",
    "MMK",
    "MNT",
    "MRO",
    "MUR",
    "MVR",
    "MWK",
    "MXN",
    "MYR",
    "MZN",
    "NAD",
    "NGN",
    "NIO",
    "NOK",
    "NPR",
    "NZD",
    "OMR",
    "PAB",
    "PEN",
    "PGK",
    "PHP",
    "PKR",
    "PLN",
    "PYG",
    "QAR",
    "RON",
    "RSD",
    "RUB",
    "RWF",
    "SAR",
    "SBD",
    "SCR",
    "SDG",
    "SEK",
    "SGD",
    "SLL",
    "SOS",
    "SRD",
    "SSP",
    "STD",
    "SYP",
    "SZL",
    "THB",
    "TJS",
    "TMT",
    "TND",
    "TOP",
    "TRY",
    "TTD",
    "TWD",
    "TZS",
    "UAH",
    "UGX",
    "USD",
    "UYU",
    "UZS",
    "VEF",
    "VND",
    "VUV",
    "WST",
    "XAF",
    "XCD",
    "XOF",
    "YER",
    "ZAR",
    "ZMW",
];

function addCurrency(SelectedCurrency) {
    options.innerHTML = "";
    currencies.forEach((currency) => {
        let isSelected = currency == SelectedCurrency ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${currency}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}
addCurrency();

function updateName(selectedLi) {
    searchInp.value = "";
    addCurrency(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.firstElementChild.innerText = selectedLi.innerText;
}
searchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp.value.toLowerCase();
    arr = currencies
        .filter((data) => {
            return data.toLowerCase().startsWith(searchWord);
        })
        .map((data) => {
            let isSelected =
                data == selectBtn.firstElementChild.innerText ? "selected" : "";
            return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
        })
        .join("");
    options.innerHTML = arr ? arr : `<p>Mata Uang tidak ditemukan</p>`;
});
selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));
$(".txtCurrency").change(function () {
    console.log(selectBtn.firstElementChild.innerText);
});
