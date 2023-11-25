<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://idangero.us/swiper/dist/css/swiper.min.css">
</head>
<body>
    <!-- <div class="scroll-wrapper swiper-container">
		<ul class="nav nav-tabs swiper-wrapper"> 
			<li class="swiper-slide"><a data-toggle="tab" href="#home" class="active">Natashia</a></li>
			<li class="swiper-slide"><a data-toggle="tab" href="#menu1">Daphne</a></li>
			<li class="swiper-slide"><a data-toggle="tab" href="#menu2">Brenton</a></li>
			<li class="swiper-slide"><a data-toggle="tab" href="#menu3">Gala</a></li>
			<li class="swiper-slide"><a data-toggle="tab" href="#menu4">Christen</a></li>
			<li class="swiper-slide"><a data-toggle="tab" href="#menu5">Howard</a></li>
			<li class="swiper-slide"><a data-toggle="tab" href="#menu6">Casey</a></li>
		</ul>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>

	<div class="tab-content">
	  <div id="home" class="tab-pane fade in active">
	    <h3>HOME</h3>
	    <p>Some content.</p>
	  </div>
	  <div id="menu1" class="tab-pane fade">
	    <h3>Menu 1</h3>
	    <p>Some content in menu 1.</p>
      yujk
	  </div>
	  <div id="menu2" class="tab-pane fade">
	    <h3>Menu 2</h3>
	    <p>Some content in menu 2.</p>
	  </div>
	  <div id="menu3" class="tab-pane fade">
	    <h3>Menu 2</h3>
	    <p>Some content in menu 2.</p>
	  </div>
	  <div id="menu4" class="tab-pane fade">
	    <h3>Menu 2</h3>
	    <p>Some content in menu 2.</p>
	  </div>
	  <div id="menu5" class="tab-pane fade">
	    <h3>Menu 2</h3>
	    <p>Some content in menu 2.</p>
	  </div>
	  <div id="menu6" class="tab-pane fade">
	    <h3>Menu 2</h3>
	    <p>Some content in menu 2.</p>
	  </div>
	</div> -->
	<div class="card">
		<div class="card-header">
			<h4>INVOICES</h4>
		</div>
		<div class="card-body">
			<table class="table" id="example">
				<thead>
					<tr>
						<th>Invoice Number</th>
						<th>B. Name</th>
						<th>Amount</th>
						<th>Invoice Type</th>
						<th>Invoice Date</th>
						<th>Customer<br>Pin</th>
						<th>CU Invoice No</th>
						<th>CU Serial Number</th>
						<th>Withholding</th>
						<th>Paid</th>
						<th>VAT</th>
						<th>date</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	
</body>
<script>
	$(document).ready(function(){
		$.ajax({	
        url: 'handlers/vatendpoint.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Initialize DataTable
            var table = $('#example').DataTable({
                data: data,
                columns: [
                    { data: 'invoiceNumber' },
                    { data: 'name' },
                    { data: 'amount' },
                    { data: 'invoiceType' },
                    { data: 'invoiceDate' },
                    { data: 'customerPin' },
                    { data: 'CUInvoiceNumber' },
                    { data: 'CUSerialNumber' },
                    { data: 'withholding' },
                    { data: 'paid' },
                    { data: 'vat' },
                    { data: 'dated' }
                ]
            });
        }
    });
});
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://idangero.us/swiper/dist/js/swiper.min.js"></script>
<script src="js/invoices.js"></script>
</html>