document.addEventListener("DOMContentLoaded", async function () {
    const axsUrl = "https://api.coingecko.com/api/v3/simple/price?ids=axie-infinity&vs_currencies=usd";
    try {
        const response = await fetch(axsUrl);
        const data = await response.json();
        document.getElementById("axs").textContent = `$${data["axie-infinity"].usd.toFixed(4)}`;
    } catch (error) {
        console.error("Error al obtener el precio de Axie Infinity:", error);
    }
});