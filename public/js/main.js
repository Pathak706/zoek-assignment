$(document).ready(function(){


    $('.master-dataTable').DataTable({
        dom: '<"table-header row"<"col col-md-5 col-md-4"<"addAssets">><"col col-md-7 col-sm-8 tabel-filter"fr<"table-list" lB>>><"data-table-resp" t>ip"',
        initComplete: function(){
            $("div.addAssets").html('<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Add New</button>');
        },
        buttons: [

            {
                extend:  'csvHtml5',
                exportOptions: {
                    columns: ':not(.action)'
                }
            },
        ]
    });

    $('.report-dataTable').DataTable({
        dom: '<"table-header row"<"col col-md-5 col-md-4"><"col col-md-7 col-sm-8 tabel-filter"fr<"table-list" lB>>><"data-table-resp" t>ip"',
        initComplete: function(){
            $("div.addAssets").html('<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Add New</button>');
        },
        buttons: [
            {
                extend:  'csvHtml5',
                exportOptions: {
                    columns: ':not(.action)'
                }
            },
        ]
    });

    $(".datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
    });

    function startDateFnc(e) {

        // alert(e.target.value);
        //  //console.log($(e.target));
        var startdate = $(e.target)[0];
        var enddate = $(e.target).parent().next().find('.enddate').first()[0];
        ////console.log(startdate, enddate);
        if (startdate.value) {
            enddate.min = startdate.value;
        }

    }

    // onchange="endDateFnc(event)"

    function endDateFnc(e) {
        // alert(e.target.value);
        var enddate = $(e.target)[0];
        var startdate = $(e.target).parent().prev().find('.startdate').first()[0];
        ////console.log(startdate, enddate);
        if (enddate.value) {
            startdate.max = enddate.value;
        }

    }

});


