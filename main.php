<?php
session_start();
include("connection.php");

if(isset($_SESSION["name"]) && $_SESSION["token"]){
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Form</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="mx-auto container">
        <!-- Progress Form -->
        <form id="progress-form" class="p-4 progress-form" action="handlers/vatendpoint.php" lang="en" novalidate>

            <!-- Step Navigation -->
            <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
            <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="true">
                <span class="d-block step" aria-hidden="true">Step 1 <span class="sm:d-none">of 2</span></span>
                General
            </button>
            <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="false" tabindex="-1" aria-disabled="true">
                <span class="d-block step" aria-hidden="true">Step 2 <span class="sm:d-none">of 2</span></span>
                CU Details
            </button>
            </div>
            <!-- / End Step Navigation -->

            <!-- Step 1 -->
            <section id="progress-form__panel-1" role="tabpanel" aria-labelledby="progress-form__tab-1" tabindex="0">
            <div class="sm:d-grid sm:grid-col-2 sm:mt-3">
                <div class="mt-3 sm:mt-0 form__field">
                <label for="invoiceType">
                    Invoice Type
                    <span data-required="true" aria-hidden="true"></span>
                </label>
                <select name="invoiceType" id="invoiceType">
                    <option value="exempt">Sales(VAT)</option>
                    <option value="vatable">Sales(No VAT)</option>
                    <option value="purchase">Purchase</option>
                    <option value="expense">Expense</option>
                </select>
                </div>

                <div class="mt-3 sm:mt-0 form__field">
                <label for="name">
                    Business Name
                    <span data-required="true" aria-hidden="true"></span>
                </label>
                <input type="text" name="name" autocomplete="name">
                </div>
            </div>
            <div class="sm:d-grid sm:grid-col-2 sm:mt-3">
                <div class="mt-3 sm:mt-0 form__field">
                
                <label for="last-name">
                    Amount
                    <span data-required="true" aria-hidden="true"></span>
                </label>
                <input id="amount" type="number" name="amount" autocomplete="amount" required>
                </div>

                <div class="mt-3 sm:mt-0 form__field">
                <label for="invoiceNumber">
                    Invoice Number
                    <span data-required="true" aria-hidden="true"></span>
                </label>
                <input id="invoiceNumber" type="text" name="invoiceNumber" autocomplete="invoiceNumber" required>
                </div>
            </div>
            <div class="sm:d-grid sm:grid-col-2 sm:mt-3">
                <div class="mt-3 form__field">
                    <label class="form__choice-wrapper" for="paid">
                        <input id="paid" type="checkbox" name="paid">
                        <span>Click If Amount Above is Already Paid</span>
                    </label>
                </div>
                <div class="mt-3 sm:mt-0 form__field">
                <label for="invoiceDate">
                    Invoice Date
                    <span data-required="true" aria-hidden="true"></span>
                </label>
                <input id="invoiceDate" type="date" name="invoiceDate" autocomplete="invoiceDate" required>
                </div>
            </div>
            <!-- <input type="checkbox" name="try" checked class="try">
                <input type="checkbox" name="try"  class="try">    -->
                <script>
                    // function handleCheck(e){
                    //     let {value, name} = e.target;
                    //     console.log(value,name)                    
                    // }
                    // $('.try').change(function(e){
                    //     handleCheck(e);        
                    // })
                </script>
            <div class="d-flex align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                <button type="button"  data-action="next" >
                Continue
                </button>
            </div>
            </section>
            <!-- / End Step 1 -->

            <!-- Step 2 -->
            <section id="progress-form__panel-2" role="tabpanel" aria-labelledby="progress-form__tab-2" tabindex="0" hidden>
            <div class="sm:d-grid sm:grid-col-2 sm:mt-3">
                <div class="mt-3 sm:mt-0 form__field">
                    <label for="item">
                    Item
                    <span data-required="true" aria-hidden="true"></span>
                    </label>
                    <input id="item" type="text" name="item" autocomplete="item" required>
                </div>
                <div class="mt-3 sm:mt-0 form__field">
                    <label for="customerPin">
                    Customer Pin
                    </label>
                    <input id="customerPin" type="text" name="customerPin" autocomplete="customerPin">
                </div>
            </div>
            
            
            <div class="sm:d-grid sm:grid-col-2 sm:mt-3">
                <div class="mt-3 sm:mt-0 form__field">
                    <label for="CUSerialNumber">
                    CU Serial Number
                    </label>
                    <input id="CUSerialNumber" type="text" name="CUSerialNumber" autocomplete="CUSerialNumber">
                </div>
                <div class="mt-3 sm:mt-0 form__field">
                    <label for="CUSerialNumber">
                    CU Invoice Number
                    </label>
                    <input id="CUSerialNumber" type="text" name="CUInvoiceNumber" autocomplete="CUInvoiceNumber">
                </div>
            </div>

            <div class="sm:d-grid sm:grid-col-2 sm:mt-3">
                <div class="mt-3 sm:mt-0 form__field">
                    <input id="vat" type="checkbox" name="vat" autocomplete="vat">
                    <label for="vat" style="display:inline">
                    VAT(16%)
                    </label>
                </div>
                <div class="mt-3 sm:mt-0 form__field">
                    <input id="withholding" type="checkbox" name="withholding" autocomplete="withholding">
                    <label for="withholding" style="display:inline">
                    Withholding(2%)
                    </label>
                    
                </div>

                
            </div>

            <div class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                Back
                </button>
                <button type="submit">
                Submit
                </button>
            </div>
            </section>
            <!-- / End Step 2 -->


            <!-- Thank You -->
            <section id="progress-form__thank-you" hidden>
            <p>Thank you for your submission!</p>
            <p>We appreciate you contacting us. One of our team members will get back to you very&nbsp;soon.</p>
            </section>
            <!-- / End Thank You -->

        </form>
        <!-- / End Progress Form -->
    </div>
</body>
<script src="js/main.js"></script>
</html>
