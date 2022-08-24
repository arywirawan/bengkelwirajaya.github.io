var gloabalURL = "http://localhost:8000";

function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}

function getGlobalChart() {
    return JSON.parse(getCookie("globalchart"));
}

function setGlobalChart() {
    // {{ url('/shop/checkout/1') }}
    let produk_id = $("#produk_id").val();
    let nama = $("#nama_produk").val();
    let qty = $("#qty").val();
    let harga = $("#harga").val();
    let panjang = $("#panjang").val();
    let lebar = $("#lebar").val();

    let globalChart = getGlobalChart();
    let dataArray = [produk_id, nama, qty, harga, panjang, lebar];
    globalChart.push(dataArray);
    createCookie("globalchart", JSON.stringify(globalChart));
    document.location.href = gloabalURL + "/checkout";
}

$("#panjang").on("keypress", (data) => {
    console.log(data.target);
});

console.log(getGlobalChart());

// createCookie("globalchart", JSON.stringify([]));
