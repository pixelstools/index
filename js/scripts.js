$(document).ready(function () {
    const pricesUrl = "https://api.coingecko.com/api/v3/simple/price?ids=axie-infinity,smooth-love-potion,pixels,ronin&vs_currencies=usd";

    const updatePrice = (id, priceId, changeId) => {
        const historicalUrl = `https://api.coingecko.com/api/v3/coins/${id}/market_chart?vs_currency=usd&days=1`;

        $.get(pricesUrl, function (data) {
            $(`#${priceId}`).text(`$${data[id].usd.toFixed(4)}`);
        });

        $.get(historicalUrl, function (data) {
            const prices = data.prices;
            const currentPrice = prices[prices.length - 1][1];
            const oldPrice = prices[0][1];
            const change = ((currentPrice - oldPrice) / oldPrice) * 100;

            $(`#${changeId}`).text(change.toFixed(2) + "%").addClass(change > 0 ? "green" : "red");
        });
    };

    updatePrice("ronin", "ronin", "ronin-change");
    updatePrice("pixels", "pixel", "pixel-change");
    updatePrice("axie-infinity", "axs", "axs-change");
    updatePrice("smooth-love-potion", "slp", "slp-change");
});
