document.addEventListener("DOMContentLoaded", async function () {
    const slpUrl = "https://api.coingecko.com/api/v3/simple/price?ids=smooth-love-potion&vs_currencies=usd";
    try {
        const response = await fetch(slpUrl);
        const data = await response.json();
        document.getElementById("slp").textContent = `$${data["smooth-love-potion"].usd.toFixed(4)}`;
    } catch (error) {
        console.error("Error al obtener el precio de Smooth Love Potion:", error);
    }
});