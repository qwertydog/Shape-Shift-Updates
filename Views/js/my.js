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
        console.log(this);
    });
    $('#showTable_Poloniex_ETH').on('click', function () {
        toggleView('#BTC_Poloniex_ETH', this);
        console.log(this);
    });
    $('#showTable_ShapeShifter_XMR').on('click', function () {
        toggleView('#BTC_ShapeShifter_XMR', this);
        console.log(this);
    });
    $('#showTable_Poloniex_XMR').on('click', function () {
        toggleView('#BTC_Poloniex_XMR', this);
        console.log(this);
    });
    $('#showTable_ShapeShifter_DASH').on('click', function () {
        toggleView('#BTC_ShapeShifter_DASH', this);
        console.log(this);
    });
    $('#showTable_Poloniex_DASH').on('click', function () {
        toggleView('#BTC_Poloniex_DASH', this);
        console.log(this);
    });


});


