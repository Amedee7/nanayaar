"use strict";
var KTDatatablesAdvancedFooterCalllback = function() {

	var init = function() {
		var table = $('#recolrd_table');

		// begin first table
		table.DataTable({
			responsive: true,
			pageLength: 5,
			lengthMenu: [[2, 5, 10, 15, -1], [2, 5, 10, 15, 'All']],

			footerCallback: function(row, data, start, end, display) {

				var column = 8;
				var api = this.api(), data;

				// Remove the formatting to get integer data for summation
				var intVal = function(i) {
					return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
				};

				// Total over all pages
				var total = api.column(column).data().reduce(function(a, b) {
					return intVal(a) + intVal(b);
				}, 0);

				// Total over this page
				var pageTotal = api.column(column, {page: 'current'}).data().reduce(function(a, b) {
					return intVal(a) + intVal(b);
				}, 0);

				// Update footer
				$(api.column(column).footer()).html(
					' fcfa <br/> (total: ' + KTUtil.numberString(total) + ' fcfa)',
				);
			},
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			init();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedFooterCalllback.init();
});
