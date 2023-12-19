
$(document).ready(function(){
		$.ajax({	
        url: 'handlers/vatendpoint.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Initialize DataTable
            $('#example').DataTable({
                data: data,
                columns: [
                    { data: 'name'},
                    { data: 'invoiceType' },
                    { data: 'invoiceNumber' },
                    {
                        data: 'amount',
                        render: function (data, type, row) {
                            // Format the 'amount' column with commas
                            return parseFloat(data).toLocaleString('en-US', { style: 'currency', currency: 'KES' });
                        }
                    },
                    { data: 'invoiceDate' },
                    { 
                        data: 'paid',
                        render: function(data, type, row) {
                            if(row.paid == 1){
                                return 'Yes';
                            }else{
                                return 'No';
                            }
                        }
                    },
                    { 
                        data: 'filed',
                        render: function(data, type, row) {
                            if(row.filed == 1){
                                return 'Yes';
                            }else{
                                return 'No';
                            }
                        }
                    },
                    {
                        // Custom column for the icon
                        render: function (data, type, row) {
                            // Assuming 'id' is the property you want to use
                            var idValue = row.id;

                            // Return the HTML for the icon with the 'data-id' attribute
                            return '<i style="cursor: pointer;" class="fas fa-info-circle moreInfo" data-id="' + idValue + '"></i>&nbspMore';
                        }
                    }                    
                ],
                paging: true,
                fixedHeader: {
                    header: true
                },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Excel <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
                        },
                        {
                            extend: 'pdf',
                            text: 'PDF <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
                        },
                        
                        'copy',
                        'pdf',
                        'colvis'
                    ],
            });
            $('#example1').DataTable({
                data: data,
                columns: [
                    { data: 'name'},
                    { data: 'customerPin' },
                    {
                        data: 'amount',
                        render: function (data, type, row) {
                            // Format the 'amount' column with commas
                            return parseFloat(data);
                        }
                    },
                    { 
                        data: 'amount',
                        render: function(data, type, row) {
                            return parseFloat(data*0.16);
                        } 
                    },
                    { data: 'CUInvoiceNumber' },
                    { data: 'CUSerialNumber'},
                    { data: 'dated'},               
                ],
                paging: true,
                fixedHeader: {
                    header: true
                },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Excel <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
                        },
                        {
                            extend: 'pdf',
                            text: 'PDF <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
                        },
                        
                        'copy',
                        'pdf',
                        'colvis'
                    ],
            });
        }
    });
});