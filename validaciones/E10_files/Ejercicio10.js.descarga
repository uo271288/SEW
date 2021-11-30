"use strict";
class Btc {
    btcusd() {
        var currConvAPI = "https://financialmodelingprep.com/api/v3/quote/BTCUSD?apikey=c2297eda404d367e191068acf374f371";
        $.getJSON(currConvAPI, {
            tagmode: "any",
            format: "json"
        })
            .done(function (data) {
                $("table").remove();
                $("body").append("<table>   <tr><th>Nombre</th>         <th>Precio</th>             <th>Valor anual más alto</th>   <th>Valor anual más bajo</th></tr></table>");
                $.each(data, function (i, item) {
                    $("table").append("<tr>     <td>" + item.name + "</td>  <td>" + item.price + "</td>  <td>" + item.yearHigh + "</td>      <td>" + item.yearLow + "</td></tr>");
                });
            });
    }
}

var btc = new Btc();