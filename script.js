// const baseUrl = "http://localhost:8080/presensi/api";
// const indexGuru = `${baseUrl}/guru`;
// console.log("tes");

// const contents = document.querySelector("#dataku");
// function getDataGuru() {
//     fetch(indexGuru)
//         .then((response) => response.json())
//         .then((resJson) => {
//             // console.log(resJson.data);
//             let allGuru = "";
//             resJson.data.forEach(guru => {
//                 // console.log(guru.nama_guru});
//                 allGuru += `
//                 <tr>
//                     <td>${guru.id_guru}</td>
//                     <td>${guru.nama_guru}</td>
//                     <td>${guru.id_card}</td>
//                 </tr>
//                 `;
//             });
//             // console.log(allGuru);
//             contents.innerHTML =allGuru;
//         })
// }
// document.addEventListener("DOMContentLoaded", function () {
//     // var elems = document.querySelector('.')
//     getDataGuru();
// });


var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            create: {
                type: 'POST',
                url:  '../php/rest/create.php'
            },
            edit: {
                type: 'PUT',
                url:  '../php/rest/edit.php'
            },
            remove: {
                type: 'DELETE',
                url:  '../php/rest/remove.php?id={id}'
            }
        },
        table: "#dataTable",
        fields: [ {
                label: "First name:",
                name: "first_name"
            }, {
                label: "Last name:",
                name: "last_name"
            }, {
                label: "Position:",
                name: "position"
            }, {
                label: "Office:",
                name: "office"
            }, {
                label: "Extension:",
                name: "extn"
            }, {
                label: "Start date:",
                name: "start_date",
                type: "datetime"
            }, {
                label: "Salary:",
                name: "salary"
            }
        ]
    } );
 
    $('#dataTable').DataTable( {
        dom: "Bfrtip",
        ajax: "http://localhost:8080/presensi/api/guru",
        columns: [
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return data.first_name+' '+data.last_name;
            } },
            { data: "position" },
            { data: "office" },
            { data: "extn" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
