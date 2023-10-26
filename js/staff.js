$(document).ready(function(){
    loadStaffData(); // Load initial data when the page loads
    
    $("#addStaffButton").click(function(e) {
        e.preventDefault();

        // Collect form data
        var formData = {
            firstname: $("#firstname").val(),
            lastname: $("#lastname").val(),
            role: $("#role").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            status: $("input[name='status']:checked").val()
        };

        // Send AJAX request
        $.ajax({
            type: "POST",
            url: "add_staff_ajax.php", // PHP script to handle the request
            data: formData,
            success: function(response) {
                var responseData = JSON.parse(response);
                if (responseData.status === "success") {
                    // Close the modal
                    $("#addStaffModal").modal("hide");
                    // Perform any other actions (e.g., updating the page)
                    loadStaffData();
                    // for clearing data after save
                    $("#firstname").val('')
                    $("#lastname").val('')
                    $("#role").val('')
                    $("#email").val('')
                    $("#password").val('')
                    $("input[name='status']:checked").prop( "checked", false );
                } else {
                    // Display error messages for specific fields
                    if (responseData.errors) {
                        // Loop through the error messages and display them
                        for (var field in responseData.errors) {
                            $("#" + field + "_error").text(responseData.errors[field]);
                        }
                    }
                }
            }
        });
    });

    function loadStaffData() {
        $.ajax({
            type: "GET",
            url: "show_staff_ajax.php", // Replace with the actual URL of your PHP script
            success: function(data) {
                // Clear the table body
                $('#MyButtons').empty();
                $("#table-container").html(data);
                dataTable = $("#staff").DataTable({
                    dom: 'Brtp',
                    responsive: true,
                    fixedHeader: true,
                    pageLength: 10,
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            className: 'border-white',
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            className: 'border-white',
                            download: 'open',
                        }
                    ],
                    'columnDefs': [ {
                        'targets': [2,3,4,5], /* column index */
                        'orderable': false, /* true or false */
                    }]
                });
                dataTable.buttons().container().appendTo($('#MyButtons'));

                var table = dataTable;
                var filter = createFilter(table, [1,2,3,4]);

                function createFilter(table, columns) {
                    var input = $('input#keyword').on("keyup", function() {
                        table.draw();
                    });
                    
                    $.fn.dataTable.ext.search.push(function(
                        settings,
                        searchData,
                        index,
                        rowData,
                        counter
                    ) {
                        var val = input.val().toLowerCase();
                    
                        for (var i = 0, ien = columns.length; i < ien; i++) {
                            if (searchData[columns[i]].toLowerCase().indexOf(val) !== -1) {
                            return true;
                            }
                        }
                    
                        return false;
                    });
                    
                    return input;
                }
                $('.table-responsive select#staff-role').on('change', function(e){
                    var status = $(this).val();
                    dataTable.columns([2]).search(status).draw();
                });
            
                $('.table-responsive select#staff-status').on('change', function(e){
                    var status = $(this).val();
                    dataTable.columns([4]).search(status).draw();
                });
            },
            error: function() {
                // Handle AJAX error
                alert("Failed to load staff data.");
            }
        });
    }
})