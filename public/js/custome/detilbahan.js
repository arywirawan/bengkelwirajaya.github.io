//tambah & delete form bahan
var addForm = document.getElementById("addform");
var deleteBahan = document.getElementById("deleteform");

// form group bahan
var formGroup = document.getElementById("group-form-bahan");

var formBahan = document.getElementsByClassName("bahan-form");

addForm.onclick = function () {
    var lastFormBahan = formBahan.length - 1;
    var clone = formBahan[lastFormBahan].cloneNode(true);
    formGroup.appendChild(clone);
    totalFunction();
};

deleteBahan.addEventListener("click", function () {
    var formGroup = document.getElementById("group-form-bahan");
    formGroup.removeChild(formGroup.lastElementChild);
    totalFunction();
});

function totalFunction() {
    var jumlah = document.getElementsByClassName("jumlah");
    var selectbahan = document.getElementsByClassName("selectbahan");

    var price = 0;
    var subTotal = 0;

    for (let index = 0; index <= formBahan.length - 1; index++) {
        price =
            selectbahan[index].options[selectbahan[index].selectedIndex].getAttribute(
                "data-price"
            );

        subTotal = subTotal + (parseInt(jumlah[index].value || 0) * price);
    }
    document.getElementById("total").value =subTotal;
}

totalFunction();
