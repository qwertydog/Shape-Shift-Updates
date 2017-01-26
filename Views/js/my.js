$(document).ready(function () {


    /**
     * Below are some hack methods to drop down the tables
     */
    function toggleView(element, button) {
        if ($(button).val() == 'Hide') {
            $(button).prop('value', 'Show');
        } else {
            $(button).prop('value', 'Hide');
        }
        $(element).toggleClass('hidden');
    }

    $('#showTable_ShapeShifter_ETH').on('click', function () {
        toggleView('#BTC_ShapeShifter_ETH', this);
    });
    $('#showTable_Poloniex_ETH').on('click', function () {
        toggleView('#BTC_Poloniex_ETH', this);
    });
    $('#showTable_ShapeShifter_XMR').on('click', function () {
        toggleView('#BTC_ShapeShifter_XMR', this);
    });
    $('#showTable_Poloniex_XMR').on('click', function () {
        toggleView('#BTC_Poloniex_XMR', this);
    });
    $('#showTable_ShapeShifter_DASH').on('click', function () {
        toggleView('#BTC_ShapeShifter_DASH', this);
    });
    $('#showTable_Poloniex_DASH').on('click', function () {
        toggleView('#BTC_Poloniex_DASH', this);
    });

    $('#showTable_Poloniex_PASC').on('click', function () {
        toggleView('#BTC_Poloniex_PASC', this);
    });
    $('#showTable_Poloniex_PASC').ready(function () {
        toggleView('#BTC_Poloniex_PASC', this);
    });


});


