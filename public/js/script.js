// Data province and city mapping
const provinceToCities = {
    "DKI Jakarta": [
        "Jakarta Pusat",
        "Jakarta Barat",
        "Jakarta Timur",
        "Jakarta Utara",
        "Jakarta Selatan",
    ],
    "Jawa Barat": ["Bandung", "Bekasi", "Bogor", "Depok", "Sukabumi"],
    "Jawa Tengah": ["Semarang", "Surakarta", "Magelang", "Tegal", "Salatiga"],
    "Jawa Timur": ["Surabaya", "Malang", "Kediri", "Madiun", "Blitar"],
};

// DOM elements
const provinceSelect = document.getElementById("province");
const citySelect = document.getElementById("city");

// Update city options based on selected province
provinceSelect.addEventListener("change", function () {
    const selectedProvince = this.value;
    const cities = provinceToCities[selectedProvince] || [];

    // Clear existing city options
    citySelect.innerHTML =
        '<option value="" disabled selected>Select city...</option>';

    // Populate city options
    cities.forEach((city) => {
        const option = document.createElement("option");
        option.value = city;
        option.textContent = city;
        citySelect.appendChild(option);
    });

    // Enable city select if cities are available
    citySelect.disabled = cities.length === 0;
});
