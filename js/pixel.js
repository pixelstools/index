document.addEventListener("DOMContentLoaded", async function () {
    const pixelUrl = "https://api.coingecko.com/api/v3/simple/price?ids=pixels&vs_currencies=usd";
    try {
        const response = await fetch(pixelUrl);
        const data = await response.json();
        document.getElementById("pixel").textContent = `$${data.pixels.usd.toFixed(4)}`;
    } catch (error) {
        console.error("Error al obtener el precio de Pixels:", error);
    }
});