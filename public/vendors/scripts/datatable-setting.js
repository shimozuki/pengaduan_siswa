$('document').ready(function () {
	$('.data-tables').DataTable({
		scrollCollapse: true,
		autoWidth: false,
		responsive: true,
		columnDefs: [{
			targets: "datatable-nosort",
			orderable: false,
		}],
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"language": {
			"info": "_START_-_END_ of _TOTAL_ entries",
			searchPlaceholder: "Search",
			paginate: {
				next: '<i class="ion-chevron-right"></i>',
				previous: '<i class="ion-chevron-left"></i>'
			}
		},
	});

	$('.data-table-export').DataTable({
		scrollCollapse: true,
		autoWidth: false,
		responsive: true,
		columnDefs: [{
			targets: "datatable-nosort",
			orderable: false,
		}],
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"language": {
			"info": "_START_-_END_ of _TOTAL_ entries",
			searchPlaceholder: "Search",
			paginate: {
				next: '<i class="ion-chevron-right"></i>',
				previous: '<i class="ion-chevron-left"></i>'
			}
		},
		dom: 'Bfrtip',
		buttons: [
			// {
			// 	extend: 'pdfHtml5',
			// 	text: 'Export to PDF',
			// 	pageSize: 'LEGAL',
			// 	exportOptions: {
			// 		columns: ':not(.notexport)',
			// 	},
			// 	customize: function (doc) {
			// 		doc.content[1].table.widths =
			// 			Array(doc.content[1].table.body[0].length + 1).join('*').split('');
			// 	},
			// },
			// 'pdf'
			// {
			// 	extends: 'csv',
			// 	text: 'CSV',
			// 	exportOptions: {
			// 		columns: ':not(.notexport)',
			// 	},
			// }
			// 'copy', 'csv', 'pdf', 'print',

		]
	});

	$(document).on('click', '#export-pdf-pengaduan', function () {
		var table = $('#myTable').DataTable();
		var tableData = table.data().toArray();
		var status = document.getElementById('status').innerHTML

		// Define the PDF document structure
		var docDefinition = {
			content: [
				{ text: 'Data Pengaduan ' + status, style: 'header' },
				{
					table: {
						widths: ['10%', '20%', '45%', '15%', '10%'],
						body: [],
					}
				}
			],
			styles: {
				header: {
					fontSize: 18,
					bold: true,
					margin: [0, 0, 0, 10]
				}
			},
			defaultStyle: {
				alignment: "justify",
				margin: [0, 50, 0, 10],
				lineBreak: "anywhere"
			}
		};
		// Get the table header
		var tableHeader = ["Foto", "Judul Laporan", "Isi Laporan", "Nama Pengadu", "Tanggal pengaduan"]

		console.log(tableHeader)
		// Add the table header to the PDF
		docDefinition.content[1].table.body.push(tableHeader);
		var excludeColumnIndex = [1, 5];
		// Add the DataTable data to the PDF
		for (var i = 0; i < tableData.length; i++) {
			console.log("length" + i)
			var rowData = tableData[i];

			// Extract the image data from the base64 string
			var imgData = rowData[1].split(',')[1];

			// Add the row data (excluding the image column) to the PDF
			var row = [];
			for (var j = 0; j < rowData.length; j++) {
				if (excludeColumnIndex.includes(j)) {
				} else {
					console.log(j)
					row.push(rowData[j]);
				}

			}
			docDefinition.content[1].table.body.push(row);

			// Add the image to the PDF
			docDefinition.content[1].table.body[i + 1].unshift({
				image: 'data:image/png;base64,' + imgData,
				fit: [50, 50]
			});
			console.log(row)
		}

		// Create the PDF document
		var pdfDoc = pdfMake.createPdf(docDefinition);

		// Download the PDF document
		pdfDoc.download('Data Pengaduan ' + status + '.pdf');
	});


	$(document).on('click', '#export-pdf-petugas', function () {
		var table = $('#myTable').DataTable();
		var tableData = table.data().toArray();

		// Define the PDF document structure
		var docDefinition = {
			content: [
				{ text: 'Data Petugas', style: 'header' },
				{
					table: {
						widths: ['*', '*', '*', '*'],
						body: [],
					}
				}
			],
			styles: {
				header: {
					fontSize: 18,
					bold: true,
					margin: [0, 0, 0, 10]
				}
			}
		};
		// Get the table header
		var tableHeader = ["Nama Petugas", "Username", "telp", "level"]

		console.log(tableHeader)
		// Add the table header to the PDF
		docDefinition.content[1].table.body.push(tableHeader);
		var excludeColumnIndex = [ 4];
		// Add the DataTable data to the PDF
		for (var i = 0; i < tableData.length; i++) {
			var rowData = tableData[i];

			// Add the row data (excluding the image column) to the PDF
			var row = [];
			for (var j = 0; j < rowData.length; j++) {
				if (excludeColumnIndex.includes(j)) {
				} else {
					console.log(j)
					row.push(rowData[j]);
				}

			}
			docDefinition.content[1].table.body.push(row);
		}

		// Create the PDF document
		var pdfDoc = pdfMake.createPdf(docDefinition);

		// Download the PDF document
		pdfDoc.download('Data Petugas.pdf');
	});
	
	$(document).on('click', '#export-pdf-masyarakat', function () {
		var table = $('#myTable').DataTable();
		var tableData = table.data().toArray();

		// Define the PDF document structure
		var docDefinition = {
			content: [
				{ text: 'Data Masyarakat', style: 'header' },
				{
					table: {
						widths: ['*', '*', '*', '*'],
						body: [],
					}
				}
			],
			styles: {
				header: {
					fontSize: 18,
					bold: true,
					margin: [0, 0, 0, 10]
				}
			}
		};
		// Get the table header
		var tableHeader = ["NIK", "NAMA", "USERNAME", "TELP"]

		console.log(tableHeader)
		// Add the table header to the PDF
		docDefinition.content[1].table.body.push(tableHeader);
		var excludeColumnIndex = [ 4];
		// Add the DataTable data to the PDF
		for (var i = 0; i < tableData.length; i++) {
			var rowData = tableData[i];

			// Add the row data (excluding the image column) to the PDF
			var row = [];
			for (var j = 0; j < rowData.length; j++) {
				if (excludeColumnIndex.includes(j)) {
				} else {
					console.log(j)
					row.push(rowData[j]);
				}

			}
			docDefinition.content[1].table.body.push(row);
		}

		// Create the PDF document
		var pdfDoc = pdfMake.createPdf(docDefinition);

		// Download the PDF document
		pdfDoc.download('Data masyarakat.pdf');
	});

	// $(document).on('click', '#export-pdf', function () {
	// 	var table = $('#myTable').DataTable();
	// 	var tableData = table.data().toArray();

	// 	// Define the PDF document structure
	// 	var docDefinition = {
	// 		content: [
	// 			{ text: 'My Table', style: 'header' },
	// 			{
	// 				table: {
	// 					headerRows: 1,
	// 					widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
	// 					body: []
	// 				}
	// 			}
	// 		],
	// 		styles: {
	// 			header: {
	// 				fontSize: 18,
	// 				bold: true,
	// 				margin: [0, 0, 0, 10]
	// 			}
	// 		}
	// 	};

	// 	// Add the DataTable data to the PDF
	// 	for (var i = 0; i < tableData.length; i++) {
	// 		var rowData = tableData[i];
	// 		var imgData = rowData[1].split(',')[1];
	// 		// Add the row data to the PDF
	// 		var row = [];
	// 		for (var j = 0; j < rowData.length; j++) {
	// 			if (j != 1) {
	// 				row.push(rowData[j]);
	// 			}
	// 		}
	// 		docDefinition.content[1].table.body.push(row);
	// 	}
	// 	docDefinition.content[1].table.body[i].unshift({
	// 		image: 'data:image/png;base64,' + imgData,
	// 		fit: [50, 50]
	// 	});
	// 	// Create the PDF document
	// 	var pdfDoc = pdfMake.createPdf(docDefinition);

	// 	// Download the PDF document
	// 	pdfDoc.download('table.pdf');
	// });

	var table = $('.select-row').DataTable();
	$('.select-row tbody').on('click', 'tr', function () {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});

	var multipletable = $('.multiple-select-row').DataTable();
	$('.multiple-select-row tbody').on('click', 'tr', function () {
		$(this).toggleClass('selected');
	});
	var table = $('.checkbox-datatable').DataTable({
		'scrollCollapse': true,
		'autoWidth': false,
		'responsive': true,
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"language": {
			"info": "_START_-_END_ of _TOTAL_ entries",
			searchPlaceholder: "Search",
			paginate: {
				next: '<i class="ion-chevron-right"></i>',
				previous: '<i class="ion-chevron-left"></i>'
			}
		},
		'columnDefs': [{
			'targets': 0,
			'searchable': false,
			'orderable': false,
			'className': 'dt-body-center',
			'render': function (data, type, full, meta) {
				return '<div class="dt-checkbox"><input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '"><span class="dt-checkbox-label"></span></div>';
			}
		}],
		'order': [[1, 'asc']]
	});

	$('#example-select-all').on('click', function () {
		var rows = table.rows({ 'search': 'applied' }).nodes();
		$('input[type="checkbox"]', rows).prop('checked', this.checked);
	});

	$('.checkbox-datatable tbody').on('change', 'input[type="checkbox"]', function () {
		if (!this.checked) {
			var el = $('#example-select-all').get(0);
			if (el && el.checked && ('indeterminate' in el)) {
				el.indeterminate = true;
			}
		}
	});
});