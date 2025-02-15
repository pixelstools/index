document.addEventListener("DOMContentLoaded", async function () {
    const roninUrl = "https://api.coingecko.com/api/v3/simple/price?ids=ronin&vs_currencies=usd";
    try {
        const response = await fetch(roninUrl);
        const data = await response.json();
        document.getElementById("ronin").textContent = `$${data.ronin.usd.toFixed(4)}`;
    } catch (error) {
        console.error("Error al obtener el precio de Ronin:", error);
    }
});