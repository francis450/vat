      const input = document.getElementById("file");
                    const excelDataDiv = document.getElementById('excelData');
                
                    input.addEventListener('change', () => {
                        const file = input.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const data = e.target.result;
                                const workbook = XLSX.read(data, { type: 'binary' });
                                const sheetName = workbook.SheetNames[0];
                                const sheet = workbook.Sheets[sheetName];
                                const excelData = XLSX.utils.sheet_to_json(sheet, { header: 1 });
                                displayExcelData(excelData);
                            };
                            reader.readAsBinaryString(file);
                        }
                    });
                 const headings = [];
                 const ndata = [];
                   function displayExcelData(data) {
                        excelDataDiv.innerHTML = '';
                    
                        // Create a table element
                        const table = document.createElement('table');
                        table.classList.add('excel-table');
                    
                        // Create an array to store the key-value pairs
                       
                    
                        // Create a header row for the table
                        const headerRow = document.createElement('tr');
                        for (let cell of data[0]) {
                            const headerCell = document.createElement('th');
                            headerCell.textContent = cell;
                            headerRow.appendChild(headerCell);
                    
                            // Add key-value pair to the array with header cell as key
                            headings.push(cell );
                        }
                        table.appendChild(headerRow);
                    
                        // Create rows and cells for the table body
                        for (let i = 1; i < data.length; i++) {
                            const rowData = data[i];
                            const row = document.createElement('tr');
                            for (let j = 0; j < rowData.length; j++) {
                                const cellData = rowData[j];
                                const cell = document.createElement('td');
                                cell.textContent = cellData;
                                row.appendChild(cell);
                    
                                // Update the corresponding value in the key-value pair
                                // keyValuePairs[j].value = cellData;
                                
                            }
                            ndata.push(data[i]);
                            table.appendChild(row);
                        }
                    
                        // Append the table to the div
                        excelDataDiv.appendChild(table);
                    
                        // Display the key-value pairs in the console
                        // console.log(headings);
                        // console.log(ndata);
                       $(document).ready(function() {
                            $('#upload').click(function() {
                                $.post("handlers/handleupload.php",
                                    {
                                        headings: headings,
                                        ndata: ndata,
                                    },
                                    function(data) {
                                        if(data){
                                            alert("INVOICES SAVED SUCCESSFULLY");
                                            location.reload();
                                        }else{
                                            alert("NOT SAVED. TRY AGAIN");
                                        }
                                    }
                                );
                            });
                        });

                        
                    }
