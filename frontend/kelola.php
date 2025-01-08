<?php 
include('header.php');
include('check_session.php');
?>

<head>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<div class="container mt-5">
    <h2 class="mb-4">ListNews</h2>
    <table id="newsTable" class="table table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
$(document).ready(function() {
    let table = $('#newsTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": function(data, callback, settings) {
            axios.get("http://localhost/IrpanMaulana/backend/listNews.php", {
                params: {
                    key: data.search.value
                }
            })
            .then(function(response) {
                let formattedData = response.data.map((row, index) => {
                    row.no = index + 1; // Add numbering
                    return row;
                });

                callback({
                    draw: data.draw,
                    recordsTotal: formattedData.length,
                    recordsFiltered: formattedData.length,
                    data: formattedData
                });
            })
            .catch(function(error) {
                console.error(error);
                alert("Error fetching news data");
            });
        },
        "columns": [
            { "data": "no" },
            { "data": "title" },
            { "data": "desc" },
            { 
                "data": "img",
                "render": function(data, type, row) {
                  console.log(data); // Debugging untuk melihat data
                     return '<img src="http://localhost/IrpanMaulana/' + data + '" alt="image" style="max-width: 100px; max-height: 100px;">';
                } 

            },
            { 
                "data": null,
                "render": function(data, type, row) {
                    return `
                        <button class="btn btn-danger btn-sm" onclick="deleteNews(${row.id})">Delete</button>
                        <form action="edit.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="${row.id}">
                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        </form>
                    `;
                }
            }
        ]
    });
});

// Function to delete news
function deleteNews(id) {
    if (confirm("Are you sure you want to delete this news?")) {
        axios.post("http://localhost/IrpanMaulana/backend/deleteNews.php", { id: id })
            .then(function(response) {
                alert("News deleted successfully!");
                $('#newsTable').DataTable().ajax.reload(); // Reload the table
            })
            .catch(function(error) {
                console.error(error);
                alert("Error deleting news");
            });
    }
}
</script>
